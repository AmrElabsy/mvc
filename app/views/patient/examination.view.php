<?php
include "includes/patient.data.inc.php";
$examinations = $this->data['patient']->examinations;

?>
<div class="row profile">
    <i class="fas fa-user-circle" data-toggle="modal" data-target="#exampleModal" title="Profile"></i>
    <?php
    include "includes/patient.nav.inc.php";
    ?>
    <div class="profile-body col-lg-10 col-md-9 col-xs-12">
        <div class="profile-body-info">
            <h4>Previous appointments</h4>
            <div class="table-responsive col-10 ">
                <table class="table doctors-table col-11 offset-1">
                    <thead>
                    <tr>
                        <th><?php echo getLang('التاريخ', 'Date') ?></th>
                        <th><?php echo getLang('الوقت', 'Time') ?></th>
                        <th><?php echo getLang('الطبيب', 'Doctor') ?></th>
                        <th><?php echo getLang('العيادة', 'Clinic') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($examinations as $examination) {
                        ?>
                        <tr>
                            <td><?php echo $examination['date'] ?></td>
                            <td><?php echo $examination['time'] ?></td>
                            <td><?php echo $examination['doctor'] ?></td>
                            <td><?php echo $examination['clinic'] ?></td>
                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
        <?php
        include "includes/patient.modal.inc.php";
        ?>
        <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <h5>Add Diagnosis</h5>
                        <form method="post">
                            <textarea class="col-12" placeholder="Type The Diagnosis" cols="45"
                                      rows="10"></textarea>
                            <div>
                                <a class="btn save" href="#">Save</a>
                                <a class="btn cancel" href="#">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
