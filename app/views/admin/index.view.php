<?php
$number = $this->data['numberInWeek'];
$percentage  = $this->data['percentageOfDone'];
$todaypatients = $this->data['todaysPatients'];
$stats = $this->data['oldAndNewStats'];
$finished = $this->data['finishedappointments'];
$waiting = $this->data['waitingappointments'];
$fpercentage = $this->data['fpercentage'];
$wpercentage = $this->data['wpercentage'];

$presentdoctors = $this->data['presentdoctors'];
$presentcount = $this->data['countPresent'];

$absentDoctors = $this->data['absentdoctors'];
$absentCount = $this->data['absentCount'];

$todayexaminations = $this->data['todayexaminations'];
$recentvisits = $this->data['recentVisits'];


?>
<div class="admin-dashboard">
    <div class="admin-dashboard-header">
        <div class="row">
            <div  class="col-sm-4">
                <div class="_dashboard">
                    <i class="fas fa-chart-line"></i>
                    <h6><?php echo getLang("لوحة الإدارة ", " Dashboard") ?></h6>
                </div>
            </div>
            <!--
            <div class=" col-sm-8">
                <div class="_report text-center">
                    <label>Report: </label>
                    <select name="report_date" data-toggle="toolyip" data-placement="top">
                        <option value="1" class="date" selected>01-7-2019</option>
                        <option value="2" class="date">07-7-2019</option>
                    </select>
                </div>
            </div>
            -->
        </div>
    </div>
    <div class="admin-dashboard-body">
        <div class="appointments_dash row">
            <div class="col-sm-6 col-lg-4">
                <div class="_appointments">
                    <label><?php echo $number ?></label>
                    <span><?php echo $percentage; ?>%</span>
                    <h6> <?php echo getLang(" الحجز لهذا الأسبوع" , " Appointment for Week ") ?> </h6>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width:<?php echo $percentage ?>%;" aria-valuenow="<?php echo $percentage ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $percentage ?>%</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="finished_appointments">
                    <label><?php echo $finished ?></label>
                    <span><?php echo $fpercentage ?>%</span>
                    <h6> <?php echo getLang(" الحجز الذي تم " , " Finished Appointments ") ?></h6>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: <?php echo $fpercentage ?>%;" aria-valuenow="<?php echo $fpercentage ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $fpercentage ?>%</div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-4">
                <div class="remaining_appointments">
                    <label><?php echo $waiting ?></label>
                    <span><?php echo $wpercentage ?>%</span>
                    <h6><?php echo getLang(" الحجز المتبقي  " , " Remaining Appointment ") ?></h6>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: <?php echo $wpercentage ?>%;" aria-valuenow="<?php echo $wpercentage ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $wpercentage ?>%</div>
                    </div>
                </div>
            </div>
            <!--
            <div class="col-sm-6 col-lg-3">
                <div class="cancelled_appointments">
                    <label>10</label>
                    <span>6.6 %</span>
                    <h6>Cancelling appointment</h6>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 6.6%;" aria-valuenow="6.6" aria-valuemin="0" aria-valuemax="100">6.6%</div>
                    </div>
                </div>
            </div>
            -->
        </div>
        <div class="absent-present row">
            <div class="col-sm-12 col-md-6 col-lg-3 order-2 order-lg-1">
                <div class="absent_doctors">
                    <h5><?php echo getLang('الأطباء الغائبين', 'Absent Doctors') ?><span><?php echo $absentCount?></span></h5>
                    <?php
                    $i = 0;
                    foreach ($absentDoctors as $doctor) : ?>
                        <div class="row">
                            <div class="absent-doctor-img col-5"><img src="mvc/public/images/doctors/doctor.png"></div>
                            <div class="absent-doctor-name col-7">
                                <h5><?php echo $doctor['doctor']?></h5>
                                <h6><?php echo $doctor['clinic']?></h6>
                            </div>
                        </div>
                        <?php
                        $i++;
                        if ($i == 4){ break; }
                    endforeach; ?>
                    <span class="chevron" title="Show All" data-toggle="modal" data-target="#absentModal"><i class="fas fa-chevron-down"></i></span>

                </div>
            </div>
            <div class="col-lg-6 col-sm-12 order-1 order-lg-2">
                <div class="old-new">
                    <div id="chartContainer" style="height: 510px; width: 100%; direction:ltr"></div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-3 col-md-6 order-3 order-lg-3">
                <div class="present_doctors">
                    <h5><?php echo getLang('الأطباء الحاضرين','Present Doctors') ?><span><?php echo $presentcount ?></span></h5>
                    <?php
                    $i = 0;
                    foreach($presentdoctors as $row):

                        ?>
                        <div class="row">
                            <div class="present-doctor-img col-5"><img src="mvc/public/images/doctors/doctor.png"></div>
                            <div class="present-doctor-name col-7">
                                <h5><?php echo $row['doctor'];?></h5>
                                <h6><?php echo $row['clinic'];?><h6>
                            </div>
                        </div>
                        <?php
                        $i++;
                        if ($i == 4) { break; }
                    endforeach; ?>

                    <span class="chevron" title="Show All" data-toggle="modal" data-target="#presentModal"><i class="fas fa-chevron-down"></i></span>
                </div>
                
                <div class="modal fade" id="presentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo getLang('كل الأطباء الحاضرين','All Present Doctors') ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                 <div class="present_doctors">
                                     <?php foreach($presentdoctors as $row): ?>
                                         <div class="row">
                                             <div class="present-doctor-img col-5"><img src="public/images/doctors/doctor.png"></div>
                                             <div class="present-doctor-name col-7">
                                                 <h5><?php echo $row['doctor']; ?></h5>
                                                 <h6><?php echo $row['clinic']; ?><h6>
                                             </div>
                                         </div>
                                     <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="absentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo getLang('كل الأطباء الغائبين','All Absent Doctors') ?></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="present_doctors">
                                    <?php foreach($absentDoctors as $row): ?>
                                        <div class="row">
                                            <div class="present-doctor-img col-5"><img
                                                        src="public/images/doctors/doctor.png"></div>
                                            <div class="present-doctor-name col-7">
                                                <h5><?php echo $row['doctor']; ?></h5>
                                                <h6><?php echo $row['clinic']; ?><h6>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="patients-visits row">
            <div class="col-lg-9 col-md-8 col-xs-12">
                <div class="_patients">
                    <h5><?php echo lang('patients') ?></h5>
                    <div class="table-responsive">
                        <table class="table table-striped col-sm-10 col-xs-6">
                            <thead>
                            <tr>
                                <th scope="col"><?php echo getLang('م', 'no') ?></th>
                                <th scope="col"><?php echo getLang('الاسم', 'Name') ?></th>
                                <th scope="col"><?php echo getLang('الميعاد', 'Time') ?></th>
                                <th scope="col"><?php echo getLang('الطبيب','Doctor') ?></th>
                                <th scope="col"><?php echo getLang('الحضور','Attendance') ?></th>
                                <th scope="col"><?php echo getLang('تعديل','Edit') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($todayexaminations as $row): ?>
                                <tr>
                                    <td><?php echo $row['id']?></td>
                                    <td><?php echo $row['patient']?></td>
                                    <td><?php echo $row['time']?></td>
                                    <td><?php echo $row['doctor']?></td>
                                    <td class="<?php echo strtolower($row['attendance']);?>"><?php echo $row['attendance']?></td>
                                    <td>
                                        <a href="#"><i class="fas fa-edit"></i></a>
                                        <a href="#"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-sm-12">
                <div class="recent-visits">
                    <h5><?php echo getLang('آخر الزيارات', 'Recent Visits') ?></h5>
                    <?php foreach($recentvisits as $row): ?>
                        <div class="row">
                            <div class="visit-date col-3">
                                <h6><?php echo $row['time']; ?></h6>
                                <h6><?php echo $row['date']; ?></h6>
                            </div>
                            <div class="visit-doctor-img col-4"><img src="public/images/doctors/doctor.png"></div>
                            <div class="visit-doctor-name col-5">
                                <h5><?php echo $row['doctor']; ?></h5>
                                <h6><?php echo $row['clinic']; ?></h6>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
