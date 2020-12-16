<?php


class doctorModel extends AbstractModel
{
    protected $id;
    public $name;
    public $arabname;
    public $engname;
    public $mail;
    public $national_id;
    public $clinic_name;
    public $clinic_id;
    public $image;
    public $phone;
    public $isActivated;
    public $access;
    protected static $tableName = 'doctors';


    public function __construct($id)
    {
        global $con;
        $this->id = $id;
        $query = "SELECT doctors.*, ";
        $query .= getLang("clinics.arabname AS clinic ", "clinics.engname AS clinic ");
        $query .= "FROM doctors 
                    INNER JOIN clinics
                    ON doctors.clinic_id = clinics.id
                    WHERE doctors.id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute(array($this->id));
        $doc = $stmt->fetch();
        $this->name = getLang($doc['arabname'], $doc['engname']);
        $this->arabname = $doc['arabname'];
        $this->engname = $doc['engname'];
        $this->mail = $doc['email'];
        $this->national_id = $doc['national_id'];
        $this->clinic_id = $doc['clinic_id'];
        $this->clinic_name = $doc['clinic'];
        $this->image = IMAGES_PATH . "doctors/".  $doc['image'];
        $this->phone = $doc['phone'];
        $this->access = $doc['access'];

        $this->isActivated = $this->isActivated();
    }

