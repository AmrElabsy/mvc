<?php
include 'includes/patient.data.inc.php'
?>
<div class="row profile">
    <i class="fas fa-user-circle" data-toggle="modal" data-target="#exampleModal" title="Profile"></i>
    <?php
    include "includes/patient.nav.inc.php";
    ?>
    <div class="profile-body col-lg-10 col-md-9 col-xs-12">
        <div class="profile-body-info">
            <h4>Personal Information</h4>
            <div class="row personal-info">
                <div class="col-lg-3 col-md-4 col-sm-5 col-4 bold">
                    <?php echo getLang("الاسم","Name"); ?>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-7 col-8">
                    <input id="name" type="text" name="name" class="col-lg-6 col-md-10 form-control" value="<?php echo $patient->name ?>">
                </div>

                <div class="col-lg-3 col-md-4 col-sm-5 col-4 bold">
                    <?php echo getLang("السن","Age"); ?>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-7 col-8">
                    <input type="number" class="form-control col-3" disabled value="<?php echo $patient->age ; ?>">
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
            <table class="personal-info col-10" cellpadding="10">

                <tr>
                    <th class="col-3">Name</th>
                    <td><input id="name" type="text" name="name" class="col-6 form-control"></td>
                </tr>
                <tr>
                    <th class="col-3">Date of Birth</th>
                    <td><input type="date" class="form-control col-3 text-center"></td>
                </tr>
                <tr>
                    <th class="col-3">Place of Birth</th>
                    <td><input id="place_of_birth" type="text" name="b_of_birth" class="col-6 form-control"></td>
                </tr>
                <tr>
                    <th class="col-3">Email</th>
                    <td><input id="E-mail"  type="email" name="E-mail" class="col-6 form-control"></td>
                </tr>
                <tr>
                    <th class="col-3">Phone Number</th>
                    <td><input id="phone" type="text" name="phone" class="col-6 form-control"></td>
                </tr>
                <tr>
                    <th class="col-3">National Number</th>
                    <td><input id="nat_id" type="text" name="nat_id" class="col-6 form-control"></td>
                </tr>
                <tr>
                    <th class="col-3">Address</th>
                    <td><input id="address" type="text" name="address" class="col-6 form-control" placeholder=""></td>
                </tr>
            </table>
            <h4>Contacts</h4>
            <table class="contacts col-10" cellpadding="10">
                <tr>
                    <th class="col-3"><i class="fab fa-facebook"></i></th>
                    <td><input id="facebook" type="text" name="facebook" class="col-6 form-control"></td>
                </tr>
                <tr>
                    <th class="col-3"><i class="fab fa-whatsapp-square"></i></th>
                    <td><input id="whatsapp" type="text" name="whatsapp" class="col-6 form-control"></td>
                </tr>
                <tr>
                    <th class="col-3"><i class="fab fa-twitter-square"></i></th>
                    <td><input id="twitter" type="text" name="twitter" class="col-6 form-control"></td>
                </tr>
            </table>
        </div>
    </div>
    <?php
    include "includes/patient.modal.inc.php";
    ?>
</div>
