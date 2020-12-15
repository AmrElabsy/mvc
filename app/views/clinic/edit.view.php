<?php
$this->getMsg();
$clinic = $this->data['clinic'];
?>

<div class="sign col-lg-5 col-md-7 col-sm-9 col-11">
    <h5 class="text-center"><?php echo getLang('تعديل بيانات عيادة', 'Edit a Clinic'); ?></h5>
    <div class="form-patient">
        <form method="post" id="signUp_form" action="<?php echo $_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $clinic->id ?>">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="engname"></label>
                    <input id="engname" type="text" name="engname" required value="<?php echo $clinic->engname ?>">
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="arabname"></label>
                    <input id="arabname" type="text" name="arabname" required value="<?php echo $clinic->arabname?>">
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="image"></label>
                    <input id="image" type="file" name="image" class="filestyle">
                </div>

                <div class="text-center col-12" >
                    <button type="submit" class="btn btn-danger btn-lg center-block" name="done-doctor"><?php echo getlang( " تم  "," Done " ); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