    public function getTodayPatients() {
        global $con;

        $stmt = $con->prepare('SELECT 
                                             '.
                                            getLang('patients.arabname AS name, ','patients.engname AS name, ')
                                            .' 
                                            patients.*,
                                            examinations.*  
                                        FROM examinations 
                                        INNER JOIN patients
                                        ON examinations.patient_id = patients.id
                                        WHERE examinations.doctor_id = ? AND date = CURRENT_DATE');
        $stmt->execute(array($this->id));

        $result = $stmt->fetchAll();
        $totalCount = $stmt->rowCount();


        for ($i = 0; $i < $totalCount; $i++) {

            $patient_id = $result[$i]['patient_id'];
            $doctor_id = $result[$i]['doctor_id'];

            $query = "SELECT COUNT(*) FROM examinations WHERE date < CURRENT_DATE AND patient_id = ? AND doctor_id = ?";
            $stmt = $con->prepare($query);
            $stmt->execute(array($patient_id, $doctor_id));
            $row = $stmt->fetch();
            $count = $row['COUNT(*)'];

            if ($count == 0) {
                $result[$i]['type'] = 'New';
            } else {
                $result[$i]['type'] = 'Old';
            }
        }
        return $result;
    }

    public function getWaitingToday() {
        global $con;

        $stmt = $con->prepare('SELECT COUNT(id) FROM examinations WHERE date = CURRENT_DATE AND doctor_id = ? AND status = 0');
        $stmt->execute(array($this->id));

        $row = $stmt->fetch();
        $count = $row['COUNT(id)'];

        return $count;
    }

    public function getAttendedToday() {
        global $con;

        $stmt = $con->prepare('SELECT COUNT(id) FROM examinations WHERE date = CURRENT_DATE AND doctor_id = ? AND status = 1');
        $stmt->execute(array($this->id));

        $row = $stmt->fetch();
        $count = $row['COUNT(id)'];

        return $count;
    }

    public function todayPatientsCount() {
        global $con;

        $patients = $this->getTodayPatients();
        $count = count($patients);

        return $count;
    }

    public function update()
    {
        global $con;
        $arabname = $this->arabname;
        $engname = $this->engname;
        $email = $this->mail;
        $national_id = $this->national_id;
        $clinic_id = $this->clinic_id;
        $image = $this->image;
        $phone = $this->phone;


        $query = "UPDATE doctors SET 
                    arabname =?,
                    engname = ?,
                    email = ?,
                    national_id = ?,
                    clinic_id = ?,
                    image = ?,
                    phone = ?
                  WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute(array());
    }

    public function setAttended()
    {
        global $con;
        $id = $this->id;
        $stmt = $con->prepare("INSERT INTO doctor_attendance(doctor_id, day) VALUES(?, CURRENT_DATE)");
        $stmt->execute(array($id));
    }

    public function setAbsent()
    {
        global $con;
        $id = $this->id;
        $stmt = $con->prepare("DELETE FROM doctor_attendance WHERE doctor_id = ? AND day = CURRENT_DATE");
        $stmt->execute(array($id));
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
        $clinic = $data['clinic'];


        $stmt = $con->prepare('INSERT INTO 
                                        doctors(
                                                 national_id,
                                                 arabname,
                                                 engname,
                                                 email,
                                                 password,
                                                 salt,
                                                 clinic_id,
                                                 activation,
                                                 phone,
                                                 access
                                                 )
                                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
        $stmt->execute(array($national_id, $arabname, $engname, $mail, $pass, $salt, $clinic,0 ,$phone , 0));
    }

    public static function getAll()
    {
        global $con;
        $query = "SELECT doctors.*, doctors." . getLang('arabname', 'engname') . " AS name,";
        $query .= getLang("clinics.arabname AS clinicname", "clinics.engname AS clinicname");
        $query .= " FROM doctors INNER JOIN clinics ON clinics.id = doctors.clinic_id";
        $stmt = $con->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll();

        for ($i = 0; $i < sizeof($result); $i++){
            $result[$i]['image'] = IMAGES_PATH . "doctors/" . $result[$i]['image'];
        }

        return $result;
    }

    public static function getDoctorsByLimit($limit)
    {
        global $con;
        $stmt = $con->prepare("SELECT 
                                            doctors.*,
                                            doctors." . getLang('arabname', 'engname') . " AS name, 
                                            clinics." . getLang('arabname', 'engname') . " AS clinic 
                                       FROM doctors 
                                       INNER JOIN clinics
                                       ON doctors.clinic_id = clinics.id 
                                       WHERE activation = 1
                                       ORDER BY RAND() 
                                       LIMIT 0, ? ");

        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetchAll();

        for ($i = 0; $i < sizeof($result); $i++){
            $result[$i]['image'] = IMAGES_PATH . "doctors/" . $result[$i]['image'];
        }

        return $result;
    }

    public static function getDoctors()
    {
        global $con;
        $stmt = $con->prepare("select * from doctors");
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    public static function presentDoctors()
    {
        global $con;

        $query = "SELECT doctor_attendance.*,";
        $query .= getLang("clinics.arabname AS clinic, doctors.arabname AS doctor","clinics.engname AS clinic, doctors.engname AS doctor");
        $query .= " FROM 
                        doctors 
                    INNER JOIN doctor_attendance 
                    ON doctors.id = doctor_attendance.doctor_id 
                    INNER JOIN clinics 
                    ON doctors.clinic_id = clinics.id
                    WHERE doctor_attendance.day = CURRENT_DATE";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    public static function presentDoctorsCount()
    {
        global $con;
        $query = "SELECT COUNT(id) FROM doctor_attendance WHERE doctor_attendance.day = CURRENT_DATE";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
        $present = $row['COUNT(id)'];

        return $present;
    }

    public static function absentDoctors()
    {
        global $con;

        $query = "SELECT 
                    doctors.".getLang('arabname', 'engname')." AS doctor, 
                    clinics.".getLang('arabname', 'engname')." AS clinic 
                  FROM doctors 
                  INNER JOIN clinics 
                  ON doctors.clinic_id = clinics.id 
                  WHERE NOT EXISTS 
                        (SELECT 
                            doctor_attendance.doctor_id 
                         FROM doctor_attendance 
                         WHERE doctors.id = doctor_attendance.doctor_id 
                         AND doctor_attendance.day = CURRENT_DATE)";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return $result;
    }

    public static function absentDoctorCount()
    {
        global $con;

        $query = "SELECT 
                    doctors.".getLang('arabname', 'engname')." AS doctor, 
                    clinics.".getLang('arabname', 'engname')." AS clinic 
                  FROM doctors 
                  INNER JOIN clinics 
                  ON doctors.clinic_id = clinics.id 
                  WHERE NOT EXISTS 
                        (SELECT 
                            doctor_attendance.doctor_id 
                         FROM doctor_attendance 
                         WHERE doctors.id = doctor_attendance.doctor_id 
                         AND doctor_attendance.day = CURRENT_DATE)";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $count = $stmt->rowCount();

        return $count;

    }

    public static function getAttendanceDoctors() {
        global $con;

        $stmt = $con->prepare("SELECT 
                                            DISTINCT doctors.*, doctor_attendance.doctor_id, doctor_attendance.day, clinics.engname AS clinic_engname, clinics.arabname AS clinic_arabname  
                                        FROM doctors 
                                            LEFT OUTER JOIN doctor_attendance 
                                            ON doctors.id = doctor_attendance.doctor_id 
                                            INNER JOIN clinics
                                            ON doctors.clinic_id = clinics.id
                                            ORDER BY doctor_attendance.id DESC");
        $stmt->execute();

        $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $existed = array();
        $result = array();
        for ($i = 0; $i < sizeof($arr); $i++){
            if (in_array($arr[$i]['id'], $existed)) {
                continue;
            } else {
                $existed[] = $arr[$i]['id'];

                $isToday = (strtotime($arr[$i]['day']) == strtotime(date('y-m-d')));
                $arr[$i]['attendance'] = $isToday ? 1 : 0;

                $arr[$i]['image'] = IMAGES_PATH . "doctors/". $arr[$i]['image'];

                $result[$i] = $arr[$i];
            }
        }
        $result = array_reverse($result);
        return $result;
    }

    private function isActivated()
    {
        global $con;
        $stmt = $con->prepare("SELECT activation FROM doctors WHERE id = ?");
        $stmt->execute(array($this->id));
        $result = $stmt->fetch();
        $result = $result['activation'];

        return $result == 1 ? true : false;
    }

    public function activate()
    {
        global $con;
        $query = "UPDATE doctors SET activation = 1 WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute(array($this->id));
    }

    public function deactivate()
    {
        global $con;
        $query = "UPDATE doctors SET activation = 0 WHERE id = ?";
        $stmt = $con->prepare($query);
        $stmt->execute(array($this->id));
    }

}