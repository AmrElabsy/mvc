<?php

    include 'abstractcontroller.php';

    class admin extends AbstractController
    {
        public function index()
        {
            global $page;
            $page = 'admin-dashboard';
            if (true) {
                $this->data['numberInWeek'] = examinationModel::numberInWeek();
                $this->data['percentageOfDone'] = examinationModel::doneInWeek();
                $this->data['todaysPatients'] = examinationModel::getToday();
                $this->data['oldAndNewStats'] = examinationModel::oldAndNewStats();

                $this->data['finishedappointments'] = examinationModel::finishedAppointments();
                $this->data['waitingappointments'] = examinationModel::waitingAppointments();
                $this->data['fpercentage'] = examinationModel::finishedAppointmentsPercentage();
                $this->data['wpercentage'] = examinationModel::waitingAppointmentsPercentage();

                $this->data['presentdoctors'] = doctorModel::presentDoctors();
                $this->data['countPresent'] = doctorModel::presentDoctorsCount();

                $this->data['absentdoctors'] = doctorModel::absentDoctors();
                $this->data['absentCount'] = doctorModel::absentDoctorCount();

                $this->data['recentVisits'] = examinationModel::recentVisits();

                $this->data['todayexaminations'] = examinationModel::getTodayExaminations();


                $this->view();
            } else {
                redirect();
            }

        }
    }