<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="profile-img"><img src="<?php echo $patient->image ?>"></div>
                <h6><?php echo $patient->name ?></h6>
                <ul class="profile-links">
                    <a href="patient/profile/<?php echo $id ?>"><li <?php patSetActive("home");?>><?php echo getLang('الصفحة الشخصية', 'Profile') ?></li></a>
                    <a href="patient/examination/<?php echo $id ?>"><li <?php patSetActive("examinations");?>><?php echo getLang('الفحوصات السابقة','Previous Examinations') ?></li></a>
                    <a href="patient/analysis/<?php echo $id ?>"><li <?php patSetActive("analysis");?>><?php echo getLang('التحاليل','Analysis') ?></li></a>
                    <a href="patient/diagnosis/<?php echo $id ?>"><li <?php patSetActive("diagnosis");?>><?php echo getLang('التشخيصات','Diagnosis') ?></li></a>
                    <a href="patient/scan/<?php echo $id ?>"><li <?php patSetActive("scans");?>><?php echo getLang('الأشعة','Scans') ?></li></a>
                    <a href="patient/prescription/<?php echo $id ?>"><li <?php patSetActive("prescriptions");?>><?php echo getLang('الروشتات','Prescriptions') ?></li></a>
                </ul>
                <!--
                <ul class="profile-icons align-items-end">
                    <li><i class="fab fa-facebook"></i></li>
                    <li><i class="fab fa-whatsapp-square"></i></li>
                    <li><i class="fab fa-twitter-square"></i></li>
                </ul>
                -->
            </div>
        </div>
    </div>
</div>