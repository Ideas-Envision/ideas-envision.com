<?php

abstract class IdEnController
	{
		protected $vView;
		
		public function __construct()
			{
				$this->vView = new IdEnView(new IdEnRequest);
			}
		
		abstract public function index();/* OBLIGA A TODAS LAS CLASES HEREDADAS DE LA MISMA IMPLEMENTEN UN METODO INDEX CON O SIN CODIGO */
		
		protected function LoadModel($vModel)
			{
				$vModel = $vModel.'Model';
				$vRouteModel = ROOT_APPLICATION.'models'.DIR_SEPARATOR.$vModel.'.php';
				
				if(is_readable($vRouteModel))
					{
						require_once $vRouteModel;
						$vModel = new $vModel;
						return $vModel;
					}
				else
					{
						throw new Exception($vModel.' - No Existe el Modelo!');
						//header('Location: '.BASE_VIEW_URL.'error/model/1005');
						exit;						
					}
			}
        
		protected function getLibrary($vLibrary)
			{
				$vRouteLibrary = ROOT_APPLICATION.'libs'.DIR_SEPARATOR.$vLibrary.'.php';
				
				if(is_readable($vRouteLibrary))
					{
						require_once $vRouteLibrary;
					}
				else
					{
						throw new Exception($vLibrary.' - No Existe la Libreria!');
					}
			}        
		
		protected function redirect($vRoute = FALSE)
			{
				if($vRoute)
					{
						header('Location:'.BASE_VIEW_URL.$vRoute);
						exit;								
					}
				else
					{
						header('Location:'.BASE_VIEW_URL);					
						exit;						
					}
			}
    
        /* BEGIN VALIDADORES EN FUNCIONES GLOBALES - PÚBLICAS */
        public function stringLength($vString){
            
                $vNumCharacters = 0;
                $vNumCharacters = strlen($vString);

                return $vNumCharacters;
            
            }
    
        public function userNameValid($vString){
                
                if(ereg('^[a-zA-Z0-9]{3,20}$', $vString)){
                    //echo "El nombre de usuario $nombre_usuario es correcto<br>";
                    return true;
                } else {
                    //echo "El nombre de usuario $nombre_usuario no es válido<br>";
                    return false;
                } 
            
            }    
    
        /* END VALIDADORES EN FUNCIONES GLOBALES - PÚBLICAS */    
    
        /* BEGIN GLOBAL FUNCTIONS */
        public function stringInverted($vStringNormal){
            $vStringNormal = (string) $vStringNormal;
            $vStringInverted = '';
            
            for ($i=strlen($vStringNormal); $i >= 0; $i--){
              $vStringInverted .= $vStringNormal[$i];
            }
            
            return $vStringInverted;
        }
    
        public function separateDigitsAndAddNumber($vNumberToSeparate, $vNumberToAdd){
            $vNumberToSeparate = (string) $vNumberToSeparate;
            $vNumberToAdd = (float) $vNumberToAdd;
            
            $x = (string) $vNumberToSeparate;
            
            $vNewVal[] = '';

            for($i = 0;$i < strlen($x); $i++){ 
                $vNewVal[$i] = $x[$i] + $vNumberToAdd;
                
            }
            
            return $vNewVal;

        }
    
        public function roundNumber($vNumber){
            
            $vNumber = str_replace(',','.',$vNumber);
            $vNumber = explode('.',$vNumber);
            //print_r($vNumber);
             //round($vNumber);
            
            if(count($vNumber) == 1){
                $vNumber = $vNumber[0];
            } elseif(count($vNumber) == 2){
                    $vDecimales = (int) $vNumber[1];
                    if(strlen($vDecimales) == 1){
                        if($vDecimales >= 5){
                            //echo $vDecimales.' es mayor que 5';
                            $vNumber = $vNumber[0]+1;
                        } else {
                            //echo $vDecimales.' es menor que 5';
                            $vNumber = $vNumber[0];
                        }                
                    } else if(strlen($vDecimales) == 2){
                        if($vDecimales >= 50){
                            //echo $vDecimales.' es mayor que 50';
                            $vNumber = $vNumber[0]+1;
                        } else {
                            //echo $vDecimales.' es menor que 50';
                            $vNumber = $vNumber[0];
                        }                
                    }
                //exit;
            } else if(count($vNumber) == 3){
                    $vDecimales = (int) $vNumber[2];
                    if(strlen($vDecimales) == 1){
                        if($vDecimales >= 5){
                            //echo $vDecimales.' es mayor que 5';
                            $vNumber = ($vNumber[0].$vNumber[1])+1;
                        } else {
                            //echo $vDecimales.' es menor que 5';
                            $vNumber = $vNumber[0].$vNumber[1];
                        }                
                    } else if(strlen($vDecimales) == 2){
                        if($vDecimales >= 50){
                            //echo $vDecimales.' es mayor que 50';
                            $vNumber = ($vNumber[0].$vNumber[1])+1;
                        } else {
                            //echo $vDecimales.' es menor que 50';
                            $vNumber = $vNumber[0].$vNumber[1];
                        }                
                    }                
                }

            return $vNumber;
            
        }

        public function validateNumber($value){
            if(!preg_match('/^[0-9,.]+$/', $value)){
                throw new InvalidArgumentException(sprintf("Error! Valor restringido a número, %s no es un número.",$value));
            }
        }

        public function validateDosageKey($value){
            if(!preg_match('/^[A-Za-z0-9=#()*+-_\@\[\]{}%$]+$/', $value)){
                throw new InvalidArgumentException(sprintf("Error! llave de dosificación,<b> %s </b>contiene caracteres NO permitidos.",$value));
            }
        }
    
        public function compararCadenas($vString1, $vString2){        
            $vString1 = (string) $vString1;
            $vString2 = (string) $vString2;

            if(strcmp($vString1, $vString2) == 0){
                return 'son iguales';
            } else {
                return 'no son iguales';
            }            
        }
    
        public function formatControlCodeInvoice($vString){
            
            $vStringLength = strlen($vString);
            $vTimesSeparate = $vStringLength/2;
            $vCount = 0;
            $vLoop = 2;
            $vControlCodeInvoice = '';
            
            while($vCount < $vStringLength){
                    $vControlCodeInvoice .= substr($vString, $vCount, $vLoop).'-';
                    $vCount = $vCount + $vLoop;
                }
            
            return substr($vControlCodeInvoice, 0, strlen($vControlCodeInvoice)-1);
            
            
        }
    
    
    
    
    
    
        public function num2letras($num, $fem = false, $dec = true) { 
           $matuni[2]  = "dos"; 
           $matuni[3]  = "tres"; 
           $matuni[4]  = "cuatro"; 
           $matuni[5]  = "cinco"; 
           $matuni[6]  = "seis"; 
           $matuni[7]  = "siete"; 
           $matuni[8]  = "ocho"; 
           $matuni[9]  = "nueve"; 
           $matuni[10] = "diez"; 
           $matuni[11] = "once"; 
           $matuni[12] = "doce"; 
           $matuni[13] = "trece"; 
           $matuni[14] = "catorce"; 
           $matuni[15] = "quince"; 
           $matuni[16] = "dieciseis"; 
           $matuni[17] = "diecisiete"; 
           $matuni[18] = "dieciocho"; 
           $matuni[19] = "diecinueve"; 
           $matuni[20] = "veinte"; 
           $matunisub[2] = "dos"; 
           $matunisub[3] = "tres"; 
           $matunisub[4] = "cuatro"; 
           $matunisub[5] = "quin"; 
           $matunisub[6] = "seis"; 
           $matunisub[7] = "sete"; 
           $matunisub[8] = "ocho"; 
           $matunisub[9] = "nove"; 

           $matdec[2] = "veint"; 
           $matdec[3] = "treinta"; 
           $matdec[4] = "cuarenta"; 
           $matdec[5] = "cincuenta"; 
           $matdec[6] = "sesenta"; 
           $matdec[7] = "setenta"; 
           $matdec[8] = "ochenta"; 
           $matdec[9] = "noventa"; 
           $matsub[3]  = 'mill'; 
           $matsub[5]  = 'bill'; 
           $matsub[7]  = 'mill'; 
           $matsub[9]  = 'trill'; 
           $matsub[11] = 'mill'; 
           $matsub[13] = 'bill'; 
           $matsub[15] = 'mill'; 
           $matmil[4]  = 'millones'; 
           $matmil[6]  = 'billones'; 
           $matmil[7]  = 'de billones'; 
           $matmil[8]  = 'millones de billones'; 
           $matmil[10] = 'trillones'; 
           $matmil[11] = 'de trillones'; 
           $matmil[12] = 'millones de trillones'; 
           $matmil[13] = 'de trillones'; 
           $matmil[14] = 'billones de trillones'; 
           $matmil[15] = 'de billones de trillones'; 
           $matmil[16] = 'millones de billones de trillones'; 

           //Zi hack
           $float=explode('.',$num);
           $num=$float[0];

           $num = trim((string)@$num); 
           if ($num[0] == '-') { 
              $neg = 'menos '; 
              $num = substr($num, 1); 
           }else 
              $neg = ''; 
           while ($num[0] == '0') $num = substr($num, 1); 
           if ($num[0] < '1' or $num[0] > 9) $num = '0' . $num; 
           $zeros = true; 
           $punt = false; 
           $ent = ''; 
           $fra = ''; 
           for ($c = 0; $c < strlen($num); $c++) { 
              $n = $num[$c]; 
              if (! (strpos(".,'''", $n) === false)) { 
                 if ($punt) break; 
                 else{ 
                    $punt = true; 
                    continue; 
                 } 

              }elseif (! (strpos('0123456789', $n) === false)) { 
                 if ($punt) { 
                    if ($n != '0') $zeros = false; 
                    $fra .= $n; 
                 }else 

                    $ent .= $n; 
              }else 

                 break; 

           } 
           $ent = '     ' . $ent; 
           if ($dec and $fra and ! $zeros) { 
              $fin = ' coma'; 
              for ($n = 0; $n < strlen($fra); $n++) { 
                 if (($s = $fra[$n]) == '0') 
                    $fin .= ' cero'; 
                 elseif ($s == '1') 
                    $fin .= $fem ? ' una' : ' un'; 
                 else 
                    $fin .= ' ' . $matuni[$s]; 
              } 
           }else 
              $fin = ''; 
           if ((int)$ent === 0) return 'Cero ' . $fin; 
           $tex = ''; 
           $sub = 0; 
           $mils = 0; 
           $neutro = false; 
           while ( ($num = substr($ent, -3)) != '   ') { 
              $ent = substr($ent, 0, -3); 
              if (++$sub < 3 and $fem) { 
                 $matuni[1] = 'una'; 
                 $subcent = 'os'; 
              }else{ 
                 $matuni[1] = $neutro ? 'un' : 'uno'; 
                 $subcent = 'os'; 
              } 
              $t = ''; 
              $n2 = substr($num, 1); 
              if ($n2 == '00') { 
              }elseif ($n2 < 21) 
                 $t = ' ' . $matuni[(int)$n2]; 
              elseif ($n2 < 30) { 
                 $n3 = $num[2]; 
                 if ($n3 != 0) $t = 'i' . $matuni[$n3]; 
                 $n2 = $num[1]; 
                 $t = ' ' . $matdec[$n2] . $t; 
              }else{ 
                 $n3 = $num[2]; 
                 if ($n3 != 0) $t = ' y ' . $matuni[$n3]; 
                 $n2 = $num[1]; 
                 $t = ' ' . $matdec[$n2] . $t; 
              } 
              $n = $num[0]; 
              if ($n == 1) { 
                 $t = ' ciento' . $t; 
              }elseif ($n == 5){ 
                 $t = ' ' . $matunisub[$n] . 'ient' . $subcent . $t; 
              }elseif ($n != 0){ 
                 $t = ' ' . $matunisub[$n] . 'cient' . $subcent . $t; 
              } 
              if ($sub == 1) { 
              }elseif (! isset($matsub[$sub])) { 
                 if ($num == 1) { 
                    $t = ' mil'; 
                 }elseif ($num > 1){ 
                    $t .= ' mil'; 
                 } 
              }elseif ($num == 1) { 
                 $t .= ' ' . $matsub[$sub] . '?n'; 
              }elseif ($num > 1){ 
                 $t .= ' ' . $matsub[$sub] . 'ones'; 
              }   
              if ($num == '000') $mils ++; 
              elseif ($mils != 0) { 
                 if (isset($matmil[$sub])) $t .= ' ' . $matmil[$sub]; 
                 $mils = 0; 
              } 
              $neutro = true; 
              $tex = $t . $tex; 
           } 
           $tex = $neg . substr($tex, 1) . $fin; 
           //Zi hack --> return ucfirst($tex);
           $end_num=ucfirst($tex).' bolivianos '.$float[1].'/100 BOLIVIANOS';
           return $end_num; 
        }     
    

        public function spanishLiteralDate($fecha) {
            $fecha = substr($fecha, 0, 10);
            
            $numeroDia = date('d', strtotime($fecha));
            
            $dia = date('l', strtotime($fecha));
            $mes = date('F', strtotime($fecha));
            $anio = date('Y', strtotime($fecha));
            
            $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
            $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
            $nombredia = str_replace($dias_EN, $dias_ES, $dia);
            
            $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
            $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
            
            $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
            
            return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
        }    
        /* END GLOBAL FUNCTIONS */
						
	}

?>
