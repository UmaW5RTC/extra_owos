<!-- Footer -->
        <footer class="main" style="margin:auto; text-align:center;">
        <div class="powered-by-disha"><img src="<?php echo get_site_current_theme_url(); ?>/images/powered-by-disha.png" /></div>
            <a href="#" style="color: #444; text-decoration: none;" target="_blank">Disha</a> is licensed by<br /><a href="http://www.idmt.in/" target="_blank" style="color: #444; text-decoration: none;">Institute of Digital Media Technology</a> (2004 - 2016).</footer>

</div><!-- main-content -->

<div id="neo-sticky-note" style="display: none;">
            <div id="neo-sticky-note-text"></div>
            <div id="neo-sticky-note-text-edit">
                <textarea id="neo-sticky-note-textarea"></textarea>
                <div id="neo-sticky-note-text-char-count"></div>
                <input type="button" value="Save Note" id="neo-submit-button">
                <div id="auto-popup">AutoPopUp <input type="checkbox" id="neo-sticky-note-auto-popup" value="1"></div>
            </div>
            <div id="neo-sticky-note-text-edit-delete"></div>
        </div>

        <!-- Neo Progress Bar -->
        <div class="neo-modal-elastix-popup-box">
            <div class="neo-modal-elastix-popup-title"></div>
            <div class="neo-modal-elastix-popup-close"></div>
            <div class="neo-modal-elastix-popup-content"></div>
        </div>
        <div class="neo-modal-elastix-popup-blockmask"></div>
        <!-- Bottom Scripts -->
        <script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/main-gsap.js"></script>
        <script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/bootstrap.js"></script>
        <script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/joinable.js"></script>
        <script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/resizeable.js"></script>
        <script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/neon-api.js"></script>
        <script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/neon-login.js"></script>
        <script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/neon-custom.js"></script>
        <script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/neon-demo.js"></script>
        <script type="text/javascript" src="<?php echo get_site_current_theme_url(); ?>/js/parsley/parsley.min.js"></script>
   
    <script>
        $(document).ready(function () {
            $.listen('parsley:field:validate', function () {
                    validateFront();
            });
            $('#form .save').on('click', function () {
                $('#form').parsley().validate();
                validateFront();
            });
            var validateFront = function () {
                if (true === $('#form').parsley().isValid()) {
                    $('.bs-callout-info').removeClass('hidden');
                    $('.bs-callout-warning').addClass('hidden');
                } else {
                    $('.bs-callout-info').addClass('hidden');
                    $('.bs-callout-warning').removeClass('hidden');
                }
            };
        });
        try {
            hljs.initHighlightingOnLoad();
        } catch (err) {}
    </script>


<script src="<?php echo get_site_current_theme_url(); ?>/select/select2.min.css" type="text/javascript"></script>
<script src="<?php echo get_site_current_theme_url(); ?>/select/select2.full.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $(".select2_single").select2({
            placeholder: "Select a Class",
            allowClear: true
        });
        $(".select2_group").select2({});
        $(".select2_multiple").select2({
            placeholder: "Select All Subjects",
            allowClear: true
        });
    });
</script>
    </div>

<ul class="ui-autocomplete ui-front ui-menu ui-widget ui-widget-content" id="ui-id-1" tabindex="0" style="display: none;"></ul><span role="status" aria-live="assertive" aria-relevant="additions" class="ui-helper-hidden-accessible"></span>
</body>
</html>