<?php
global $noFooter;
if (!isset($noFooter))
{
    ?>
    <nav class="footer"  id="footer">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <h5><i class="fa fa-globe"></i> <?php echo lang('important_links')?></h5>
                <div class="content">
                    <div><a href="/"><?php echo lang('home_page') ?></a></div>
                    <div><a href="doctor/index"><?php echo lang('doctors') ?></a></div>
                    <div><a href="clinic/index"><?php echo lang('clinics') ?></a></div>
                    <div><a href="/home/makeappointment"><?php echo lang('make_appointment') ?></a></div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <h5><i class="fa fa-newspaper"></i> <?php echo lang('recent_news') ?></h5>
                <div class="content">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque pharetra ac magna nec cursus.
                </div>
            </div>
            <div class="col-sm-6 col-md-4">
                <h5><i class="fa fa-phone"></i> <?php echo lang('contact_us') ?></h5>
                <div class="content">
                    <div><i class="fa fa-phone"></i> 0473214998</div>
                    <div><i class="fa fa-envelope"></i> kfs_info@kfs.edu.eg</div>
                </div>
            </div>
        </div>
    </nav>

    <?php
}
?>
    <!-- <script type="application/json" src="<?php echo JSON_PATH ?>file.json"></script>
    <script type="application/javascript" src="<?php echo JS_PATH?>canvasjs.min.js"></script>
    <script type="application/javascript" src="<?php echo JS_PATH?>jquery.js"></script>
    <script type="application/javascript" src="<?php echo JS_PATH?>all.js"></script>
    <script src="<?php echo JS_PATH ?>bootstrap.arabic.js"></script>
    <script src="<?php echo JS_PATH ?>bootstrap-filestyle.js"></script>
    <script src="<?php echo JS_PATH ?>jquery-ui.js"></script>
    
    <script src="<?php echo JS_PATH ?>script.js"></script> -->

    <script src="<?php echo JS_PATH ?>libs/jquery/jquery.min.js"></script>
    <script src="<?php echo JS_PATH ?>libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo JS_PATH ?>libs/metismenu/metisMenu.min.js"></script>
    <script src="<?php echo JS_PATH ?>libs/simplebar/simplebar.min.js"></script>
    <script src="<?php echo JS_PATH ?>libs/node-waves/waves.min.js"></script>

    
        <!-- Peity chart-->
    <script src="<?php echo JS_PATH ?>libs/peity/jquery.peity.min.js"></script>

            <!--C3 Chart-->
    <script src="<?php echo JS_PATH ?>libs/d3/d3.min.js"></script>
    <script src="<?php echo JS_PATH ?>libs/c3/c3.min.js"></script>

    <script src="<?php echo JS_PATH ?>libs/jquery-knob/jquery.knob.min.js"></script> 

    <script src="<?php echo JS_PATH ?>a/dashboard.init.js"></script>
    
    <script src="<?php echo JS_PATH ?>config.js"></script>
    <script src="<?php echo JS_PATH ?>a/app.js"></script>
    <script src="<?php echo JS_PATH . getLang("script-ar.js","script-en.js")?>"></script>
</body>
</html>
