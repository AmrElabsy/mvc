<?php

include "includes/patient.data.inc.php";
?>
<div class="row profile">
    <i class="fas fa-user-circle" data-toggle="modal" data-target="#exampleModal" title="Profile"></i>
    <?php
    include "includes/patient.nav.inc.php";
    ?>
    <div class="profile-body col-lg-10 col-md-9 col-xs-12">
        <div class="profile-body-info">
            <a class="btn edit-profile" href="/patient/edit/<?php echo $id ?>"><i class="fas fa-edit"></i> <?php echo getLang('تعديل','Edit') ?></a>
            <h4><?php echo getLang('البيانات الشخصية','Personal Information') ?></h4>
            <div class="row personal-info">
                <div class="col-lg-3 col-md-4 col-sm-5 col-4 bold">
                    <?php echo getLang("الاسم","Name"); ?>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-7 col-8">
                    <?php echo $patient->name ; ?>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-5 col-4 bold">
                    <?php echo getLang("السن","Age"); ?>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-7 col-8">
                    <?php echo $patient->age ; ?>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-5 col-4 bold">
                    <?php echo getLang("تاريخ الميلاد","Birth Date"); ?>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-7 col-8">
                    <?php echo $patient->birth_date ; ?>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-5 col-4 bold">
                    <?php echo getLang("محل الميلاد","Birth Province"); ?>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-7 col-8">
                    <?php echo $patient->birth_province ; ?>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-5 col-4 bold">
                    <?php echo getLang("رقم التليفون","Phone Number"); ?>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-7 col-8">
                    <?php echo $patient->phone ; ?>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-5 col-4 bold">
                    <?php echo getLang("الرقم القومي","National ID"); ?>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-7 col-8">
                    <?php echo $patient->national_id ; ?>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-5 col-4 bold">
                    <?php echo getLang("العنوان","Address"); ?>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-7 col-8">
                    <?php echo $patient->address ; ?>
                </div>
            </div>

            <!--
            <a class="btn add-contacts" href="#"><i class="fas fa-plus"></i>Add Contacts</a>
            <h4>Contacts</h4>
            <table class="contacts col-10" cellpadding="12">
                <tr>
                    <th><i class="fab fa-facebook"></i></th>
                    <td>Mohamed_ahmed1994@gmail.com</td>
                </tr>
                <tr>
                    <th><i class="fab fa-whatsapp-square"></i></th>
                    <td>Mohamed_ahmed1994@gmail.com</td>
                </tr>
                <tr>
                    <th><i class="fab fa-twitter-square"></i></th>
                    <td>01272668993</td>
                </tr>
            </table>
            -->
        </div>
    </div>
    <?php
    include "includes/patient.modal.inc.php";
    ?>
</div>
