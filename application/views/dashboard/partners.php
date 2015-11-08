<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo (isset($pretty_page_title) ? $pretty_page_title : '') ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <!-- /.row -->
        <div class="row clearfix">
            <!-- /.col-lg-4 -->
            <!-- Partners -->
            <div class="col-lg-12 hidden" id="no_partners_msg">
                <div class="alert alert-info text-center" role="alert">
                    <span class="fa fa-info-circle fa-fw"></span> Er zijn geen partners te vinden<br />
                    <a href="/dashboard/contact">Contacteer ons</a> om een partner toe te voegen.
                </div>
            </div>
            <div class="col-lg-12" id="partners_div"></div>
            <!-- Partners -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->