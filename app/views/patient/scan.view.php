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
            <a class="btn add-diagnosis" href="#" data-toggle="modal" data-target="#exampleModal1"><i class="fas fa-plus"></i> <?php echo getLang("إضافة روشتة جديدة", "Add New Prescription") ?></a>
            <h4>Prescription</h4>
            <div class="diagnosis-body col-10">
                <div class="row">
                    <div class="col-lg-6 col-12">
                        <div class="diagnosis">
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut l Lorem ipsum dolor sit amet, consectetur adipiscing
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    Lorem ipsum  ctetur adipiscing elit, sed do eiusmod
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                </p>
                            </div>
                            <h5>15/05/2019</h5>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="diagnosis">
                            <div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    tempor incididunt ut l Lorem ipsum dolor sit amet, consectetur adipiscing
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                    Lorem ipsum  ctetur adipiscing elit, sed do eiusmod
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                </p>
                            </div>
                            <h5>15/05/2019</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include "includes/patient.modal.inc.php";
    ?>
</div>
