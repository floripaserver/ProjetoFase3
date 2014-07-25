<?php
require_once 'AutoloadCore.php';
$rotas = new Rotas();

//echo $rotas->checkPage();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>SoftEmp</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- font Awesome -->
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <!-- Ionicons -->
        <link href="css/ionicons.min.css" rel="stylesheet" type="text/css"/>
        <!-- bootstrap wysihtml5 - text editor -->
        <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css"/>
        <!-- Theme style -->
        <link href="css/SoftEmp.css" rel="stylesheet" type="text/css"/>

    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="." class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                AdminSoftEmp
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-right">

                </div>
            </nav>

        </header>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- search form -->
                    
                    
                        <div class="input-group">
                            <input type="text" name="busca" class="form-control" placeholder="Busca Rapida"/>
                            <span class="input-group-btn">
                                <button type='submit' name='seach' id='search-btn' class="btn btn-flat">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    
                    <!-- /.search form -->

                    <!-- sidebar menu: : style can be found in sidebar.less -->
<?php require_once 'menu.php'; ?>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
<?php
require_once $rotas->getController();
?>
            </aside>
            <!-- /.right-side -->

        </div>
        <!-- ./wrapper -->

        <div class="footer">
            <div class="footer">
                Todos os direitos reservados - <?php echo date("Y"); ?>
            </div>
        </div>

<?php require_once 'js/js.php'; ?>

    </body>
</html>