<?php $myAcc = isset($this->data['myAcc']) ? $this->data['myAcc'] : ''; ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><i class="fa fa-plus"></i> <?php echo getLang("مستشفى جامعة كفر الشيخ","Kafr El-Shiekh Hospital") ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link <?php setActive('home'); ?>" href="/"><?php echo lang('home_page') ?> </a></li>
                <li class="nav-item"><a class="nav-link <?php setActive('doctors'); ?>" href="doctor"><?php echo lang('doctors') ?> </a></li>
                <li class="nav-item"><a class="nav-link <?php setActive('clinics'); ?>" href="clinic"><?php echo lang('clinics') ?> </a></li>
                <?php if(isAdmin()): ?>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo getLang("لوحة الإدارة","Dashboard") ?></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="admin"><?php echo getLang('لوحة إدارة المدير', "Admin Dashboard") ?></a>
                            <a class="dropdown-item" href="doctor/dashboard"><?php echo getLang('لوحة إدارة الطبيب', "Doctor Dashboard") ?></a>
                        </div>
                    </li>
                <?php endif; ?>
                <?php if (isDoctor() && !isAdmin()): ?>
                    <li class="nav-item"><a class="nav-link <?php setActive('doctor-dashboard'); ?>" href="doctor/dashboard"><?php echo getLang('لوحة إدارة الطبيب', "Doctor Dashboard") ?> </a></li>
                <?php endif; ?>
                <?php if(isDoctor()): ?>
                    <li class="nav-item"><a class="nav-link <?php setActive('doctor-dashboard'); ?>" href="patient"><?php echo getLang("المرضى","Pateints") ?> </a></li>
                    <!--<li class="nav-item"><a class="nav-link <?php setActive('doctor-dashboard'); ?>" href="/doctor/schedule"><?php echo getLang("جدول اليوم","Schedule") ?> </a></li>-->
                <?php endif; ?>
                <?php if (isReceptionist()): ?>
                    <li class="nav-item"><a class="nav-link <?php setActive('doctor-dashboard'); ?>" href="receptionist/doctor"><?php echo getLang("حضور الأطباء","Doctors Attendance") ?></a></li>
                    <li class="nav-item"><a class="nav-link <?php setActive('doctor-dashboard'); ?>" href="receptionist"><?php echo getLang("المرضى","Patients") ?></a></li>
                <?php endif; ?>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="btn btn-success" href="home/makeappointment"><?php echo lang('make_appointment') ?></a></li>

                <?php if (isDoctor() || isReceptionist()): ?>
                    <li class="nav-item-img"><img src="<?php echo $myAcc->image ?>"></li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $myAcc->name ?></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php if (isDoctor()): ?>
                            <a class="dropdown-item" href="/doctor/profile"><?php echo getLang("الصفحة الشخصية", "Profile") ?></a>
                        <?php endif; ?>
                        <a class="dropdown-item" href="/home/logout"><?php echo getLang("تسجيل الخروج", "Log Out") ?></a>
                    </div>
                </li>
                <?php endif; ?>

                <?php if(isVisitor()): ?>
                    <li class="nav-item"><a class="nav-link <?php setActive('Login'); ?>" href="home/signin"> <i class="fa fa-user"></i> <?php echo getLang("تسجيل الدخول", 'Login') ?></a></li>
                    <li class="nav-item"><a class="nav-link <?php setActive('signup'); ?>" href="home/signup"> <i class="fa fa-user"></i> <?php echo getLang("تسجيل",'Sign Up') ?></a></li>
                <?php endif; ?>
                <?php if(isArabic()): ?>
                    <li class="nav-item"><a class="nav-link" href="language/english">اللغة الإنجليزية</a></li>
                <?php endif; ?>
                <?php if(isEnglish()): ?>
                    <li class="nav-item"><a class="nav-link" href="language/arabic">Arabic</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
