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
            <?php if(isDoctor()): ?>
            <a class="btn add-diagnosis" href="#" data-toggle="modal" data-target="#exampleModal1"><i class="fas fa-plus"></i>Add New Prescription</a>
            <?php endif; ?>
            <h4><?php echo getLang("التحاليل","Analyses") ?></h4>
            <div class="diagnosis-body col-10">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="diagnosis">
                            <div class="text-center">
                                <img src="public/images/scan.jpg">
                            </div>
                            <h5>15/05/2019</h5>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="diagnosis">
                            <div class="text-center">
                                <img src="public/images/test.jpg">
                            </div>
                            <h5>15/05/2019</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include "includes/patient.modal.inc.php"; ?>
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5>Add Analysis</h5>
                        <form method="post">
                            <input type="file" class="col-12 filestyle" cols="45" rows="10">
                            <div>
                                <a class="btn save" href="patient/analysis">Save</a>
                                <a class="btn cancel" href="patient/analysis">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>