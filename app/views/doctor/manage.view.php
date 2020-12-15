<?php
$doctors = $this->data['doctor'];
?>
<div class="container-fluid">
    <div class="row Accept-doctor">
        <div class="col-lg-4 col-md-4 col-sm-6"><?php echo لgetlang( " بيانات كل الأطباء   " , " Data_of_all_doctors "); ?></div>
        <div class="col-lg-2 col-md-4 col-sm-6 offset-lg-6 offset-md-4">
            <a class="btn btn-danger" href="#"><i class="fa fa-user-plus"></i> <?php echo getlang(  " قبول طبيب جديد  " , " Accept_new_doctor "); ?></a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped doctors-table">
            <thead>
            <tr>
                <th><?php echo getlang(" رقم  " , " No " );?></th>
                <th><?php echo getlang( " الإسم  " , " Name ");?></th>
                <th><?php echo getlang(" الصورة  " , " Image ");?></th>
                <th><?php echo getlang( "البريد الإلكتروني" ,  " E-mail ");?></th>
                <th><?php echo getlang( "  رقم الهاتف " ,"Phone_number");?></th>
                <th><?php echo getlang( " جهات  الإتصال   " , " Contacts ");?></th>
                <th><?php echo getlang( " الإدارة " , " Manage ");?></th>
            </tr>
            </thead>
            <tbody>

            <?php

            foreach($doctors as $doctor)
            {
                ?>
                <tr>
                    <td><?php echo $doctor['id'];?></td>
                    <td><?php echo $doctor[lang('DBname')];?></td>
                    <td><img src="<?php echo $doctor['image'];?>"></td>
                    <td><?php echo $doctor['email'];?></td>
                    <td><?php echo $doctor['phone'];?></td>
                    <td></td>
                    <td>
                        <a href="<?php echo 'doctor/edit/'.$doctor['id'];?>" class='btn btn-primary'><i class="fa fa-edit"></i> <?php echo getlang( " التعديل   " ," Edit");?></a>

                        <?php
                        if ($doctor['activation'] == 1) {
                            ?>
                            <a href="<?php echo 'doctor/manage/'.$doctor['id'];?>" class='btn btn-danger'><?php echo getlang( " إلغاء التفعيل   "  , " deactivation ");?></a>
                            <?php
                        } else {
                            ?>
                            <a href="<?php echo 'doctor/manage/' . $doctor['id']; ?>" class='btn btn-success'><?php echo getlang(  " التفعيل  " ,  " Activation "); ?></a>

                            <?php
                        }
                        ?>
                    </td>

                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>