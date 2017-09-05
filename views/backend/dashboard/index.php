                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <div class="page-content">
                        <!-- BEGIN PAGE HEADER-->
                        <!-- BEGIN PAGE BAR -->
                        <div class="page-bar">
                            <ul class="page-breadcrumb">
                                <li>
                                    <a href="<?Php echo BASE_VIEW_URL; ?>">Dashboard</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <a href="#">Módulo Facturación</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Facturación</span>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Página Web en Blanco
                            <small>Contenedor Web en Blacno</small>
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="note note-info">
                            <p>Esta es la página de incio del sistema de facturación del sistema EasyBilling</p>
                        </div>
                        

                        <div class="row">
                            <div class="col-md-6 ">
                                <!-- BEGIN SAMPLE FORM PORTLET-->
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-red-sunglo">
                                            <span class="caption-subject bold uppercase">Datos de Facturación</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                    <?Php
                                                echo 'DEFAULT_USER_AUTHENTICATE: '.IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE);
                                                echo '<br/>';
                                                echo 'DEFAULT_USER_AUTHENTICATECode: '.IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'Code');
                                                echo '<br/>';
                                                echo 'DEFAULT_USER_AUTHENTICATEUserName: '.IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'UserName');
                                                echo '<br/>';                                        
                                                echo 'DEFAULT_USER_AUTHENTICATEEmail: '.IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'Email');
                                                echo '<br/>';
                                                echo 'DEFAULT_USER_AUTHENTICATERole: '.IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'Role');
                                                echo '<br/>';
                                                echo 'DEFAULT_USER_AUTHENTICATEProfileCode: '.IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'ProfileCode');
                                                echo '<br/>';
                                                echo 'vTimeSessionUser: '.IdEnSession::getSession('vTimeSessionUser');
                                                echo '<br/><br/><br/><br/><br/>';
                                                echo '<a href="'.BASE_VIEW_URL.'access/LogoutMethod">Salir</a>';
                                    ?>
                                    </div>
                                </div>
                                <!-- END SAMPLE FORM PORTLET-->
                            </div>
                        </div>                        
                    </div>
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner"> 2017 &copy; EasyBilling Bolivia módulo de
                    <a target="_blank" href="http://ideas-envision.com">Ideas-Envision</a> Servicios Integrales &nbsp;|&nbsp;
                    <a href="http://ideas-envision.com" title="Utiliza nuestro Framework PHP IdEn v3.3" target="_blank">IdEn Framework</a>
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div>
            <!-- END FOOTER -->
        </div>
        <!-- BEGIN QUICK NAV -->
        <nav class="quick-nav">
            <a class="quick-nav-trigger" href="#0">
                <span aria-hidden="true"></span>
            </a>
            <ul>
                <li>
                    <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes" target="_blank" class="active">
                        <span>Purchase Metronic</span>
                        <i class="icon-basket"></i>
                    </a>
                </li>
                <li>
                    <a href="https://themeforest.net/item/metronic-responsive-admin-dashboard-template/reviews/4021469?ref=keenthemes" target="_blank">
                        <span>Customer Reviews</span>
                        <i class="icon-users"></i>
                    </a>
                </li>
                <li>
                    <a href="http://keenthemes.com/showcast/" target="_blank">
                        <span>Showcase</span>
                        <i class="icon-user"></i>
                    </a>
                </li>
                <li>
                    <a href="http://keenthemes.com/metronic-theme/changelog/" target="_blank">
                        <span>Changelog</span>
                        <i class="icon-graph"></i>
                    </a>
                </li>
            </ul>
            <span aria-hidden="true" class="quick-nav-bg"></span>
        </nav>
        <div class="quick-nav-overlay"></div>
        <!-- END QUICK NAV -->
        <!--[if lt IE 9]>
<script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>respond.min.js"></script>
<script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>excanvas.min.js"></script> 
<script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>jquery.min.js" type="text/javascript"></script>
        <script src="<?Php echo $vParamsViewBootstrap['root_bootstrap_js']; ?>bootstrap.min.js" type="text/javascript"></script>
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>js.cookie.min.js" type="text/javascript"></script>
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>jquery.blockui.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_scripts']; ?>app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_layouts_scripts']; ?>layout.min.js" type="text/javascript"></script>
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_layouts_scripts']; ?>demo.min.js" type="text/javascript"></script>
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_layouts_scripts']; ?>quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        
        <!-- BEGIN SYSTEM EASYBILLING SCRIPTS -->
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_pages_scripts']; ?>systemBilling.min.js" type="text/javascript"></script>
        <!-- END SYSTEM EASYBILLING SCRIPTS -->
            
        <script>
            $(document).ready(function()
            {
                $('#clickmewow').click(function()
                {
                    $('#radio1003').attr('checked', 'checked');
                });
            })
        </script>
    </body>

</html>
