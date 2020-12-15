<?php
$todayPatients = $this->data['todayPatients'];
$todayPatientsCount = $this->data['todayPatientsCount'];
$waitingToday = $this->data['waitingToday'];
$attendedToday = $this->data['attendedToday'];
?>

<div class="doctor-dashboard-body">
    <div class="doctor-dashboard-header">
        <div class="row">
            <div class="present_patient col-sm-4 col-xs-12">
                <i class="fa fa-user"></i>
                <h6><?php echo getLang('مرضى اليوم','Today\'s Patients') ?></h6>
            </div>
            <!--
            <div class="search col-sm-8 col-xs-12">
                <i class="fa fa-search"></i>
                <input type="search" name="search" placeholder="Search For a Patient">
            </div>
            -->
        </div>
    </div>
    <div class="doctor-dashboard-body">
        <div class="patients-waiting-attend">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="patient_no">
                        <label><?php echo getLang('عدد مرضى اليوم','All Today\'s Patients') ?></label>
                        <span><?php echo $todayPatientsCount ?></span>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="patient_waiting">
                        <label><?php echo getLang('المرضى المنتظرين','Patient Waiting') ?></label>
                        <span><?php echo $waitingToday ?></span>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="patient_attend">
                        <label><?php echo getLang('المرضى الحضور','Patients Attended') ?></label>
                        <span><?php echo $attendedToday ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="today-patients">
            <h5><?php echo getLang("مرضى اليوم", "Today Patients") ?></h5>
            <div class="table-responsive">
                <table class="table col-sm-10 col-6">
                    <thead>
                    <tr>
                        <th scope="col"><?php echo getLang("م", "No") ?></th>
                        <th scope="col"><?php echo getLang("الاسم", "Name") ?></th>
                        <th scope="col"><?php echo getLang("الرقم القومي", "National ID")?></th>
                        <th scope="col"><?php echo getLang("تاريخ الميلاد", "Date of Birth")?></th>
                        <th scope="col"><?php echo getLang("محل الميلاد", "Place of Birth") ?></th>
                        <th scope="col"><?php echo getLang("النوع","Type")?></th>
                        <th scope="col"><?php echo getLang("التحكم", "Manage")?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    foreach ($todayPatients as $patient) :?>
                        <tr>
                            <td><?php echo $i++ ?></td>
                            <td><a href="/patient/profile/<?php echo $patient['patient_id'] ?>"><?php echo $patient['name'] ?></a></td>
                            <td><?php echo $patient['national_id'] ?></td>
                            <td><?php echo $patient['birth_date'] ?></td>
                            <td><?php echo $patient['birth_province'] ?></td>
                            <td class="<?php echo strtolower($patient['type']) ?>"><?php echo getLang($patient['type'] == 'Old' ? 'قديم': 'جديد',$patient['type']) ?></td>

                            <?php if ($patient['status'] == 0) : ?>
                                <td><a href="/doctor/dashboard/attend/<?php echo $patient['id'] ?>" class="btn"><?php echo getLang('تسجيل حضور','Attend') ?></a></td>
                            <?php else : ?>
                                <td><a href="/doctor/dashboard/notattend/<?php echo $patient['id'] ?>" class="btn"><?php echo getLang('إلغاء الحضور','Cancel Attendance') ?></a></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>