<?Php

class systemBillingController extends IdEnController
	{    
		public function __construct(){
            
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
    
        private function getDosingWrenchKey(){
                return $this->vBillingData->getDataDosingWrenchKey();
            }
    
        private function getAutorizationcode(){
                return $this->vBillingData->getDataAutorizationcode();
            }    
    
		public function index(){
                $this->vView->vUserNamesComplete = $this->vUsersData->getUserNamesComplete(IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'Code'));

                $this->vView->vDataBilling = $this->vBillingData->getUserDataBillings(IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'Code'));
            
                $this->vView->visualizar('index');
			}
    
		public function registerNewBilling(){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    
                    $vCodDosingWrenchKey = $this->vBillingData->getCodeDosingWrenchKey();
                    $vCodAutorizationcode = $this->vBillingData->getCodeAutorizationcode();
                    $vNumberBilling = $this->vBillingData->generateNumberBilling() + 1;
                    $vActive = 2;
                    $vCodeBilling = $this->vBillingData->billingRegister($vCodDosingWrenchKey, $vCodAutorizationcode, $vNumberBilling, $vActive);
                    
                    echo $vCodeBilling;
                }
        }
    
		public function newBilling($vNumberBilling = 0, $vCodClient = 0){
                $this->vView->vUserNamesComplete = $this->vUsersData->getUserNamesComplete(IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'Code'));
                
                $vNumberBilling = (int) $vNumberBilling;
                $vCodClient = (int) $vCodClient;
                
                $vValidateStateBilling = $this->vBillingData->getValidateStateBilling($vNumberBilling);
            
                if(($vNumberBilling == 0) || empty($vValidateStateBilling) || is_null($vValidateStateBilling)){
                    $this->redirect('systemBilling');
                }
            
                if($vCodClient != 0){
                    $vClientName = $this->vBillingData->getClientName($vCodClient);
                    $vIDClient = $this->vBillingData->getClientNIT($vCodClient);
                } else {
                    $vClientName = '';
                    $vIDClient = '';
                }            
                
                $this->vView->vNITBilling = $this->vBillingData->getNITBilling();
            
                $this->vView->vActivityBilling = $this->vBillingData->getCodActivityFromBilling($vNumberBilling);
                $this->vView->vNameActivity = $this->vBillingData->getNameActivity($this->vBillingData->getCodActivityFromBilling($vNumberBilling));
                
                $this->vView->vDataActivityServices = $this->vBillingData->getActivityServices($this->vBillingData->getCodActivityFromBilling($vNumberBilling));
                
                $this->vView->vNITActivities = $this->vBillingData->getNITActivities();
                $this->vView->vAutorizationcode = $this->getAutorizationcode();
                
                $this->vView->vBillingDetail = $this->vBillingData->getDataBillingDetail($vNumberBilling);
                
                $this->vView->vNumberBilling = $this->vBillingData->getNumberBilling($vNumberBilling);
                
                $this->vView->vClientName = $vClientName;
                $this->vView->vIDClient = $vIDClient;
                $this->vView->vCodClient = $vCodClient;
            
                $this->vView->visualizar('newBilling');
			}
    
		public function dataBillingDetails(){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    
                    
                    $vCodActivity = (int) $_POST['vCodActivity'];
                    $vCodService = (int) $_POST['vCodService'];
                    $vNumBilling = (int) $_POST['vNumBilling'];
                    $vQuantity = (int) $_POST['vQuantity'];
                    $vDetail = (string) $_POST['vDetail'];
                    $vAmount = $_POST['vAmount'];
                    $vActive = 1;

                    $vCodDosingWrenchKey = (string) $this->getDosingWrenchKey();
                    $vNumAutorization = (string) $this->getAutorizationcode();
                    $vClientName = (string) $_POST['vClientName'];
                    $vIDClient = (string) $_POST['vIDClient'];
                    $vCodClient = $this->vBillingData->getCodClientThroughNIT($vIDClient);
                    $vBranchOffice = 1;
                    $vBillingDate = (string) $_POST['vDateTransactionBilling'];
                    
                    $vBillingCode = $this->vBillingData->getCodeBillingFromNumberBilling($vNumBilling);
                    
                    if(($vCodClient == 0) || empty($vCodClient) || is_null($vCodClient)){
                        $vCodClient = $this->vBillingData->clientRegister($vClientName, $vIDClient, 1);
                        
                        $this->vBillingData->updateBillingClientCode($vBillingCode, $vNumBilling, $vCodClient);
                            
                    } else {
                        $vCodClient = $this->vBillingData->getCodClientThroughNIT($vIDClient);
                    }
                    
                    
                    $vUpdateBillingActivity = $this->vBillingData->updateBillingActivity($vBillingCode, $vNumBilling, $vCodActivity);
                    
                    $vBillingDetailRegister = $this->vBillingData->billingDetailRegister($vBillingCode, 0, $vQuantity, $vCodService, $vDetail, $vAmount, $vActive);
                    
                    echo $vBillingCode.'/'.$vCodClient;
                }            
			}
    
		public function getActivityServices(){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $vCodActivity = (int) $_POST['vCodActivity'];
                    
                    $this->vDataActivityServices = $this->vBillingData->getActivityServices($vCodActivity);
                    
                    for($i=0;$i<count($this->vDataActivityServices);$i++):
                        $vDataServices .= '<option value="'.$this->vDataActivityServices[$i]['n_codservice'].'">'.$this->vDataActivityServices[$i]['c_nameservice'].'</option>';
                    endfor;
                    
                    echo $vDataServices;
                }
			}    
    
		public function dataBilling(){
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    
                    $vNumAutorization = (string) $this->getAutorizationcode();
                    
                    $vNumBilling = (string) $_POST['vNumBilling'];
                    $vClientName = (string) $_POST['vClientName'];
                    $vIDClient = (string) $_POST['vIDClient'];
                    $vDateTransactionBilling = (string) str_replace('/','',$_POST['vDateTransactionBilling']);
                    $vDateTransaction = str_replace('/','-',$_POST['vDateTransactionBilling']);
                    
                    $vAmountBilling = $this->roundNumber($_POST['vAmountBilling']);
                    //echo $vAmountBilling = $_POST['vAmountBilling'];
                    //exit;
                    
                    // GENERA LOS 5 NUMEROS DE VERHOEFF
                    $vFiveDigitVerhoeffNumber = $this->fiveDigitVerhoeffNumber($vNumBilling, $vIDClient, $vDateTransactionBilling, $vAmountBilling);
                    // GENERA LOS 5 NUMEROS DE VERHOEFF INCREMENTADOS EN 1 POR SEPARADO
                    $vFiveDigitVerhoeffSeparateDigits = $this->separateDigitsAndAddNumber($vFiveDigitVerhoeffNumber, 1);
                    
                    // GENERA LA CADENA CONCATENADA EXTRAIDA DE LA LLAVE DE DOSIFICACIÓN MÁS LOS 5 NUMEROS DE VERHOEFF INCREMENTADOS EN 1
                    $vStringDosingWrenchKey = $this->getDosingWrenchKeyString($vNumAutorization, $vNumBilling, $vIDClient, $vDateTransactionBilling, $vAmountBilling, $vFiveDigitVerhoeffSeparateDigits);
                    
                    // CADENA ALLEGEDRC4
                    $vStringAllegedRC4 = $this->algorithmAllegedRC4($vStringDosingWrenchKey, $this->getDosingWrenchKey(), $vFiveDigitVerhoeffNumber);
                    
                    // APLICACIÓN DE BASE64 A CADENA ALLEGEDRC4
                    $vStringBase64 = $this->algorithmBase64($vStringAllegedRC4);

                    // GENERACIÓN DEL CÓDIGO DE CONTROL
                    $vControlCodeString = $this->getControlCode($vStringBase64, $this->getDosingWrenchKey(), $vFiveDigitVerhoeffNumber);
                    
                    $vCodBilling = $this->vBillingData->getCodeBillingFromNumberBilling($vNumBilling);
                    
                    $vQRCodeImageName = $this->generateQRCode($vCodBilling, $vNumBilling, $vControlCodeString);
                    
                    $vActive = 1;
                    
                    $this->vBillingData->updateBillingControlCode($vCodBilling, $vNumBilling, $vDateTransaction, $vControlCodeString, $vQRCodeImageName, $vActive);
                    
                    echo 'invoiceLetter/'.$vNumBilling;
                }            
			}    
    
		public function deleteBillingDetail($vCodeBilling, $vCodeBillingDetail, $vCodClient){
                $vCodeBilling = (int) $vCodeBilling;
                $vCodeBillingDetail = (int) $vCodeBillingDetail;
                $vCodClient = (int) $vCodClient;
                $vActive = 1;

                $vDeleteBillingDetail = $this->vBillingData->deleteBillingDetail($vCodeBillingDetail);
                $this->redirect('systemBilling/newBilling/'.$vCodeBilling.'/'.$vCodClient);
			}
    
		public function generateQRCode($vCodBilling, $vNumBilling, $vControlCodeString){
                
            
                //http://localhost/easybilling/systemBilling/generateQRCode/1/897257/F427D81F
            
                $vCodBilling = (int) $vCodBilling;
                $vNumBilling = (int) $vNumBilling;
                $vControlCodeString = (string) $vControlCodeString;
                $vQRCodeName = $this->vBillingData->getQRCodeBillings($vCodBilling, $vBillingNumber);
            
                $this->vDataBilling = $this->vBillingData->getDataBilling($vNumBilling);
                $this->vDataBillingDetail = $this->vBillingData->getDataBillingDetail($vCodBilling);
            
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
                endif;
            
                $vTotalItemAmount = 0;
                $vTotalBillingAmount = 0;
                if(isset($this->vDataBillingDetail) && count($this->vDataBillingDetail)):
                    $vCount = 1;
                    for($i=0;$i<count($this->vDataBillingDetail);$i++):
                        $vTotalItemAmount = $this->vDataBillingDetail[$i]['n_quantity']*$this->vDataBillingDetail[$i]['n_amount'];
                        $vTotalBillingAmount = $vTotalBillingAmount + $vTotalItemAmount;
                    endfor;
                endif;            
            
                $vQRCodeImageName = '';

                if(($vQRCodeName == 0) || empty($vQRCodeName) || is_null($vQRCodeName)){
                    // CARGA LIBRERIAS
                    $this->getLibrary('phpqrcode/qrlib');

                    // GENERADOR QRCode
                    $tempDir =  ROOT_APPLICATION.'views'.DIR_SEPARATOR.'backend'.DIR_SEPARATOR.'systemBilling'.DIR_SEPARATOR.'imagesqrcode'.DIR_SEPARATOR;
                    //$codeContents = $vCodBilling.'/'.$vNumBilling.'/'.$vControlCodeString;
                    $codeContents = '4826454016'.'|'.$vBillingNumber.'|'.$vAutorizationcode.'|'.date('d/m/Y',$vBillingDate).'|'.number_format($vTotalBillingAmount, 2, '.', '').'|'.number_format($vTotalBillingAmount, 2, '.', '').'|'.$vControlCodeString.'|'.$vNit.'|0|0|0|0';
                    $fileName = $vNumBilling.'_'.md5($codeContents).'.png';
                    $pngAbsoluteFilePath = $tempDir.$fileName;
                    $urlRelativeFilePath = $fileName;
                    $vQRCodeImageName = $fileName;
                    
                    if (!file_exists($pngAbsoluteFilePath)) {
                        QRcode::png($codeContents, $pngAbsoluteFilePath);
                        
                    }
                    
                    return $vQRCodeImageName;
                
                } else {
                    
                    $vQRCodeImageName = $vQRCodeName;
                    
                    return $vQRCodeImageName;
                }
            }    
    
		public function invoiceLetter($vNumBilling){

                $vNumBilling = (int) $vNumBilling;
                $vCodBilling = $this->vBillingData->getCodeBillingFromNumberBilling($vNumBilling);
            
                $this->vView->vDataBilling = $this->vBillingData->getDataBilling($vNumBilling);
                $this->vView->vDataBillingDetail = $this->vBillingData->getDataBillingDetail($vCodBilling);
                
                $this->vView->visualizar('invoiceLetter');
			}    
    
		public function algorithmVerhoeff($vNumber, $vNumberLoop){
				/* CARGA LIBRERIAS */
				$this->getLibrary('verhoeff');
				$this->vNumberVerhoeff = new Verhoeff;
            
                $vNumber = (string) $vNumber;
                $vNumberLoop = (string) $vNumberLoop;
            
                /* NUMERO VERHOEFF */
                $vValor = '';
                for($i = 0; $i < $vNumberLoop; $i++){
                    $vValor = $vNumber.$this->vNumberVerhoeff->calc($vNumber);
                    
                    $vNumber = $vValor;
                }
            
                return $vNumber;
			}
    
		public function algorithmAllegedRC4($vStringDosingWrenchKey, $vDosingWrenchKey, $vFiveDigitVerhoeffNumber){
				/* CARGA LIBRERIAS */
				$this->getLibrary('allegedRC4');
				$this->vAllegedRC4String = new AllegedRC4;
            
                $vStringDosingWrenchKey = (string) $vStringDosingWrenchKey;
                $vDosingWrenchKey = (string) $vDosingWrenchKey;
            
                $vStringAllegedRC4 = $this->vAllegedRC4String->encryptMessageRC4($vStringDosingWrenchKey, $vDosingWrenchKey.$vFiveDigitVerhoeffNumber, true);            
            
                $vFiveDigitVerhoeffSeparateDigits = $this->separateDigitsAndAddNumber($vFiveDigitVerhoeffNumber, 1);
                $chars = str_split($vStringAllegedRC4);
            
                $totalAmount=0;
                $sp1=0; $sp2=0; $sp3=0; $sp4=0; $sp5=0;          
                $tmp=1;
            
                for($i=0; $i<strlen($vStringAllegedRC4);$i++){
                    $totalAmount += ord($chars[$i]);
                    switch($tmp){
                        case 1: $sp1 += ord($chars[$i]); break;
                        case 2: $sp2 += ord($chars[$i]); break;
                        case 3: $sp3 += ord($chars[$i]); break;
                        case 4: $sp4 += ord($chars[$i]); break;
                        case 5: $sp5 += ord($chars[$i]); break;
                    }            
                    $tmp = ($tmp<5)?$tmp+1:1;
                }
            
                $tmp1 = floor($totalAmount*$sp1/$vFiveDigitVerhoeffSeparateDigits[0]);
                $tmp2 = floor($totalAmount*$sp2/$vFiveDigitVerhoeffSeparateDigits[1]);
                $tmp3 = floor($totalAmount*$sp3/$vFiveDigitVerhoeffSeparateDigits[2]);
                $tmp4 = floor($totalAmount*$sp4/$vFiveDigitVerhoeffSeparateDigits[3]);
                $tmp5 = floor($totalAmount*$sp5/$vFiveDigitVerhoeffSeparateDigits[4]);

                $sumProduct = $tmp1 + $tmp2 + $tmp3 + $tmp4 + $tmp5;
            
                return $sumProduct;
			}

		public function algorithmBase64($vNumber){
				/* CARGA LIBRERIAS */
				$this->getLibrary('base64');
				$this->vBase64 = new Base64;
            
                $vNumber = (string) $vNumber;
                
                $vValor = $this->vBase64->convert($vNumber);

                return $vValor;
			}
    
		public function getControlCode($vStringBase64, $vDosingWrenchKey, $vFiveDigitVerhoeffNumber){
            
				/* CARGA LIBRERIAS */
				$this->getLibrary('allegedRC4');
				$this->vAllegedRC4String = new AllegedRC4;
            
                $vStringBase64 = (string) $vStringBase64;
                $vDosingWrenchKey = (string) $vDosingWrenchKey;
                $vFiveDigitVerhoeffNumber = (string) $vFiveDigitVerhoeffNumber;
            
                $vControlCodeString = $this->vAllegedRC4String->encryptMessageRC4($vStringBase64, $vDosingWrenchKey.$vFiveDigitVerhoeffNumber, true);

                return $vControlCodeString;
			}    
    
		public function fiveDigitVerhoeffNumber($vNumBilling, $vIDClient, $vDateTransactionBilling, $vAmountBilling){
            
                $vNumBilling = (string) $this->algorithmVerhoeff($vNumBilling, 2);
                $vIDClient = (string) $this->algorithmVerhoeff($vIDClient, 2);
                $vDateTransactionBilling = (string) $this->algorithmVerhoeff($vDateTransactionBilling, 2);
                $vAmountBilling = (string) $this->algorithmVerhoeff($vAmountBilling, 2);
                
                $vFiveDigitVerhoeffNumber = $vNumBilling + $vIDClient + $vDateTransactionBilling + $vAmountBilling;
            
                return substr($this->algorithmVerhoeff($vFiveDigitVerhoeffNumber,5), -5, 5);
			}
    
		public function getDosingWrenchKeyString($vNumAutorization, $vNumBilling, $vIDClient, $vDateTransactionBilling, $vAmountBilling, $vFiveDigitVerhoeffNumber){
                
                $vNumBilling = (string) $this->algorithmVerhoeff($vNumBilling, 2);
                $vIDClient = (string) $this->algorithmVerhoeff($vIDClient, 2);
                $vDateTransactionBilling = (string) $this->algorithmVerhoeff($vDateTransactionBilling, 2);
                $vAmountBilling = (string) $this->algorithmVerhoeff($vAmountBilling, 2);
            
                $vArrayFiveDigitVerhoeffNumber[] = array();
                $vArrayStringDosingWrenchKey[] = array();
                $vPositionStringDosingWrenchKey = 0;
            
                $vStringDosingWrenchKey = $this->getDosingWrenchKey();
            
                
                for($i = 0;$i < strlen($vFiveDigitVerhoeffNumber); $i++){ 
                    $vArrayStringDosingWrenchKey[$i] = substr($vStringDosingWrenchKey, $vPositionStringDosingWrenchKey, $vFiveDigitVerhoeffNumber[$i]);
                    $vStringDosingWrenchKey = substr($vStringDosingWrenchKey, $vArrayFiveDigitVerhoeffNumber[$i]);
                    $vPositionStringDosingWrenchKey = $vPositionStringDosingWrenchKey + $vFiveDigitVerhoeffNumber[$i];
                }
                
                $vArrayStringDosingWrenchKey[0] = $vNumAutorization.$vArrayStringDosingWrenchKey[0];
                $vArrayStringDosingWrenchKey[1] = $vNumBilling.$vArrayStringDosingWrenchKey[1];
                $vArrayStringDosingWrenchKey[2] = $vIDClient.$vArrayStringDosingWrenchKey[2];
                $vArrayStringDosingWrenchKey[3] = $vDateTransactionBilling.$vArrayStringDosingWrenchKey[3];
                $vArrayStringDosingWrenchKey[4] = $vAmountBilling.$vArrayStringDosingWrenchKey[4];
            
                $vStringDosingWrenchKey = $vArrayStringDosingWrenchKey[0].$vArrayStringDosingWrenchKey[1].$vArrayStringDosingWrenchKey[2].$vArrayStringDosingWrenchKey[3].$vArrayStringDosingWrenchKey[4];
                
                //return $vArrayFiveDigitVerhoeffNumber;
                //return print_r($vArrayStringDosingWrenchKey);
                return $vStringDosingWrenchKey;
			}
    
        public function ciclicProcess(){
            $this->vView->vUserNamesComplete = $this->vUsersData->getUserNamesComplete(IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'Code'));
            
            $this->vView->DataBillingCiclicProcess = $this->vBillingData->getDataBillingCiclicProcess();
            
            $this->vView->visualizar('ciclicProcess');
        }
    
        public function generateFileCiclicProcess(){
            
            $this->DataBillingCiclicProcess = $this->vBillingData->getDataBillingCiclicProcess();
            
            $vRootFileCreated =  ROOT_APPLICATION.'views'.DIR_SEPARATOR.'backend'.DIR_SEPARATOR.'systemBilling'.DIR_SEPARATOR.'documents'.DIR_SEPARATOR;
            
            $nombre_archivo = $vRootFileCreated.'logs.txt'; 
 
            if(file_exists($nombre_archivo)){
                $mensaje = "El Archivo $nombre_archivo se ha modificado. - ";
            } else {
                $mensaje = "El Archivo $nombre_archivo se ha creado. - ";
            }

            if($archivo = fopen($nombre_archivo, "x")){
                
               if(isset($this->DataBillingCiclicProcess) && count($this->DataBillingCiclicProcess)):
                    $vCount = 1;
                    for($i=0;$i<count($this->DataBillingCiclicProcess);$i++):
                        $vBillingData = $this->DataBillingCiclicProcess[$i]['GRUPO'].'|'.
                        $this->DataBillingCiclicProcess[$i]['c_autorizationcode'].'|'.
                        $this->DataBillingCiclicProcess[$i]['n_billingnumber'].'|'.
                        $this->DataBillingCiclicProcess[$i]['c_controlcode'].'|'.
                        $this->DataBillingCiclicProcess[$i]['c_nit'].'|'.
                        $this->DataBillingCiclicProcess[$i]['c_namenit'].'|'.
                        $this->DataBillingCiclicProcess[$i]['d_billingdate'].'|'.
                        $this->DataBillingCiclicProcess[$i]['n_totalamount'].'|'.
                        $this->DataBillingCiclicProcess[$i]['IMPORTE_ICE_IEH_TASAS'].'|'.
                        $this->DataBillingCiclicProcess[$i]['IMPORTE_EXTERNO'].'|'.
                        $this->DataBillingCiclicProcess[$i]['VENTAS_GRAVADAS'].'|'.
                        $this->DataBillingCiclicProcess[$i]['DESCUENTOS_BONIFICACIONES'].'|'.
                        $this->DataBillingCiclicProcess[$i]['PLACA'].'|'.
                        $this->DataBillingCiclicProcess[$i]['PAIS_ORIGEN_PLACA'].'|'.
                        $this->DataBillingCiclicProcess[$i]['TIPO_ENVASE'].'|'.
                        $this->DataBillingCiclicProcess[$i]['TIPO_PRODUCTO'].'|'.
                        $this->DataBillingCiclicProcess[$i]['AUTORIZACION_VENTA'].'|'.
                        $this->DataBillingCiclicProcess[$i]['TIPO_CAMBIO'].'|'.
                        $this->DataBillingCiclicProcess[$i]['TIPO_MONEDA'];
                        ++$vCount;
                        fwrite($archivo, $vBillingData.chr(13).chr(10));
                    endfor;
                endif;
                echo $vCount;
                /*if(fwrite($archivo, $vBillingData)){
                    fwrite($archivo,chr(13).chr(10));
                    echo "Se ha ejecutado correctamente.";
                } else {
                    echo "Ha habido un problema al crear el archivo.";
                } */               
                fclose($archivo);
            }            
        }    
    
	}
?>