<!DOCTYPE html>
<html lang="es">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>IdEn Framework v3 Ideas-Envision Servicios Integrales</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?Php echo $vParamsViewBootstrap['root_bootstrap_css']; ?>bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>select2/css/select2.min.css" rel="stylesheet" type="text/css" />
        <link href="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->       
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?Php echo $vParamsViewBackEndLayout['root_backend_global_css']; ?>components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?Php echo $vParamsViewBackEndLayout['root_backend_global_css']; ?>plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?Php echo $vParamsViewBackEndLayout['root_backend_pages_css']; ?>login.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="<?Php echo BASE_VIEW_URL; ?>">
                <img src="<?Php echo $vParamsViewFrontEndLayout['root_frontend_img']; ?>logos/logo.png" alt="Ideas-Envision Header Logotype" />
            </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="login-form" id="access-form-emailvalidate" method="post">
                <h3 class="form-title font-green">Validar Cuenta</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Correo electrónico</label>
                    <input type="email" class="form-control" name="vEmail" id="vEmail" placeholder="Correo Electrónico">
                </div>
                <div class="form-actions">
                    <button type="submit" class="btn green uppercase">Validar</button>
                </div>
                <div class="create-account">
                    <p>                        
                        <a class="uppercase" href="<?php echo BASE_VIEW_URL; ?>access">Ingresar</a></br>
                        <a class="uppercase" href="<?php echo BASE_VIEW_URL; ?>access/register">Registrar</a></br>
                    </p>
                </div>
            </form>
            <!-- END LOGIN FORM -->
        </div>
        <div class="copyright"> <span class="text-white">Diseñado y desarrollado por <a href="http://www.ideas-envision.com/">Ideas-Envision</a> Servicios Integrales</span> </div>
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>jquery.min.js" type="text/javascript"></script>
        <script src="<?Php echo $vParamsViewBootstrap['root_bootstrap_js']; ?>bootstrap.min.js" type="text/javascript"></script>
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>js.cookie.min.js" type="text/javascript"></script>
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>jquery.blockui.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>select2/js/select2.full.min.js" type="text/javascript"></script>
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_scripts']; ?>app.min.js" type="text/javascript"></script>        
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_pages_scripts']; ?>access.min.js"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
    </body>

</html>