<?php
$patients = $this->data['patients'];
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
                    <th><?php echo getLang('النوع', 'Gender')?></th>
                    <th><?php echo getLang('محل الميلاد', 'Birth Province')?></th>
                    <th><?php echo getLang('تاريخ الميلاد', 'Birth Date')?></th>
                    <th><?php echo getLang('رقم الهاتف', 'Phone')?></th>
                </tr>
                </thead>
                <tbody>
                <?php $i = 1; foreach ($patients as $patient): ?>
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><a href="/patient/profile/<?php echo $patient['id']?>"><?php echo $patient[getLang("arabname","engname")] ?></a></td>
                        <td><img src="<?php echo $patient['image'] ?>"/></td>
                        <td><?php echo ucfirst($patient['gender']) ?></td>
                        <td><?php echo $patient['birth_province'] ?></td>
                        <td><?php echo $patient['birth_date'] ?></td>
                        <td><?php echo $patient['phone'] ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>