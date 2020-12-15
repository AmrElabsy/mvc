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
    <script type="application/json" src="<?php echo JSON_PATH ?>file.json"></script>
    <script type="application/javascript" src="<?php echo JS_PATH?>canvasjs.min.js"></script>
    <script type="application/javascript" src="<?php echo JS_PATH?>jquery.js"></script>
    <script type="application/javascript" src="<?php echo JS_PATH?>all.js"></script>
    <script src="<?php echo JS_PATH?>wow.min.js"></script>
    <script>
        new WOW().init()
    </script>
    <script src="<?php echo JS_PATH ?>bootstrap.arabic.js"></script>
    <script src="<?php echo JS_PATH?>bootstrap-filestyle.js"></script>
    <script src="<?php echo JS_PATH ?>jquery-ui.js"></script>
    <script src="<?php echo JS_PATH ?>script.js"></script>
    <script src="<?php echo JS_PATH . getLang("script-ar.js","script-en.js")?>"></script>
</body>
</html>
