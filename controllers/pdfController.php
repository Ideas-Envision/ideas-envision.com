<?Php

class pdfController extends IdEnController
	{		
		public function __construct()
			{
				parent::__construct();
				
				/* BEGIN VALIDATION TIME SESSION USER */
				if(!IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE)){
                        $this->redirect('access');
                } else {
                    IdEnSession::timeSession();
                }
                /* END VALIDATION TIME SESSION USER */
            
                $this->vUsersData = $this->LoadModel('users');
                $this->vBillingData = $this->LoadModel('billing');            
			}
			
		public function index()
			{
				$this->vView->visualizar('index');
			}
    
        public function printPDFBilling($vNumBilling)
            {
                $vNumBilling = (int) $vNumBilling;
                $vCodBilling = $this->vBillingData->getCodeBillingFromNumberBilling($vNumBilling);
                
                $vNITBilling = $this->vBillingData->getNITBilling();
                $vActivityBilling = $this->vBillingData->getNameActivity($this->vBillingData->getCodActivityFromBilling($vCodBilling));
            
                $this->vDataBilling = $this->vBillingData->getDataBilling($vNumBilling);
                $this->vDataBillingDetail = $this->vBillingData->getDataBillingDetail($vCodBilling);
                
                $vLogoImageRoot = ROOT_APPLICATION.'views'.DIR_SEPARATOR.'layout'.DIR_SEPARATOR.DEFAULT_VIEW_LAYOUT.DIR_SEPARATOR.'backend'.DIR_SEPARATOR.'pages'.DIR_SEPARATOR.'css'.DIR_SEPARATOR;
                $vQRCodeImageRoot = ROOT_APPLICATION.'views'.DIR_SEPARATOR.'backend'.DIR_SEPARATOR.'systemBilling'.DIR_SEPARATOR.'imagesqrcode'.DIR_SEPARATOR;
            
               if(isset($this->vDataBilling) && count($this->vDataBilling)):                           
                    for($i=0;$i<count($this->vDataBilling);$i++):
                        $vCodBilling = $this->vDataBilling[$i]['n_codbilling'];
                        $vCodUser = $this->vDataBilling[$i]['n_coduser'];
                        $vAutorizationcode = $this->vDataBilling[$i]['c_autorizationcode'];
                        $vNameNit = $this->vDataBilling[$i]['c_namenit'];
                        $vNit = $this->vDataBilling[$i]['c_nit'];
                        $vCodClient = $this->vDataBilling[$i]['n_codclient'];
                        $vBranchOffice = $this->vDataBilling[$i]['n_branchoffice'];
                        $vBillingNumber = $this->vDataBilling[$i]['n_billingnumber'];
                        $vBillingDate = $this->vDataBilling[$i]['d_billingdate'];
                        $vControlCode = $this->vDataBilling[$i]['c_controlcode'];
                        $vQRCodeName = $this->vDataBilling[$i]['c_qrcodename'];
                    endfor;
            
                    $date = date_create($vBillingDate);
                    $vBillingDate = date_format($date, 'Y-m-d H:i:s');
                    $vLimitBillingDate = date_format($date, 'd/m/Y');

                endif;        
                    
                $htmlPDFHeader = '
                    <table border="0">
                        <tbody>
                            <tr>
                                <td rowspan="2" class="width-300"><img src="'.$vLogoImageRoot.'squemas-invoice.png" class="logo"/></td>
                                <td rowspan="2" class="width-200"></td>
                                <td class="well1 width-300">
                                    <div align="right">
                                        <p><strong>Nit</strong> '.$vNITBilling.'</p>
                                        <p><strong>Nro. Factura</strong> '.$vBillingNumber.'</p>
                                        <p><strong>Nro. de Autorización</strong> '.$vAutorizationcode.'</p>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td class="well2 width-400">
                                    <div>
                                        <p class="title-1">Sergio Martín Alarcón Montero</p>
                                        <p><strong>Dirección</strong> Calle Pinilla, Edificio Arcadia Nro. 2588</p>
                                        <p>Mezzanine, Torre B - oficina 109, zona San Jorge</p>
                                        <p><strong>Ciudad,País</strong> La Paz, Bolivia</p>
                                        <p><strong>Telefono oficina</strong> 2430880</p>
                                        <p><strong>Telefono móvil</strong> 78795415</p>
                                        <p><strong>Correo electrónico</strong> info@squemas.com</p>
                                        <p><strong>Sitio Web www.squemas.com</p>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr>
                                <td class="well3" colspan="3"><strong>FACTURA OFICIAL</strong> <span class="billingActivity">'.$vActivityBilling.'</span></td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <table border="0">
                        <tbody>                            
                            <tr>
                                <td class="title-billing width-400">Lugar y fecha de emisión</td>
                                <td class="title-billing width-400">Nombre Cliente</td>
                                <td class="title-billing width-200">NIT Cliente</td>
                            </tr>
                            
                            <tr>
                                <td class="data-billing">La Paz, '.$this->spanishLiteralDate($vBillingDate).'</td>
                                <td class="data-billing">'.$vNameNit.'</td>
                                <td class="data-billing">'.$vNit.'</td>
                            </tr>

                            <tr>
                                <td class="well3" colspan="3"></td>
                            </tr>
                            
                        </tbody>
                    </table>
                ';
            
                $vhtmlPDFDetail = '
                    <table class="border-detail">
                        <tbody>
                            <tr class="headerrowdetail">
                                <td class="title-detail width-30">Nº</td>
                                <td class="title-detail width-30">Cantidad</td>
                                <td class="title-detail width-300">Descripción</td>
                                <td class="title-detail width-50">Precio Unitario Bs.</td>
                                <td class="title-detail width-50">Precio Total Bs.</td>
                            </tr>
                ';
            
                $vTotalItemAmount = 0;
                $vTotalBillingAmount = 0;
                if(isset($this->vDataBillingDetail) && count($this->vDataBillingDetail)):
                    $vCount = 1;
                    for($i=0;$i<count($this->vDataBillingDetail);$i++):
                        $vTotalItemAmount = $this->vDataBillingDetail[$i]['n_quantity']*$this->vDataBillingDetail[$i]['n_amount'];
                        $vhtmlPDFDetail .= '<tr class="rowdetail">';
                            $vhtmlPDFDetail .= '<td class="text-detail padding-10">'.$vCount.'</td>';
                            $vhtmlPDFDetail .= '<td class="text-detail padding-10">'.$this->vDataBillingDetail[$i]['n_quantity'].'</td>';
                            $vhtmlPDFDetail .= '<td class="text-detail padding-10">';
                                $vhtmlPDFDetail .= '<h3 class="h3-detail">'.$this->vDataBillingDetail[$i]['c_nameservice'].'</h3>';
                                $vhtmlPDFDetail .= '<p>'.$this->vDataBillingDetail[$i]['c_billingdetail'].'</p>';
                            $vhtmlPDFDetail .= '</td>';
                            $vhtmlPDFDetail .= '<td class="text-detail padding-10">'.number_format($this->vDataBillingDetail[$i]['n_amount'], 2, '.', '').'</td>';
                            $vhtmlPDFDetail .= '<td class="text-detail padding-10">'.number_format($vTotalItemAmount, 2, '.', '').'</td>';
                        $vhtmlPDFDetail .= '</tr>';
                        ++$vCount;
                        $vTotalBillingAmount = $vTotalBillingAmount + $vTotalItemAmount;
                    endfor;
                endif;
                            
                $vhtmlPDFDetail .= '
                        </tbody>
                    </table>
                    <br>
                    <table border="0">
                        <tbody>                            
                            <tr>
                                <td class="title-billing width-600">Monto total literal</td>
                                <td class="title-billing width-200">Monto total numeral</td>
                            </tr>
                            
                            <tr>
                                <td class="text-billing">'.$this->num2letras(number_format($vTotalBillingAmount, 2, '.', '')).'</td>
                                <td class="text-billing">'.number_format($vTotalBillingAmount, 2, '.', '').'</td>
                            </tr>                            
                        </tbody>
                    </table>
                    <br>
                    <table border="0">
                        <tbody>                            
                            <tr>
                                <td class="title-billing2 width-600"><strong>Código de control</strong> <span class="text-billing2">'.$this->formatControlCodeInvoice($vControlCode).'</span><br/><strong>Fecha límite de emisión</strong> <span class="text-billing2">'.$vLimitBillingDate.'</span></td>
                                <td class="width-200"><img src="'.$vQRCodeImageRoot.$vQRCodeName.'"/></td>
                            </tr>                            
                        </tbody>
                    </table>                    
                ';
            
                $vhtmlPDFFooter .= '
                    <div class="myfixed1">
                        <p>Esta factura contribuye al desarrollo del país, el uso ilícito de esta será sancionado de acuerdo a la ley.</p>
                        <p><strong>Ley Nº 453: El proveedor deberá suministrar el servicio en las modalidades y términos ofertados o convenidos.</strong></p>
                    </div>
                ';            

                $this->getLibrary('mpdf6/mpdf');
                $this->vPDFPrint = new mPDF('c','Letter','','',15,15,15,15,10,10); 

                $this->vPDFPrint->SetDisplayMode('fullpage');
                $this->vPDFPrint->list_indent_first_level = 0;

                //$stylesheet = file_get_contents(ROOT_APPLICATION.'views'.DIR_SEPARATOR.'layout'.DIR_SEPARATOR.DEFAULT_VIEW_LAYOUT.DIR_SEPARATOR.'backend'.DIR_SEPARATOR.'pages'.DIR_SEPARATOR.'css'.DIR_SEPARATOR.'invoice-letter.min.css');
                $stylesheet = file_get_contents(ROOT_APPLICATION.'views'.DIR_SEPARATOR.'layout'.DIR_SEPARATOR.DEFAULT_VIEW_LAYOUT.DIR_SEPARATOR.'backend'.DIR_SEPARATOR.'pages'.DIR_SEPARATOR.'css'.DIR_SEPARATOR.'invoice-letter-pdf.css');
                $this->vPDFPrint->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
                $this->vPDFPrint->WriteHTML($htmlPDFHeader.$vhtmlPDFDetail.$vhtmlPDFFooter,2);
                $this->vPDFPrint->Output('factura-'.$vCorrespondenceRoadMap.'.pdf','I');
                exit;
            }    
    }