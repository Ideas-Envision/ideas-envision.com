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
                                    <span>Emisión de Facturas Electrónicas</span>
                                </li>
                            </ul>
                        </div>
                        <!-- END PAGE BAR -->
                        <!-- BEGIN PAGE TITLE-->
                        <h1 class="page-title"> Sistema EasyBilling
                            <small>Sistema de Facturación Electrónica basada en requisitos del sistema de impuestos nacionales de Bolivia.</small>
                        </h1>
                        <!-- END PAGE TITLE-->
                        <!-- END PAGE HEADER-->
                        <div class="note note-info">
                            <p>Esta es la página de incio del sistema de facturación del sistema EasyBilling</p>
                        </div>
                        

                        <div class="row">
                            <div class="col-md-6">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption">
                                            <i class="fa fa-check-circle font-green-sharp"></i>
                                            <span class="caption-subject font-green-sharp bold uppercase">Registro Código de Autorización</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <form role="form" id="systembilling-form-principalkeys">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <label>Actividad Económica</label>
                                                            <?Php
                                                            echo '<select class="form-control margin-top-10" id="vCodActivity" name="vCodActivity">';
                                                                echo '<option value="0">Seleccionar</option>';
                                                                if(isset($this->vNITActivities) && count($this->vNITActivities)):
                                                                    $vCount = 1;
                                                                    for($i=0;$i<count($this->vNITActivities);$i++):

                                                                        echo '<option value="'.$this->vNITActivities[$i]['n_codactivity'].'">'.$this->vNITActivities[$i]['c_group'].' - '.$this->vNITActivities[$i]['c_nameactivity'].'</option>';
                                                                    endfor;
                                                                endif;
                                                            echo '</select>';                                                               
                                                            ?>
                                                        </div>                                                        
                                                        <div class="col-md-8">
                                                            <div class="input-icon right margin-top-10">
                                                                <i class="fa fa-check"></i>
                                                                <input type="text" class="form-control" placeholder="Ingresar código de autorización..." value="" name="vNumAutorization" id="vNumAutorization">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="input-icon right margin-top-10">
                                                                <i class="fa fa-check"></i>
                                                                <input type="text" class="form-control" placeholder="Ingresar llave de dosificación..." value="" name="vDosingWrenchKey" id="vDosingWrenchKey">
                                                            </div>
                                                        </div>                                                        
                                                        <div class="col-md-4">
                                                            <div class="left margin-top-10">
                                                                <button type="submit" class="btn green">Guardar</button>
                                                            </div>
                                                        </div>                                                        
                                                    </div>                                                    
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="portlet light bordered">
                                    <div class="portlet-title">
                                        <div class="caption font-dark">
                                            <i class="icon-settings font-dark"></i>
                                            <span class="caption-subject bold uppercase">Códigos de Autorización</span>
                                        </div>
                                        <!--<div class="tools"> </div>-->
                                    </div>
                                    <div class="portlet-body">
                                        <table class="table table-striped table-bordered table-hover dt-responsive" width="100%" id="sample_1">
                                            <thead>
                                                <tr>
                                                    <th class="all">Nº</th>
                                                    <th class="all">Código de Autorización</th>
                                                    <th class="all">Estado</th>
                                                    <th class="none">Fecha</th>
                                                    <th class="none">Eliminar</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?Php                                               
                                                   if(isset($this->vDataAutorizationCodes) && count($this->vDataAutorizationCodes)):
                                                        $vCount = 1;
                                                        for($i=0;$i<count($this->vDataAutorizationCodes);$i++):
                                                            echo '<tr>';
                                                                echo '<td>'.$vCount.'</td>';
                                                                echo '<td>'.$this->vDataAutorizationCodes[$i]['c_autorizationcode'].'</td>';
                                                                if($this->vDataAutorizationCodes[$i]['n_active'] == 0){
                                                                    echo '<td><i class="fa fa-close font-red"></i></td>';
                                                                } else if($this->vDataAutorizationCodes[$i]['n_active'] == 1){
                                                                    echo '<td><i class="fa fa-check font-green-jungle"></i></td>';
                                                                } else {
                                                                    echo '<td><i class="fa fa-warning font-yellow-crusta"></i></td>';
                                                                }
                                                                echo '<td>'.date_format(date_create($this->vDataAutorizationCodes[$i]['d_datecreate']), 'd/m/Y H:i:s').'</td>';
                                                                echo '<td><a href="'.BASE_VIEW_URL.'systemBilling/'.$this->vDataAutorizationCodes[$i]['n_codautorizationcode'].'" class="btn green" ><i class="fa fa-print"></i> Visualizar </a></td>';
                                                            ++$vCount;
                                                        endfor;
                                                    endif;
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_scripts']; ?>datatable.js" type="text/javascript"></script>
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>datatables/datatables.min.js" type="text/javascript"></script>
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_plugins']; ?>datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_global_scripts']; ?>app.min.js" type="text/javascript"></script>        
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_pages_scripts']; ?>table-datatables-responsive.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_layouts_scripts']; ?>layout.min.js" type="text/javascript"></script>
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_layouts_scripts']; ?>demo.min.js" type="text/javascript"></script>
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_layouts_scripts']; ?>quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
        
        <!-- BEGIN SYSTEM EASYBILLING SCRIPTS -->
        <script src="<?Php echo $vParamsViewBackEndLayout['root_backend_pages_scripts']; ?>systemBilling.min.js" type="text/javascript"></script>
        <!-- END SYSTEM EASYBILLING SCRIPTS -->
            
        <script>
            $(document).ready(function(){
                $('#clickmewow').click(function(){
                    $('#radio1003').attr('checked', 'checked');
                });
                
            })
        </script>
    </body>

</html>
