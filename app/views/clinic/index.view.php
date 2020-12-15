<?php
$clinics = $this->data['clinics'];
?>
<div class="clinic-body">
    <div class="clinic-header">
        <div class="row">
            <div class="all-head col-sm-4 col-xs-12">
                <i class="fas fa-clinic-medical"></i>
                <h6>All Clinics</h6>
            </div>
            <div class="search col-sm-8 col-xs-12">
                <i class="fa fa-search"></i>
                <input type="search" name="search" placeholder="Search">
            </div>
        </div>
    </div>
    <div class="all-clinics">
        <?php if(isAdmin()) : ?>
        <div class="add-clinic">
            <a href="clinic/add" class="btn btn-success"><i class="fas fa-plus"></i> <?php echo getLang('إضافة عيادة جديدة','Add a New Clinic'); ?></a>
        </div>
        <?php endif; ?>
        <div class="row">
            <?php foreach ($clinics as $clinic): ?>
                <div class="col-sm-6 col-lg-4">
                    <div class="clinic-info">
                        <?php if (isAdmin()): ?>
                            <a href="/clinic/edit/<?php echo $clinic['id'] ?>" class="btn btn-primary edit-button"><i class="fas fa-edit"></i> <?php echo getLang('تعديل', 'Edit'); ?></a>
                        <?php endif; ?>
                        <div class="clinic-info-img"><img src="<?php echo IMAGES_PATH . 'clinics/' . $clinic['image'] ?>"></div>
                        <div class="clinic-info-name"><?php echo $clinic[getLang("arabname",'engname')];?></div>
                        <div class="clinic-info-btn text-center">
                            <a href="#" class="btn btn-outline-success"><?php echo getLang('حجز ميعاد','Make an Appointment')?></a>
                            <a href="#" class="btn btn-outline-danger"><?php echo getLang("عرض الأطباء","Show Doctors")?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>