<?php
$doctors = $this->data['attendanceDoctors'];
?>

<div class="body">
    <div class="container-fluid">
        <div class="row Accept-doctor">
            <div class="col-lg-4 col-md-4 col-sm-6"><?php echo getLang('حضور الأطباء', 'Doctors Attendance') ?></div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped doctors-table">
                <thead>
                <tr>
                    <th><?php echo getLang('م', 'No.') ?></th>
                    <th><?php echo getLang('الاسم', 'Name')?></th>
                    <th><?php echo getLang('الصورة', 'Image')?></th>
                    <th><?php echo getLang('العيادة', 'Clinic')?></th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; foreach ($doctors as $doctor): ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $doctor[getLang("arabname","engname")] ?></td>
                        <td><img src="<?php echo $doctor['image'] ?>"/></td>
                        <td><?php echo $doctor[getLang('clinic_arabname', "clinic_engname")]?></td>
                        <td>
                            <?php if ($doctor['attendance'] == 0): ?>
                                <a href="receptionist/setAttended/<?php echo $doctor['id'] ?>" class="btn btn-success attend"><?php echo getLang('تسجيل حضور', "Set Attended") ?></a>
                            <?php else: ?>
                                <a href="receptionist/setAbsent/<?php echo $doctor['id'] ?>" class="btn btn-danger absent"><?php echo getLang("تسجيل غياب","Set Absent"); ?></a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>