<?php $this->getMsg(); ?>

<div class="sign col-lg-5 col-md-7 col-sm-9 col-11">
    <h5 class="text-center"><?php echo getLang('إضافة عيادة جديدة', 'Add new Clinic'); ?></h5>
    <div class="form-patient">
        <form method="post" id="signUp_form" action="<?php echo $_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="engname"><?php echo getLang('ادخل الاسم بالإنجليزية', 'Enter The English Name'); ?></label>
                    <input id="engname" type="text" name="engname" required>
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="arabname"><?php echo getLang('ادخل الاسم بالعربية','Enter The English Name'); ?></label>
                    <input id="arabname" type="text" name="arabname" required>
                </div>

                <div class="col-md-8 offset-md-2 col-10 offset-1">
                    <label for="image"></label>
                    <input id="image" type="file" name="image" class="filestyle">
                </div>

                <div class="text-center col-12" >
                    <button type="submit" class="btn btn-danger btn-lg center-block" name="done-doctor"><?php echo getlang( "تم" , "Done"); ?></button>
                </div>
            </div>
        </form>
    </div>
</div>
