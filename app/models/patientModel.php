<?php


class patientModel extends AbstractModel
{
    protected $id;
    public $name;
    public $national_id;
    public $birth_date;
    public $birth_province;
    public $age;
    public $address;
    public $image;
    public $phone;
    public $contacts = array();

    public $examinations = array();
    public $analysis = array();
    public $diagnosis = array();
    public $scans = array();
    public $prescriptions = array();
    protected static $tableName = 'patients';



    public function __construct($id)
    {
        global $con;
        $query = "SELECT * FROM patients WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute(array($id));

        $row = $stmt->fetch();

        $this->id = $id;
        $this->name = getLang($row['arabname'], $row['engname']);
        $this->national_id = $row['national_id'];
        $this->birth_date = $row['birth_date'];
        $this->birth_province = $row['birth_province'];
        //$this->age = date("Y/m/d") - $this->birth_date;
        //$this->age = date_diff(time(),$this->birth_date);

        $date = new DateTime($row['birth_date']);
        $now = new DateTime();

        $this->age = $now->diff($date)->y;


        $this->address = $row['address'];
        $this->image = IMAGES_PATH . "patients/" . $row['image'];
        $this->phone = $row['phone'];

        $query = "SELECT * FROM patient_contacts WHERE patient_id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute(array($id));
        $result = $stmt->fetchAll();

        foreach ($result as $contact) {
            $this->contacts[] =  array($contact['icon'], $contact['contact']);
        }

        $stmt = $con->prepare('SELECT
                                            examinations.*, 
                                            doctors.'. getLang('arabname','engname') .' AS doctor, 
                                            clinics.'. getLang('arabname','engname') .' AS clinic 
                                        FROM examinations 
                                        INNER JOIN doctors
                                        ON examinations.doctor_id = doctors.id
                                        INNER JOIN clinics
                                        ON doctors.clinic_id = clinics.id
                                        WHERE patient_id = ?');
        $stmt->execute(array($this->id));
        $this->examinations = $stmt->fetchAll();

    }

    public function getExaminations()
    {
        echo 'All Examinations';
    }

    public function getAnalyses()
    {
        echo 'All Analyses';
    }

    public function getDiagnoses()
    {
        echo 'All Diagnoses';
    }

    public function getScans()
    {
        echo 'All Scans';
    }

    public function getPrescriptions()
    {
        echo 'All Prescriptions';
    }
    public static function signUp(array $data)
    {
        global $con;
        $arabname = $data['arabname'];
        $engname = $data['engname'];
        $mail = $data['mail'];
        $pass = $data['pass'];
        $salt = $data['salt'];
        $phone = $data['phone'];
        $national_id = $data['national_id'];
        $birth_date = $data['birth_date'];
        $birth_place = $data['birth_place'];
        $address = $data['address'];
        $gender = $data['gender'];



        $stmt = $con->prepare('INSERT INTO 
                                        patients(
                                                 national_id,
                                                 arabname,
                                                 engname,
                                                 email,
                                                 password,
                                                 salt,
                                                 phone,
                                                 gender,
                                                 birth_province,
                                                 birth_date,
                                                 address)
                                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute(array($national_id,$arabname,$engname,$mail,$pass,$salt,$phone,$gender,$birth_place, $birth_date,$address));
    }

    public static function getPatientsByDoctorToday($docid)
    {
        global $con;

        $stmt = $con->prepare("SELECT 
                                            patients.*,
                                            examinations.doctor_id,
                                            examinations.status
                                        FROM 
                                            patients 
                                        INNER JOIN examinations 
                                        ON patients.id = examinations.patient_id
                                        WHERE examinations.doctor_id = ?
                                        AND examinations.date = CURRENT_DATE 
                                        ORDER BY examinations.id ASC");

        $stmt->execute(array($docid));
        $patients = $stmt->fetchAll();

        $count = $stmt->rowCount();
        for ($i = 0; $i < $count; $i++) {
            $patient_id = $patients[$i]['id'];
            $doctor_id = $patients[$i]['doctor_id'];
            $stmt = $con->prepare("SELECT
                                                examinations.id
                                            FROM examinations
                                            WHERE examinations.patient_id = ?
                                            AND examinations.doctor_id = ? 
                                            AND examinations.date < CURRENT_DATE");
            $stmt->execute(array($patient_id, $doctor_id));
            $count = $stmt->rowCount();
            if ($count > 0) {
                $patients[$i]['oldness'] = lang('old');
            } else {
                $patients[$i]['oldness'] = lang('new');
            }
        }
        return $patients;
    }

    public static function countWait($docid)
    {
        global $con;

        $stmt = $con->prepare("SELECT
                                            COUNT(patients.id)
                                        FROM 
                                            patients 
                                        INNER JOIN examinations
                                        ON patients.id = examinations.patient_id
                                        WHERE examinations.doctor_id = ?
                                        AND examinations.date = CURRENT_DATE
                                        AND examinations.status = 0");
        $stmt->execute(array($docid));
        return $stmt->fetchColumn();
    }

    public static function countAttend($docid)
    {
        global $con;

        $stmt = $con->prepare("SELECT
                                            COUNT(patients.id)
                                        FROM patients 
                                        INNER JOIN examinations
                                        ON patients.id = examinations.patient_id 
                                        WHERE examinations.doctor_id = ? 
                                        and examinations.date = CURRENT_DATE 
                                        and examinations.status = 1");
        $stmt->execute(array($docid));
        return $stmt->fetchColumn();
    }

    public static function patientNumber($id)
    {
        global $con;
        $stmt = $con->prepare("SELECT
                                            patients.id
                                        FROM patients 
                                        INNER JOIN examinations 
                                        ON patients.id = examinations.patient_id
                                        WHERE examinations.doctor_id = ?
                                        AND examinations.date = CURRENT_DATE
                                        AND examinations.status = 0");
        $stmt->execute(array($id));
        $result = $stmt->fetch();

        return $result['id'];
    }

    public static function isExist($id)
    {
        global $con;
        $query = "SELECT * FROM patients WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute(array($id));
        $count = $stmt->rowCount();

        return $count == 1 ? true : false;
    }

    public static function getAll()
    {
        global $con;

        $stmt = $con->prepare('SELECT * FROM patients');
        $stmt->execute();

        $result = $stmt->fetchAll();

        for ($i = 0; $i < sizeof($result); $i++) {
            $result[$i]['image'] = IMAGES_PATH . 'patients/' . $result[$i]['image'];
            $result[$i]['gender'] = $result[$i]['gender'] == 1 ? getLang('ذكر','male') : getLang('أنثى', 'Female');
        }
        return $result;
    }

}