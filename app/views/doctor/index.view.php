<?php
$doctors = $this->data['doctors'];
?>

<div class="body">
    <div class="header">
        <div class="row">
            <div class="all-doctors col-sm-4 col-xs-12">
                <i class="fa fa-user"></i>
                <h6><?php echo getlang( "كل الأطباء" , "All Doctors"); ?></h6>
            </div>
            <div class="search col-sm-8 col-xs-12">
                <i class="fa fa-search"></i>
                <input type="search" name="search" placeholder="<?php echo getLang( "البحث" , "Search"); ?>">
            </div>
        </div>
    </div>
    <div class="doctors">
        <div class="clinic_select">
            <select name="clinic" data-toggle="toolyip" data-placement="top">
                <option value="1" disabled selected><?php echo getlang( "اختر العيادة" , " Choose a Clinic" ); ?></option>
                <option value="1" class="clinic">Internal</option>
                <option value="2" class="clinic">Dentist</option>
            </select>
        </div>
        <div class="row">
            <?php foreach($doctors as $doctor) : ?>
                <div class="col-sm-6 col-lg-3">
                    <div class="doctor_info">
                        <div class="doctor_info-img"><img src="<?php echo $doctor['image'] ?>"></div>
                        <div class="doctor_info-name">
                            <h5><?php echo $doctor['name'];?></h5>
                            <p><?php echo $doctor['clinicname'];?></p>
                        </div>
                        <div class="doctor_info-btn text-center">
                            <button class="btn btn-outline-danger" data-toggle="modal"
                                    data-target=".bd-example-modal-lg"><i class="fa fa-user"></i><?php echo getlang("عرض الصفحة الشخصية" ,"View Profile"); ?>
                            </button>
                            <br/>
                            <a href="home/makeappointment" class="btn btn-outline-success"><?php echo getlang("حجز" , "Make an Appointment " ); ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="content">
                        <button title="Close" type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="row">
                            <div class="col-xs-12 col-lg-4">
                                <div class="profile-info">
                                    <div class="profile-info-img"><img src="public/images/doctors/doctor.png"></div>
                                    <div class="profile-info-name">
                                        <h5>Dr/ Asmaa Khaled</h5>
                                        <h4>Contacts</h4>
                                        <i class="fab fa-facebook"></i>
                                        <p>Dr/Asmaa Khaled</p>
                                        <br>
                                        <i class="fab fa-whatsapp-square"></i>
                                        <p>01272662693</p>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-8">
                                <div class="personal-info">
                                    <a class="btn" href="home/makeappointment">Make Appointment</a>
                                    <h4>Personal Information</h4>
                                    <table cellpadding="20">
                                        <tr>
                                            <td>Name</td>
                                            <td>Asmaa Khaled Mahmoud Fathy</td>
                                        </tr>
                                        <tr>
                                            <td>Specialization</td>
                                            <td>Dentist</td>
                                        </tr>
                                        <tr>
                                            <td>Age</td>
                                            <td>35 years old</td>
                                        </tr>
                                    </table>
                                    <h4>Appointments</h4>
                                    <table class="table table-borderless">
                                        <thead>
                                        <tr>
                                            <th scope="col">Day</th>
                                            <th scope="col">From</th>
                                            <th scope="col">To</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        <tr>
                                            <td scope="row">Saturday</td>
                                            <td>8 am</td>
                                            <td>1 pm</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Tuesday</td>
                                            <td>1 pm</td>
                                            <td>5 pm</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">Thursday</td>
                                            <td>10 am</td>
                                            <td>3 pm</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>