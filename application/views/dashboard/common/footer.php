

<!-- jQuery -->
<script src="<?php echo public_url(); ?>js/min/jquery-1.11.3.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo public_url()?>js/min/bootstrap-3.3.2.min.js"></script>

<script src="<?php echo public_url(); ?>js/dashboard.js"></script>
<script src="<?php echo public_url(); ?>js/base64.js"></script>
<script src="<?php echo public_url(); ?>js/cookie.js"></script>
<!--<script src="<?php /*echo public_url(); */?>js/parsley.js"></script>
<script src="<?php /*echo public_url(); */?>js/parsley-nl.js"></script>-->
<script src="<?php echo public_url(); ?>js/jquery-placeholder.js"></script>
<script src="<?php echo public_url(); ?>js/jquery-password-check.js"></script>
<?php echo (isset($additional_scripts) ? $additional_scripts : '') ?>

<script type="text/javascript">
    (function() {
        var s = document.createElement("script");
        s.type = "text/javascript";
        s.async = true;
        s.src = '//api.usersnap.com/load/'+
            '73d71899-7b8a-44d7-b526-270df0b0dc3a.js';
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);
    })();
</script>

</body>

</html>