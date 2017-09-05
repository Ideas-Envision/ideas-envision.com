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
                                            <i class="icon-bubble font-green-sharp"></i>
                                            <span class="caption-subject font-green-sharp bold uppercase">Emisión de Factura Nueva</span>
                                        </div>
                                    </div>
                                    <div class="portlet-body form">
                                        <form role="form" id="systembilling-form-datainvoice">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label>Datos Fijos</label><hr>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <label>NIT</label>
                                                            <div class="input-icon right margin-top-10">
                                                                <i class="fa fa-check"></i>
                                                                <input type="text" class="form-control" value="<?Php echo $this->vNITBilling; ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <label>Nro. Autorización</label>
                                                            <div class="input-icon right margin-top-10">
                                                                <i class="fa fa-check"></i>
                                                                <input type="text" class="form-control" value="<?Php echo $this->vAutorizationcode; ?>" name="vNumAutorization" id="vNumAutorization" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Nro. Factura</label>
                                                            <div class="input-icon right margin-top-10">
                                                                <i class="fa fa-check"></i>
                                                                <input type="text" class="form-control" value="<?Php echo $this->vNumberBilling; ?>" name="vNumBilling" id="vNumBilling" readonly>
                                                            </div>
                                                        </div>                                                        
                                                    </div>                                                    
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <label>Lugar de Emisión</label>
                                                            <div class="input-icon right margin-top-10">
                                                                <i class="fa fa-check"></i>
                                                                <input type="text" class="form-control" placeholder="La Paz, Bolivia" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Fecha de Emisión</label>
                                                            <div class="input-icon right margin-top-10">
                                                                <i class="fa fa-check"></i>
                                                                <input type="text" class="form-control" value="<?Php echo '2008/11/09'; ?>" name="vDateTransactionBilling" id="vDateTransactionBilling" readonly>
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                </div>                                                
                                                <div class="form-group">
                                                    <label>Domicilio Fiscal</label>
                                                    <div class="input-icon right margin-top-10">
                                                        <i class="fa fa-check"></i>
                                                        <textarea class="form-control" placeholder="Casa Matriz Calle Pinilla Nro. 2588, Edificio Arcadia Piso Mezzanine Depto. 109B Zona/Barrio: San Jorge Teléfonos: 2430880 - 78795415, La Paz, Bolivia" disabled style="resize:none"></textarea>
                                                    </div>
                                                </div>
                                                
                                                <label>Datos Necesarios</label><hr>
                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-5">
                                                            <label>Actividad Económica</label>
                                                            <?Php
                                                            //echo $this->vActivityBilling;
                                                            if($this->vActivityBilling != 0):
                                                                echo '<select class="form-control margin-top-10" id="vCodActivity" name="vCodActivity" readonly>';
                                                                    echo '<option value="'.$this->vActivityBilling.'">'.$this->vNameActivity.'</option>';
                                                                echo '</select>';
                                                            else:
                                                            echo '<select class="form-control margin-top-10" id="vCodActivity" name="vCodActivity">';
                                                                echo '<option value="0">Seleccionar</option>';
                                                                if(isset($this->vNITActivities) && count($this->vNITActivities)):
                                                                    $vCount = 1;
                                                                    for($i=0;$i<count($this->vNITActivities);$i++):

                                                                        echo '<option value="'.$this->vNITActivities[$i]['n_codactivity'].'">'.$this->vNITActivities[$i]['c_nameactivity'].'</option>';
                                                                    endfor;
                                                                endif;
                                                            echo '</select>';
                                                            endif;                                                                
                                                            ?>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Documento</label>
                                                            <div class="input-icon right margin-top-10">
                                                                <i class="fa fa-check"></i>
                                                                <input type="text" class="form-control" placeholder="Tipo de documento" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Periodo Emisión</label>
                                                            <div class="input-icon right margin-top-10">
                                                                <i class="fa fa-check"></i>
                                                                <input type="text" class="form-control" placeholder="<?Php echo date('m'); ?>" disabled>
                                                            </div>
                                                        </div>                                                        
                                                    </div>                                                    
                                                </div>
                                                
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <label>Nombre para emisión de factura</label>
                                                            <div class="input-icon right margin-top-10">
                                                                <i class="fa fa-check"></i>
                                                                <input type="text" class="form-control" value="<?Php echo $this->vClientName; ?>" name="vClientName" id="vClientName">
                                                                <input type="hidden" value="<?Php echo $this->vCodClient; ?>" name="vCodClient" id="vCodClient">
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>NIT</label>
                                                            <div class="input-icon right margin-top-10">
                                                                <i class="fa fa-check"></i>
                                                                <input type="text" class="form-control" value="<?Php echo $this->vIDClient; ?>" name="vIDClient" id="vIDClient">
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                </div>                                                                                          
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table table-striped table-hover table-bordered" id="tableBillingDetail">
                                                            <thead>
                                                                <tr>
                                                                    <th>Cantidad</th>
                                                                    <th>Detalle</th>
                                                                    <th>Precio Unitario</th>
                                                                    <th>Precio Total</th>
                                                                    <th colspan="2">Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="col-md-1"><input type="text" class="form-control" id="vQuantity" value=""></td>
                                                                    <td class="col-md-7">
                                                                        <select class="form-control" name="vCodService" id="vCodService" style="margin-bottom: 8px;">
                                                                            <option value="0">Seleccionar</option>
                                                                            <?Php
                                                                            if(isset($this->vDataActivityServices) && count($this->vDataActivityServices)):
                                                                                for($i=0;$i<count($this->vDataActivityServices);$i++):
                                                                                    echo '<option value="'.$this->vDataActivityServices[$i]['n_codservice'].'">'.$this->vDataActivityServices[$i]['c_nameservice'].'</option>';
                                                                                endfor;
                                                                            endif;                                                                
                                                                            ?>
                                                                        </select>                                                             
                                                                        <input type="text" class="form-control" id="vDetail" value="">
                                                                    </td>
                                                                    <td class="col-md-2" colspan="2"><input type="text" class="form-control" id="vAmount" value=""></td>
                                                                    <td class="col-md-1" colspan="2"><a id="submitFormDetail" class="btn red">Guardar</a></td>
                                                                </tr>
                                                                <?Php
                                                                    $vTotalBillingAmount = 0;
                                                                    $vFinalAmount = 0;
                                                                
                                                                    if(isset($this->vBillingDetail) && count($this->vBillingDetail)):
                                                                        for($i=0;$i<count($this->vBillingDetail);$i++):
                                                                            $vFinalAmount = $this->vBillingDetail[$i]['n_quantity'] * $this->vBillingDetail[$i]['n_amount'];
                                                                            echo '<tr>';
                                                                                echo '<td>'.$this->vBillingDetail[$i]['n_quantity'].'</td>';
                                                                                echo '<td>';
                                                                                    echo '<h4><strong>'.$this->vBillingDetail[$i]['c_nameservice'].'</strong></h4>';
                                                                                    echo '<p>'.$this->vBillingDetail[$i]['c_billingdetail'].'</p>';
                                                                                echo '</td>';
                                                                                echo '<td>'.$this->vBillingDetail[$i]['n_amount'].'</td>';
                                                                                echo '<td>'.$vFinalAmount.'</td>';
                                                                                echo '<td><a class="edit" href="'.BASE_VIEW_URL.'systemBilling/updateBillingDetail/'.$this->vBillingDetail[$i]['n_codbillingdetail'].'">Modificar</a></td>';
                                                                                echo '<td><a id="deleteBillingDetail-'.$this->vBillingDetail[$i]['n_codbilling'].'" href="'.BASE_VIEW_URL.'systemBilling/deleteBillingDetail/'.$this->vBillingDetail[$i]['n_codbilling'].'/'.$this->vBillingDetail[$i]['n_codbillingdetail'].'/'.$this->vCodClient.'">Eliminar</a></td>';
                                                                            echo '</tr>';
                                                                            $vTotalBillingAmount = $vTotalBillingAmount + $vFinalAmount;
                                                                        endfor;
                                                                    endif;
                                                                ?>
                                                            </tbody>
                                                        </table>
                                                    </div>                                                
                                                </div>

                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <label>Monto Total Literal</label>
                                                            <div class="margin-top-10">
                                                                <input type="text" class="form-control" value="<?Php echo $this->num2letras(number_format($vTotalBillingAmount, 2, '.', '')); ?>" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label>Monto Total Numeral</label>
                                                            <div class="margin-top-10">
                                                                <input type="text" class="form-control" value="<?Php echo number_format($vTotalBillingAmount, 2, '.', ''); ?>" name="vAmountBilling" readonly>
                                                            </div>
                                                        </div>
                                                    </div>                                                    
                                                </div>                                                

                                            </div>
                                            <div class="form-actions right">
                                                <button type="button" class="btn default">Cancelar</button>
                                                <button type="submit" class="btn green">Generar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 "></div>
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
            $(document).ready(function(){
                $('#clickmewow').click(function(){
                    $('#radio1003').attr('checked', 'checked');
                });
                
            })
        </script>
    </body>

</html>
