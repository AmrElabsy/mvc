<div class="accountbg" style="background: url('<?= asset(); ?>images/bg.jpg');background-size: cover;background-position: center;"></div>

        <div class="account-pages mt-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center mt-4">
                                    <div class="mb-3">
                                        <a href="<?= path(); ?>"><img src="<?= asset("images/logo.png"); ?>" height="30" alt="logo"></a>
                                    </div>
                                </div>
                                <div class="p-3">
                                    <h4 class="font-size-18 mt-2 text-center">Welcome Back !</h4>
                                    <p class="text-muted text-center mb-4">Sign in to continue to Admiria.</p>
    
                                    <form class="form-horizontal" action="<?= path("home/signin"); ?>" method="post">
                                        <div class="form-group">
                                            <label for="name">Username</label>
                                            <input type="text" class="form-control" id="rname" placeholder="Enter username" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" placeholder="Enter password" name="pass">
                                        </div>
                                        <div class="form-group row mt-4">
                                            <div class="col-sm-6">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customControlInline">
                                                    <label class="custom-control-label" for="customControlInline">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                            </div>
                                        </div>
    
                                        <!-- <div class="form-group mb-0 row">
                                            <div class="col-12 mt-4">
                                                <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                            </div>
                                        </div> -->
                                    </form>
    
                                </div>
    
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <p class="text-white">Don't have an account ? <a href="<?= path("home/signup"); ?>" class="font-weight-bold text-primary"> Signup Now </a> </p>
                        </div>
    
                    </div>
                </div>
            </div>
        </div>
