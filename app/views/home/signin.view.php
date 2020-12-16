<?php $this->getMsg();
echo "<pre>";
var_dump( Session::User() ); 
echo "</pre>";
?>
<div class="sign sign-in col-lg-4 col-md-6 col-11">
    <form action="<?php echo $_SERVER['REQUEST_URI'] ?>" method="post">
        <span class="icon">
            <span class="icon-background">
                <i class="fa fa-user"></i>
            </span>
        </span>
        <div class="form-group">
            <div class="col-lg-offset-1 col-11 col-md-10 col-lg-10">
                <input class="form-control" type="text" name="name" required="" placeholder="<?php echo getlang(" اسم  المستخدم   " ," User_name ");  ?>">
                <span class="input-icon">
                    <i class="fa fa-user"></i>
                </span>
            </div>
            <div class="col-lg-offset-1 col-11 col-md-10 col-lg-10">
                <input class="form-control" type="password" name="pass" required="" placeholder="<?php echo getlang(" الرقم  السري    " ," Password ");  ?>">
                <span class="input-icon">
                    <i class="fas fa-lock"></i>
                </span>
            </div>
        </div>
        <div class="text-center">
            <input class="btn btn-danger " type="submit" name="" value="<?php echo lang('login'); ?>">
        </div>
    </form>
</div>