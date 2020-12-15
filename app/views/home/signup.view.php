<?php
$this->getMsg();
$clinics = $this->data['clinics'];
?>
<div class="sign col-lg-5 col-md-7 col-sm-9 col-11">
    <h5 class="text-center"><?php echo getlang( " التسجيل  " , "Sign_up"); ?></h5>
    <div class="col-10 offset-1 col-md-8 offset-md-2">
        <div class="select_signup row">
            <button class="btn btn-primary btn-block btn-patient col-4 offset-1"><?php echo getlang(  " المريض   ","Patient"); ?></button>
            <button class="btn btn-outline-primary btn-block btn-doctor col-4 offset-1"><?php echo getlang( " الطبيب  " ,"Doctor") ; ?></button>
        </div>
    </div>
    <div class="form-patient">
        <form method="post" id="signUp_form" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="engname"><?php echo getlang( " إدخال   ","Enter");?> <?php echo getlang( " إسمك بالإنجليزية " ,"Your_Eng_Name"); ?></label>
                    <input id="engname" type="text" name="engname" required>
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="arabname"><?php echo getlang( " إدخال   ","Enter"); ?> <?php echo getlang(" إسمك بالعربي","Your_Arab_Name"); ?></label>
                    <input id="arabname" type="text" name="arabname" required>
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="mail"><?php echo getlang( " إدخال   ","Enter") ;?> <?php echo getlang( " بريدك الإلكتروني ","Your_Email"); ?></label>
                    <input id="mail"  type="text" name="mail" required>
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="pass"><?php echo getlang( " إدخال   ","Enter"); ?> <?php echo getlang( " الرقم السري " ,"Password"); ?></label>
                    <input id="pass" type="password" name="pass" required>
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="re-pass"><?php echo getlang( " إدخال   ","Enter"); ?> <?php echo getlang( " تأكيد  الرقم السري " ,"Pass_Confirm") ; ?></label>
                    <input id="re-pass" type="password" name="re-pass" required>
                </div>

                <div class="col-10 offset-1 col-md-8 offset-md-2">
                    <select name="gender">
                        <option value="0" disabled selected><?php echo getLang('النوع','Gender') ?></option>
                        <option value="1"><?php echo getLang('ذكر','Male') ?></option>
                        <option value="2"><?php echo getLang('أنثى','Female') ?></option>
                    </select>
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="no"><?php echo getlang( " إدخال   ","Enter"); ?> <?php echo getlang( " رقمك القومي  " ,"Your_National_Id"); ?></label>
                    <input id="no"  type="number" name="national_id" required>
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="nat_id"><?php echo getlang( " إدخال   ","Enter"); ?> <?php echo getlang( " رقم هاتفك  ","Your_Phone"); ?></label>
                    <input id="nat_id" type="text" name="phone">
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for=""></label>
                    <input type="date" name="birth-date">
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="place_of_birth"><?php echo getlang( " محل  الميلاد ","Birth_Province"); ?></label>
                    <input id="place_of_birth" type="text" name="birth_place">
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="phone"><?php echo getlang( "أدخل عنوانك","Enter Your Address"); ?></label>
                    <input id="phone" type="text" name="address">
                </div>

                <div class="text-center col-12" >
                    <button type="submit" class="btn btn-danger btn-lg center-block" name="done-patient"><?php echo getlang( " تم   " ,"Done"); ?></button>
                </div>
            </div>
        </form>
    </div>
    <div class="form-doctor">
        <form method="post" id="signUp_form" action="<?php echo $_SERVER['REQUEST_URI'] ?>">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="dengname"><?php echo getlang( " إدخال   ","Enter");?> <?php echo getlang( " اسمك بالاإنجليزية "  ,"Your_Eng_Name"); ?></label>
                    <input id="dengname" type="text" name="engname" required>
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="darabname"><?php echo getlang( " إدخال   ","Enter"); ?> <?php echo getlang( " اسمك  بالعربية " ,"Your_Arab_Name"); ?></label>
                    <input id="darabname" type="text" name="arabname" required>
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="dmail"><?php echo getlang( " إدخال   ","Enter"); ?> <?php echo getlang( " بريدك  الإلكتروي " ,"Your_Email"); ?></label>
                    <input id="dmail"  type="text" name="mail" required>
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="dpass"><?php echo getlang( " إدخال   ","Enter"); ?> <?php echo getlang( " الرقم السري " ,"Password"); ?></label>
                    <input id="dpass" type="password" name="pass" required>
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="dre-pass"><?php echo getlang( " إدخال   ","Enter"); ?> <?php echo getlang( " تاكيد الرقم السري " ,"Pass_Confirm"); ?></label>
                    <input id="dre-pass" type="password" name="re-pass" required>
                </div>

                <div class="col-10 offset-1 col-md-8 offset-md-2">
                    <select name="clinic">
                        <option value="0" disabled selected>Choose clinic</option>
                        <?php foreach ($clinics as $clinic): ?>
                            <option value="<?php echo $clinic['id'];?>"><?php echo $clinic[lang('DBname')]?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="dno"><?php echo getlang( " إدخال   ","Enter") ; ?> <?php echo getlang(" رقمك  القومي " ,"Your_National_Id'") ?></label>
                    <input id="dno"  type="number" name="national_id" required>
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="dnat_id"><?php echo getlang( " إدخال   ","Enter"); ?> <?php echo getlang( " رقم هاتفك   "  ,"Your_Phone"); ?></label>
                    <input id="dnat_id" type="text" name="phone">
                </div>


                <div class="text-center col-12" >
                    <button type="submit" class="btn btn-danger btn-lg center-block" name="done-doctor"><?php echo getlang( " تم   " ,"Done"); ?></button>
                </div>
            </div>
        </form>
    </div>

    <div  class="foot center-block">
        <span><?php echo getlang( " إذا تم التسجيل" ,"If_You_Sign_Up"); ?></span>
        <a href="home/signin"><?php echo getlang( "الدخول" ,"Login"); ?></a>
    </div>
</div>
