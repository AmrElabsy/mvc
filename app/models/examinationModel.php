<?php


class examinationModel extends AbstractModel
{
    private $id;
    public $doctor;
    public $clinic;
    public $patient;
    public $date;
    public $status;

    public function __construct($id)
    {
        global $con;

        $stmt = $con->prepare("SELECT
                                    examinations.*,
                                    doctors.arabname AS docter_arabname,
                                    doctors.engname AS doctor_engname,
                                    patients.arabname AS patient_arabname,
                                    patients.engname AS patient_engname,
                                    clinics.arabname AS clinic_arabname,
                                    clinics.engname AS clinic_engname
                                FROM examinations
                                INNER JOIN doctors
                                ON examinations.doctor_id = doctors.id
                                INNER JOIN patients 
                                ON examinations.patient_id = patients.id
                                INNER JOIN clinics
                                ON doctors.id = clinics.id
                                WHERE examinations.id = ?");
        $stmt->execute(array($id));
        $row = $stmt->fetch();

        $this->id = $id;
        $this->date = $row['date'];
        $this->doctor = getLang($row['docter_arabname'], $row['doctor_engname']);
        $this->patient = getLang($row['patient_arabname'], $row['patient_engname']);
        $this->clinic = getLang($row['clinic_arabname'], $row['clinic_engname']);
    }

    public static function numberInWeek() {
        global $con;
        $query = "SELECT COUNT(id) FROM examinations WHERE WEEK(examinations.date) = WEEK(CURRENT_DATE)";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
        $number = $row['COUNT(id)'];

        return $number;
    }

    public static function doneInWeek(){
        global $con;
        $total = examinationModel::numberInWeek();
        $query = "SELECT COUNT(id) FROM examinations WHERE WEEK(examinations.date) = WEEK(CURRENT_DATE) AND status != 0";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
        $done = $row['COUNT(id)'];

        $pecentage = $total == 0 ? 0 : $done * 100 / $total;
        $pecentage = number_format($pecentage, 2);
        return $pecentage;

    }

    public static function getToday()
    {
        global $con;

        $query = "SELECT examinations.* ,";
        $query .= getLang("patients.arabname AS patient, doctors.arabname AS doctor","patients.engname AS patient, doctors.engname AS doctor");
        $query .= " FROM 
                        examinations 
                    INNER JOIN patients 
                    ON examinations.patient_id = patients.id 
                    INNER JOIN doctors 
                    ON examinations.doctor_id = doctors.id
                    WHERE date = CURRENT_DATE";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll();

        return$result;
    }

    public static function oldAndNewStats()
    {
        global $con;

        $dates = array();
        for($i = -3; $i < 4; $i++) {
            $day = time() + ($i * 24 * 60 * 60);
            $dates[] = date('y-m-d',$day);
        }
        $stats = array();
        $i = 0;

        foreach ($dates as $date) {
            $query = "SELECT * FROM examinations WHERE date = ?";
            $stmt = $con->prepare($query);
            $stmt->execute(array($date));
            $result = $stmt->fetchAll();
            $stats[$i]['date'] = $date;
            $stats[$i]['old'] = 0;
            $stats[$i]['new'] = 0;

            foreach ($result as $examination) {
                $query = "SELECT COUNT(*) FROM examinations WHERE date < ? AND patient_id = ?";
                $stmt = $con->prepare($query);
                $stmt->execute(array($date, $examination['patient_id']));
                $row = $stmt->fetch();
                $count = $row['COUNT(*)'];
                if ($count == 0) {
                    $stats[$i]['new']++;
                } else {
                    $stats[$i]['old']++;
                }
            }
            $i++;
        }

        return $stats;
    }

    public static function finishedAppointments()
    {
        global $con;
        $query = "SELECT COUNT(id) FROM examinations WHERE WEEK(examinations.date) = WEEK(CURRENT_DATE) AND status != 0";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
        $number = $row['COUNT(id)'];

        return $number;
    }

    public static function waitingAppointments()
    {
        global $con;
        $query = "SELECT COUNT(id) FROM examinations WHERE WEEK(examinations.date) = WEEK(CURRENT_DATE) AND status = 0";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
        $number = $row['COUNT(id)'];

        return $number;
    }

    public static function finishedAppointmentsPercentage()
    {
        global $con;
        $total = examinationModel::numberInWeek();
        $query = "SELECT COUNT(id) FROM examinations WHERE WEEK(examinations.date) = WEEK(CURRENT_DATE) AND status != 0";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
        $done = $row['COUNT(id)'];

        $percentage = $total != 0 ? $done * 100 / $total : 0;
        $percentage = number_format($percentage, 2);
        return $percentage;
    }


    public static function waitingAppointmentsPercentage()
    {
        global $con;
        $total = examinationModel::numberInWeek();
        $query = "SELECT COUNT(id) FROM examinations WHERE WEEK(examinations.date) = WEEK(CURRENT_DATE) AND status = 0";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
        $waiting = $row['COUNT(id)'];

        $pecentage = $total != 0 ? $waiting * 100 / $total : 0;
        $pecentage = number_format($pecentage, 2);
        return $pecentage;
    }

    public static function recentVisits()
    {
        global $con;
        $query = "SELECT examinations.*,";
        $query .= getLang("clinics.arabname AS clinic, doctors.arabname AS doctor","clinics.engname AS clinic, doctors.engname AS doctor");
        $query .= " FROM 
                        doctors 
                    INNER JOIN examinations 
                    ON doctors.id = examinations.doctor_id 
                    INNER JOIN clinics 
                    ON doctors.clinic_id = clinics.id
                   WHERE examinations.date = CURRENT_DATE 
                   AND examinations.status = 1
                   ORDER BY examinations.id DESC
                   LIMIT 5";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $row = $stmt->fetchAll();

        return $row;
    }

    public static function getTodayExaminations()
    {
        global $con;
        $query = "SELECT examinations.*, patients.id AS patient_id, doctors.id AS doctor_id, ";
        $query .= getLang("patients.arabname AS patient, doctors.arabname AS doctor","patients.engname AS patient, doctors.engname AS doctor");
        $query .= " FROM 
                        examinations
                    INNER JOIN patients 
                    ON examinations.patient_id = patients.id 
                    INNER JOIN doctors 
                    ON examinations.doctor_id = doctors.id
                    WHERE examinations.date = CURRENT_DATE
                    ORDER BY examinations.id ASC";
        $stmt = $con->prepare($query);
        $stmt->execute();
        $row = $stmt->fetchAll();
        $count = $stmt->rowCount();

        for ($i = 0; $i < $count; $i++) {
            $patient_id = $row[$i]['patient_id'];
            $doctor_id = $row[$i]['doctor_id'];
            $stmt = $con->prepare("SELECT
                                                examinations.*
                                            FROM examinations
                                            WHERE examinations.patient_id = ?
                                            AND examinations.doctor_id = ? 
                                            AND examinations.date = CURRENT_DATE");
            $stmt->execute(array($patient_id, $doctor_id));
            $stat = $stmt->fetch();
            $status = $stat['status'];
            if ($status == 0) {
                $row[$i]['attendance'] = "Wait";
            } else {
                $row[$i]['attendance'] = "Attend" ;
            }
        }

        return $row;
    }



    public function setAttented() {
        global $con;
        $query = "UPDATE examinations
                    SET status = 1 
                    WHERE id = ?";

        $statement = $con->prepare($query);

        $statement->execute(array($this->id));
    }

    public function setNotAttended() {
        global $con;
        $query = "UPDATE examinations
                    SET status = 0 
                    WHERE id = ?";

        $statement = $con->prepare($query);

        $statement->execute(array($this->id));
    }
}