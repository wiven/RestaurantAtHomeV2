<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/dashboard/overview">
                <img src="<?php echo public_url();?>img/logo_small.png" width="50" />
                RestaurantAtHome
            </a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li>
                <a title="Uitloggen" href="<?php echo public_url(); ?>../logout">
                    Log uit <i class="fa fa-sign-out fa-fw"></i>  <!--<i class="fa fa-caret-down"></i>-->
                </a>
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="/dashboard/overview"><i class="fa fa-dashboard fa-fw"></i> Overzicht</a>
                    </li>
                    <li>
                        <a href="/dashboard/profile"><i class="fa fa-user fa-fw"></i> Profiel</a>
                    </li>
                    <li>
                        <a href="/dashboard/products"><i class="fa fa-cutlery fa-fw"></i> Producten</a>
                    </li>
                    <li>
                        <a href="/dashboard/orders"><i class="fa fa-tasks fa-fw"></i> Bestellingen</a>
                    </li>
                    <li>
                        <a href="/dashboard/slots"><i class="fa fa-pencil-square-o fa-fw"></i> Slots</a>
                    </li>
                    <li>
                        <a href="/dashboard/actions"><i class="fa fa-fire fa-fw"></i> Acties</a>
                    </li>
                    <li>
                        <a href="/dashboard/loyalty"><i class="fa fa-group fa-fw"></i> Loyalty</a>
                    </li>
                    <li>
                        <a href="/dashboard/partners"><i class="fa fa-link fa-fw"></i> Partners</a>
                    </li>
                    <li id="contactLink">
                        <a href="/dashboard/contact"><i class="fa fa-envelope-o fa-fw"></i> Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
                    </a>
                </div>