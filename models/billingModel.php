<?php

class billingModel extends IdEnModel
    {
		public function __construct(){
				parent::__construct();
			}

        /* BEGIN SELECT STATEMENT QUERY  */
		public function getNITBilling()
            {
				$vResultNITBilling = $this->vDataBase->query("SELECT
                                                                        tb_easybilling_nit.n_nit
                                                                    FROM tb_easybilling_nit
                                                                        WHERE tb_easybilling_nit.n_active = 1;");
				return $vResultNITBilling->fetchColumn();
				$vResultNITBilling->close();
			}
    
		public function getNITActivities()
            {
				$vResultNITActivities = $this->vDataBase->query("SELECT
                                                                    tb_easybilling_nit.n_nit,
                                                                    tb_easybilling_activities.n_codactivity,
                                                                    tb_easybilling_activities.c_nameactivity
                                                                FROM tb_easybilling_nit, tb_easybilling_activities
                                                                    WHERE tb_easybilling_nit.n_codnit = tb_easybilling_activities.n_codnit
                                                                        AND tb_easybilling_nit.n_active = 1
                                                                        AND tb_easybilling_activities.n_active = 1;");
				return $vResultNITActivities->fetchAll();
				$vResultNITActivities->close();
			}
    
		public function getNameActivity($vCodActivity)
            {
                $vCodActivity = (int) $vCodActivity;
            
				$vResultNameActivity = $this->vDataBase->query("SELECT
                                                                    tb_easybilling_activities.c_nameactivity
                                                                FROM tb_easybilling_activities
                                                                    WHERE tb_easybilling_activities.n_codactivity = $vCodActivity;");
				return $vResultNameActivity->fetchColumn();
				$vResultNameActivity->close();
			}    
    
		public function getActivityServices($vCodActivity)
            {
                $vCodActivity = (int) $vCodActivity;
				$vResultActivityServices = $this->vDataBase->query("SELECT
                                                                        tb_easybilling_services.n_codservice,
                                                                        tb_easybilling_services.c_nameservice
                                                                    FROM tb_easybilling_services
                                                                        WHERE tb_easybilling_services.n_codactivity = $vCodActivity
                                                                            AND tb_easybilling_services.n_active = 1;");
				return $vResultActivityServices->fetchAll();
				$vResultActivityServices->close();
			}    
    
		public function getCodeDosingWrenchKey()
            {
				$vResultCodeDosingWrenchKey = $this->vDataBase->query("SELECT
                                                                        tb_easybilling_dosingwrenchkey.n_coddosingwrenchkey
                                                                    FROM tb_easybilling_dosingwrenchkey
                                                                        WHERE tb_easybilling_dosingwrenchkey.n_active = 1;");
				return $vResultCodeDosingWrenchKey->fetchColumn();
				$vResultCodeDosingWrenchKey->close();
			}    
    
		public function getDataDosingWrenchKey()
            {
				$vResultDataDosingWrenchKey = $this->vDataBase->query("SELECT
                                                                        tb_easybilling_dosingwrenchkey.c_dosingwrenchkey
                                                                    FROM tb_easybilling_dosingwrenchkey
                                                                        WHERE tb_easybilling_dosingwrenchkey.n_active = 1;");
				return $vResultDataDosingWrenchKey->fetchColumn();
				$vResultDataDosingWrenchKey->close();
			}    
    
		public function getCodeAutorizationcode()
            {
				$vResultDataAutorizationcode = $this->vDataBase->query("SELECT
                                                                        tb_easybilling_autorizationcode.n_codautorizationcode
                                                                    FROM tb_easybilling_autorizationcode
                                                                        WHERE tb_easybilling_autorizationcode.n_active = 1;");
				return $vResultDataAutorizationcode->fetchColumn();
				$vResultDataAutorizationcode->close();
			}
    
		public function getDataAutorizationcode()
            {
				$vResultDataAutorizationcode = $this->vDataBase->query("SELECT
                                                                        tb_easybilling_autorizationcode.c_autorizationcode
                                                                    FROM tb_easybilling_autorizationcode
                                                                        WHERE tb_easybilling_autorizationcode.n_active = 1;");
				return $vResultDataAutorizationcode->fetchColumn();
				$vResultDataAutorizationcode->close();
			}    
    
		public function getCodClientThroughNIT($vNitNumber)
            {
                $vNitNumber = (string) $vNitNumber;
				$vResultNitExists = $this->vDataBase->query("SELECT
                                                                    tb_easybilling_client.n_codclient
                                                                FROM tb_easybilling_client
                                                                    WHERE tb_easybilling_client.c_nit = '$vNitNumber';");
				return $vResultNitExists->fetchColumn();
				$vResultNitExists->close();
			}    
    
		public function getDataClients()
            {            
				$vResultDataClient = $this->vDataBase->query("SELECT
                                                                    tb_easybilling_client.n_codclient,
                                                                    tb_easybilling_client.c_name,
                                                                    tb_easybilling_client.c_lastname,
                                                                    tb_easybilling_client.c_namenit,
                                                                    tb_easybilling_client.c_nit,
                                                                    tb_easybilling_client.c_email,
                                                                    tb_easybilling_client.n_cellphone,
                                                                    tb_easybilling_client.n_active,
                                                                    tb_easybilling_client.c_usercreate,
                                                                    tb_easybilling_client.d_datecreate,
                                                                    tb_easybilling_client.c_usermod,
                                                                    tb_easybilling_client.d_datemod
                                                                FROM tb_easybilling_client;");
				return $vResultDataClient->fetchAll();
				$vResultDataClient->close();
			}    
    
		public function getDataClient($vCodClient)
            {
                $vCodClient = (int) $vCodClient;
            
				$vResultDataClient = $this->vDataBase->query("SELECT
                                                                        tb_easybilling_client.n_codclient,
                                                                        tb_easybilling_client.c_name,
                                                                        tb_easybilling_client.c_lastname,
                                                                        tb_easybilling_client.c_namenit,
                                                                        tb_easybilling_client.c_nit,
                                                                        tb_easybilling_client.c_email,
                                                                        tb_easybilling_client.n_cellphone,
                                                                        tb_easybilling_client.n_active,
                                                                        tb_easybilling_client.c_usercreate,
                                                                        tb_easybilling_client.d_datecreate,
                                                                        tb_easybilling_client.c_usermod,
                                                                        tb_easybilling_client.d_datemod
                                                                    FROM tb_easybilling_client
                                                                        WHERE tb_easybilling_client.n_codclient = '$vCodClient';");
				return $vResultDataClient->fetchAll();
				$vResultDataClient->close();
			}
    
		public function generateNumberBilling()
            {
            
				$vResultGenerateNumberBilling = $this->vDataBase->query("SELECT
                                                                              MAX(tb_easybilling_billings.n_billingnumber) AS n_billingnumber
                                                                            FROM tb_easybilling_billings
                                                                              ORDER BY tb_easybilling_billings.n_codbilling ASC;");
				return $vResultGenerateNumberBilling->fetchColumn();
				$vResultGenerateNumberBilling->close();
			}
    
		public function getValidateStateBilling($vNumberBilling)
            {
                $vNumberBilling = (int) $vNumberBilling;
            
				$vResultValidateStateBilling = $this->vDataBase->query("SELECT
                                                                            tb_easybilling_billings.n_active
                                                                        FROM tb_easybilling_billings
                                                                            WHERE tb_easybilling_billings.n_codbilling = $vNumberBilling;");
				return $vResultValidateStateBilling->fetchColumn();
				$vResultValidateStateBilling->close();
			}
    
		public function getCodeBillingFromNumberBilling($vBillingNumber)
            {
                $vBillingNumber = (int) $vBillingNumber;
            
				$vResultCodeBillingFromNumberBilling = $this->vDataBase->query("SELECT
                                                                            tb_easybilling_billings.n_codbilling
                                                                        FROM tb_easybilling_billings
                                                                            WHERE tb_easybilling_billings.n_billingnumber = $vBillingNumber;");
				return $vResultCodeBillingFromNumberBilling->fetchColumn();
				$vResultCodeBillingFromNumberBilling->close();
			}
    
		public function getCodActivityFromBilling($vNumberBilling)
            {
                $vNumberBilling = (int) $vNumberBilling;
            
				$vResultCodActivityBilling = $this->vDataBase->query("SELECT
                                                                            tb_easybilling_billings.n_codactivity
                                                                        FROM tb_easybilling_billings
                                                                            WHERE tb_easybilling_billings.n_codbilling = $vNumberBilling;");
				return $vResultCodActivityBilling->fetchColumn();
				$vResultCodActivityBilling->close();
			}    
    
		public function getNumberBilling($vNumberBilling)
            {
                $vNumberBilling = (int) $vNumberBilling;
            
				$vResultNumberBilling = $this->vDataBase->query("SELECT
                                                                            tb_easybilling_billings.n_billingnumber
                                                                        FROM tb_easybilling_billings
                                                                            WHERE tb_easybilling_billings.n_codbilling = $vNumberBilling;");
				return $vResultNumberBilling->fetchColumn();
				$vResultNumberBilling->close();
			}     
    
		public function getDataBilling($vNumberBilling)
            {
                $vNumberBilling = (int) $vNumberBilling;
            
				$vResultDataBilling = $this->vDataBase->query("SELECT
                                                                    tb_easybilling_billings.n_codbilling,
                                                                    tb_easybilling_billings.n_coduser,
                                                                    tb_easybilling_billings.n_coddosingwrenchkey,
                                                                    (SELECT
                                                                        tb_easybilling_autorizationcode.c_autorizationcode
                                                                      FROM tb_easybilling_autorizationcode
                                                                        WHERE tb_easybilling_autorizationcode.n_codautorizationcode = tb_easybilling_billings.n_codautorizationcode) AS c_autorizationcode,
                                                                    tb_easybilling_billings.n_codautorizationcode,
                                                                    (SELECT
                                                                        tb_easybilling_client.c_namenit
                                                                      FROM tb_easybilling_client
                                                                        WHERE tb_easybilling_client.n_codclient = tb_easybilling_billings.n_codclient) AS c_namenit,
                                                                    (SELECT
                                                                        tb_easybilling_client.c_nit
                                                                      FROM tb_easybilling_client
                                                                        WHERE tb_easybilling_client.n_codclient = tb_easybilling_billings.n_codclient) AS c_nit,                                                                    
                                                                    tb_easybilling_billings.n_codclient,
                                                                    tb_easybilling_billings.n_branchoffice,
                                                                    tb_easybilling_billings.n_billingnumber,
                                                                    (SELECT
                                                                        SUM(tb_easybilling_billingdetail.n_quantity*tb_easybilling_billingdetail.n_amount)
                                                                      FROM tb_easybilling_billingdetail
                                                                        WHERE tb_easybilling_billingdetail.n_codbilling = tb_easybilling_billings.n_codbilling) AS n_totalamount,
                                                                    tb_easybilling_billings.d_billingdate,
                                                                    tb_easybilling_billings.c_controlcode,
                                                                    tb_easybilling_billings.c_qrcodename,
                                                                    tb_easybilling_billings.n_active,
                                                                    tb_easybilling_billings.c_usercreate,
                                                                    tb_easybilling_billings.d_datecreate,
                                                                    tb_easybilling_billings.c_usermod,
                                                                    tb_easybilling_billings.d_datemod
                                                                FROM tb_easybilling_billings
                                                                    WHERE tb_easybilling_billings.n_billingnumber = $vNumberBilling;");
				return $vResultDataBilling->fetchAll();
				$vResultDataBilling->close();
			}     

		public function getDataBillings()
            {
            
				$vResultDataBilling = $this->vDataBase->query("SELECT
                                                                    tb_easybilling_billings.n_codbilling,
                                                                    tb_easybilling_billings.n_coduser,
                                                                    tb_easybilling_billings.n_coddosingwrenchkey,
                                                                    tb_easybilling_billings.n_codautorizationcode,
                                                                    (SELECT
                                                                        tb_easybilling_client.c_namenit
                                                                      FROM tb_easybilling_client
                                                                        WHERE tb_easybilling_client.n_codclient = tb_easybilling_billings.n_codclient) AS c_namenit,
                                                                    (SELECT
                                                                        tb_easybilling_client.c_nit
                                                                      FROM tb_easybilling_client
                                                                        WHERE tb_easybilling_client.n_codclient = tb_easybilling_billings.n_codclient) AS c_nit,                                                                    
                                                                    tb_easybilling_billings.n_codclient,
                                                                    tb_easybilling_billings.n_branchoffice,
                                                                    tb_easybilling_billings.n_billingnumber,
                                                                    (SELECT
                                                                        SUM(tb_easybilling_billingdetail.n_quantity*tb_easybilling_billingdetail.n_amount)
                                                                      FROM tb_easybilling_billingdetail
                                                                        WHERE tb_easybilling_billingdetail.n_codbilling = tb_easybilling_billings.n_codbilling) AS n_totalamount,
                                                                    tb_easybilling_billings.d_billingdate,
                                                                    tb_easybilling_billings.c_controlcode,
                                                                    tb_easybilling_billings.c_qrcodename,
                                                                    tb_easybilling_billings.n_active,
                                                                    tb_easybilling_billings.c_usercreate,
                                                                    tb_easybilling_billings.d_datecreate,
                                                                    tb_easybilling_billings.c_usermod,
                                                                    tb_easybilling_billings.d_datemod
                                                                FROM tb_easybilling_billings;");
				return $vResultDataBilling->fetchAll();
				$vResultDataBilling->close();
			}
    
		public function getUserDataBillings($vUserCode)
            {
                $vUserCode = (int) $vUserCode;
            
				$vResultDataBilling = $this->vDataBase->query("SELECT
                                                                    tb_easybilling_billings.n_codbilling,
                                                                    tb_easybilling_billings.n_coduser,
                                                                    tb_easybilling_billings.n_coddosingwrenchkey,
                                                                    tb_easybilling_billings.n_codautorizationcode,
                                                                    (SELECT
                                                                        tb_easybilling_client.c_namenit
                                                                      FROM tb_easybilling_client
                                                                        WHERE tb_easybilling_client.n_codclient = tb_easybilling_billings.n_codclient) AS c_namenit,
                                                                    (SELECT
                                                                        tb_easybilling_client.c_nit
                                                                      FROM tb_easybilling_client
                                                                        WHERE tb_easybilling_client.n_codclient = tb_easybilling_billings.n_codclient) AS c_nit,                                                                    
                                                                    tb_easybilling_billings.n_codclient,
                                                                    tb_easybilling_billings.n_branchoffice,
                                                                    tb_easybilling_billings.n_billingnumber,
                                                                    (SELECT
                                                                        SUM(tb_easybilling_billingdetail.n_quantity*tb_easybilling_billingdetail.n_amount)
                                                                      FROM tb_easybilling_billingdetail
                                                                        WHERE tb_easybilling_billingdetail.n_codbilling = tb_easybilling_billings.n_codbilling) AS n_totalamount,
                                                                    tb_easybilling_billings.d_billingdate,
                                                                    tb_easybilling_billings.c_controlcode,
                                                                    tb_easybilling_billings.c_qrcodename,
                                                                    tb_easybilling_billings.n_active,
                                                                    tb_easybilling_billings.c_usercreate,
                                                                    tb_easybilling_billings.d_datecreate,
                                                                    tb_easybilling_billings.c_usermod,
                                                                    tb_easybilling_billings.d_datemod
                                                                FROM tb_easybilling_billings
                                                                    WHERE tb_easybilling_billings.n_coduser = $vUserCode;");
				return $vResultDataBilling->fetchAll();
				$vResultDataBilling->close();
			}    
    
		public function getDataBillingDetail($vCodBilling)
            {
                $vCodBilling = (int) $vCodBilling;
            
				$vResultDataBillingDetail = $this->vDataBase->query("SELECT
                                                                        tb_easybilling_billingdetail.n_codbillingdetail,
                                                                        tb_easybilling_billingdetail.n_coduser,
                                                                        tb_easybilling_billingdetail.n_codbilling,
                                                                        tb_easybilling_billingdetail.n_service,
                                                                        (SELECT
                                                                            tb_easybilling_services.c_nameservice
                                                                          FROM tb_easybilling_services
                                                                            WHERE tb_easybilling_services.n_codservice = tb_easybilling_billingdetail.n_service
                                                                            AND tb_easybilling_services.n_active = 1) AS c_nameservice,                                                                        
                                                                        tb_easybilling_billingdetail.n_quantity,
                                                                        tb_easybilling_billingdetail.c_billingdetail,
                                                                        tb_easybilling_billingdetail.n_amount,
                                                                        tb_easybilling_billingdetail.n_active,
                                                                        tb_easybilling_billingdetail.c_usercreate,
                                                                        tb_easybilling_billingdetail.d_datecreate,
                                                                        tb_easybilling_billingdetail.c_usermod,
                                                                        tb_easybilling_billingdetail.d_datemod
                                                                    FROM tb_easybilling_billingdetail
                                                                        WHERE tb_easybilling_billingdetail.n_codbilling = $vCodBilling
                                                                            ORDER BY tb_easybilling_billingdetail.n_codbillingdetail ASC;");
				return $vResultDataBillingDetail->fetchAll();
				$vResultDataBillingDetail->close();
			}
    
		public function getClientName($vCodClient)
            {
                $vCodClient = (int) $vCodClient;
            
				$vResultClientName = $this->vDataBase->query("SELECT
                                                                    tb_easybilling_client.c_namenit
                                                                FROM tb_easybilling_client
                                                                    WHERE tb_easybilling_client.n_codclient = $vCodClient;");
				return $vResultClientName->fetchColumn();
				$vResultClientName->close();
			}
    
		public function getClientNIT($vCodClient)
            {
                $vCodClient = (int) $vCodClient;
            
				$vResultClientNIT = $this->vDataBase->query("SELECT
                                                                    tb_easybilling_client.c_nit
                                                                FROM tb_easybilling_client
                                                                    WHERE tb_easybilling_client.n_codclient = $vCodClient;");
				return $vResultClientNIT->fetchColumn();
				$vResultClientNIT->close();
			}
    
		public function getQRCodeBillings($vCodBilling, $vBillingNumber)
            {
                $vBillingNumber = (int) $vBillingNumber;
                $vCodBilling = (int) $vCodBilling;
            
				$vResultQRCodeBillings = $this->vDataBase->query("SELECT
                                                                    tb_easybilling_billings.c_qrcodename
                                                                FROM tb_easybilling_billings
                                                                    WHERE tb_easybilling_billings.n_codbilling = $vCodBilling
                                                                        AND tb_easybilling_billings.n_billingnumber = $vBillingNumber;");
				return $vResultQRCodeBillings->fetchColumn();
				$vResultQRCodeBillings->close();
			}
    
		public function getDataBillingCiclicProcess()
            {
            
				$vResultDataBillingCiclicProcess = $this->vDataBase->query("SELECT
                                                                               (SELECT
                                                                                    tb_easybilling_activities.c_group
                                                                                  FROM tb_easybilling_activities
                                                                                    WHERE tb_easybilling_activities.n_codactivity = tb_easybilling_billings.n_codactivity
                                                                                ) AS GRUPO,
                                                                                (SELECT
                                                                                    tb_easybilling_autorizationcode.c_autorizationcode
                                                                                  FROM tb_easybilling_autorizationcode
                                                                                    WHERE tb_easybilling_autorizationcode.n_codautorizationcode = tb_easybilling_billings.n_codautorizationcode) AS c_autorizationcode,
                                                                                tb_easybilling_billings.n_billingnumber,
                                                                                tb_easybilling_billings.c_controlcode,
                                                                                (SELECT
                                                                                    tb_easybilling_client.c_nit
                                                                                  FROM tb_easybilling_client
                                                                                    WHERE tb_easybilling_client.n_codclient = tb_easybilling_billings.n_codclient) AS c_nit,
                                                                                (SELECT
                                                                                    tb_easybilling_client.c_namenit
                                                                                  FROM tb_easybilling_client
                                                                                    WHERE tb_easybilling_client.n_codclient = tb_easybilling_billings.n_codclient) AS c_namenit,
                                                                                tb_easybilling_billings.d_billingdate,
                                                                                (SELECT
                                                                                    SUM(tb_easybilling_billingdetail.n_quantity*tb_easybilling_billingdetail.n_amount)
                                                                                  FROM tb_easybilling_billingdetail
                                                                                    WHERE tb_easybilling_billingdetail.n_codbilling = tb_easybilling_billings.n_codbilling) AS n_totalamount,
                                                                                0 AS IMPORTE_ICE_IEH_TASAS,
                                                                                0 AS IMPORTE_EXTERNO,
                                                                                0 AS VENTAS_GRAVADAS,
                                                                                0 AS DESCUENTOS_BONIFICACIONES,
                                                                                0 AS PLACA,
                                                                                0 AS PAIS_ORIGEN_PLACA,
                                                                                0 AS TIPO_ENVASE,
                                                                                0 AS TIPO_PRODUCTO,
                                                                                0 AS AUTORIZACION_VENTA,
                                                                                0 AS TIPO_CAMBIO,
                                                                                0 AS TIPO_MONEDA
                                                                            FROM tb_easybilling_billings;");
				return $vResultDataBillingCiclicProcess->fetchAll();
				$vResultDataBillingCiclicProcess->close();
			}    
    
        /* END SELECT STATEMENT QUERY  */
    
        /* BEGIN INSERT STATEMENT QUERY  */
		public function clientRegister($vNameNit, $vNit, $vActive){
            
                $vNameNit = (string) $vNameNit;
                $vNit = (string) $vNit;
                $vActive = (int) $vActive;

                $vUserCreate = (string) IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'UserName');
            
				$vResultClientRegister = $this->vDataBase->prepare("INSERT INTO tb_easybilling_client(c_namenit, c_nit, n_active, c_usercreate, d_datecreate)
																VALUES(:c_namenit, :c_nit, :n_active, :c_usercreate, NOW())")
								->execute(
										array(
                                            ':c_namenit' => $vNameNit,
                                            ':c_nit' => $vNit,
                                            ':n_active' => $vActive,
                                            ':c_usercreate' => $vUserCreate,
										));
                return $vResultClientRegister = $this->vDataBase->lastInsertId();
                $vResultClientRegister->close();
			}
    
		public function billingRegister($vCodDosingWrenchKey, $vCodAutorizationcode, $vNumberBilling, $vActive){
            
                $vCodDosingWrenchKey = (int) $vCodDosingWrenchKey;
                $vCodAutorizationcode = (int) $vCodAutorizationcode;
                $vNumberBilling = (int) $vNumberBilling;
                $vActive = (int) $vActive;

                $vUserCode = (int) IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'Code');
                $vUserCreate = (string) IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'UserName');

				$vResultBillingRegister = $this->vDataBase->prepare("INSERT INTO tb_easybilling_billings(n_coduser, n_coddosingwrenchkey, n_codautorizationcode, n_billingnumber, n_active, c_usercreate, d_datecreate)
																VALUES(:n_coduser, :n_coddosingwrenchkey, :n_codautorizationcode, :n_billingnumber, :n_active, :c_usercreate, NOW())")
								->execute(
										array(
                                            ':n_coduser' => $vUserCode,
                                            ':n_coddosingwrenchkey' => $vCodDosingWrenchKey,
                                            ':n_codautorizationcode' => $vCodAutorizationcode,
                                            ':n_billingnumber' => $vNumberBilling,
                                            ':n_active' => $vActive,
                                            ':c_usercreate' => $vUserCreate,
										));
                return $vResultBillingRegister = $this->vDataBase->lastInsertId();
                $vResultBillingRegister->close();
			}    
    
		public function billingDetailRegister($vCodBilling, $vCodService, $vQuantity, $vCodService, $vBillingDetail, $vAmount, $vActive){
            
                $vCodBilling = (int) $vCodBilling;
                $vCodService = (int) $vCodService;
                $vQuantity = (int) $vQuantity;
                $vCodService = (int) $vCodService;
                $vBillingDetail = (string) $vBillingDetail;
                $vAmount = floatval($vAmount);
                $vActive = (int) $vActive;
            
                $vUserCode = (int) IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'Code');
                $vUserCreate = (string) IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'UserName');

				$vResultBillingDetailRegister = $this->vDataBase->prepare("INSERT INTO tb_easybilling_billingdetail(n_coduser, n_codbilling, n_service, n_quantity, c_billingdetail, n_amount, n_active, c_usercreate, d_datecreate)
																VALUES(:n_coduser, :n_codbilling, :n_service, :n_quantity, :c_billingdetail, :n_amount, :n_active, :c_usercreate, NOW())")
								->execute(
										array(
                                            ':n_coduser' => $vUserCode,
                                            ':n_codbilling' => $vCodBilling,
                                            ':n_service' => $vCodService,
                                            ':n_quantity' => $vQuantity,
                                            ':c_billingdetail' => $vBillingDetail,
                                            ':n_amount' => $vAmount,
                                            ':n_active' => $vActive,
                                            ':c_usercreate' => $vUserCreate
										));
                return $vResultBillingDetailRegister = $this->vDataBase->lastInsertId();
                $vResultBillingDetailRegister->close();
			}    
        /* END INSERT STATEMENT QUERY  */
    
        /* BEGIN UPDATE STATEMENT QUERY  */
		public function updateBillingActivity($vCodBilling, $vNumBilling, $vCodActivity)
            {            
                $vCodBilling = (int) $vCodBilling;
                $vNumBilling = (int) $vNumBilling;
                $vCodActivity = (int) $vCodActivity;

                $vUserMod = (string) IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'UserName');
            
                $vResultUpdateBillingActivity = $this->vDataBase->prepare("UPDATE
                                                                            tb_easybilling_billings
                                                                        SET tb_easybilling_billings.n_codactivity = :n_codactivity,
                                                                            tb_easybilling_billings.c_usermod = :c_usermod,
                                                                            tb_easybilling_billings.d_datemod = NOW()
                                                                        WHERE tb_easybilling_billings.n_codbilling = :n_codbilling
                                                                            AND tb_easybilling_billings.n_billingnumber = :n_billingnumber;")
                                ->execute(
                                            array(
                                                    ':n_codactivity'=>$vCodActivity,
                                                    ':c_usermod'=>$vUserMod,
                                                    ':n_codbilling'=>$vCodBilling,
                                                    ':n_billingnumber'=>$vNumBilling
                                                 )
                                         );
            
                return $vResultUpdateBillingActivity;
                $vResultUpdateBillingActivity->close();
			}
    
		public function updateBillingClientCode($vCodBilling, $vNumBilling, $vCodClient)
            {            
                $vCodBilling = (int) $vCodBilling;
                $vNumBilling = (int) $vNumBilling;
                $vCodClient = (int) $vCodClient;

                $vUserMod = (string) IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'UserName');
            
                $vResultUpdateBillingClientCode = $this->vDataBase->prepare("UPDATE
                                                                            tb_easybilling_billings
                                                                        SET tb_easybilling_billings.n_codclient = :n_codclient,
                                                                            tb_easybilling_billings.c_usermod = :c_usermod,
                                                                            tb_easybilling_billings.d_datemod = NOW()
                                                                        WHERE tb_easybilling_billings.n_codbilling = :n_codbilling
                                                                            AND tb_easybilling_billings.n_billingnumber = :n_billingnumber;")
                                ->execute(
                                            array(
                                                    ':n_codclient'=>$vCodClient,
                                                    ':c_usermod'=>$vUserMod,
                                                    ':n_codbilling'=>$vCodBilling,
                                                    ':n_billingnumber'=>$vNumBilling
                                                 )
                                         );
            
                return $vResultUpdateBillingControlCode;
                $vResultUpdateBillingControlCode->close();
			}    
    
		public function updateBillingControlCode($vCodBilling, $vNumBilling, $vDateTransaction, $vControlCodeString, $vQRCodeImageName, $vActive)
            {            
                $vCodBilling = (int) $vCodBilling;
                $vNumBilling = (int) $vNumBilling;
                $vDateTransaction = date('Y/m/d H:i:s',strtotime($vDateTransaction));
                $vControlCodeString = (string) $vControlCodeString;
                $vQRCodeImageName = (string) $vQRCodeImageName;
                $vActive = (int) $vActive;

                $vUserMod = (string) IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'UserName');
            
                $vResultUpdateBillingControlCode = $this->vDataBase->prepare("UPDATE
                                                                            tb_easybilling_billings
                                                                        SET tb_easybilling_billings.d_billingdate = :d_billingdate,
                                                                            tb_easybilling_billings.c_controlcode = :c_controlcode,
                                                                            tb_easybilling_billings.c_qrcodename = :c_qrcodename,
                                                                            tb_easybilling_billings.n_active = :n_active,
                                                                            tb_easybilling_billings.c_usermod = :c_usermod,
                                                                            tb_easybilling_billings.d_datemod = NOW()
                                                                        WHERE tb_easybilling_billings.n_codbilling = :n_codbilling
                                                                            AND tb_easybilling_billings.n_billingnumber = :n_billingnumber;")
                                ->execute(
                                            array(
                                                    ':d_billingdate'=>$vDateTransaction,
                                                    ':c_controlcode'=>$vControlCodeString,
                                                    ':c_qrcodename'=>$vQRCodeImageName,
                                                    ':n_active'=>$vActive,
                                                    ':c_usermod'=>$vUserMod,
                                                    ':n_codbilling'=>$vCodBilling,
                                                    ':n_billingnumber'=>$vNumBilling
                                                 )
                                         );
            
                return $vResultUpdateBillingControlCode;
                $vResultUpdateBillingControlCode->close();
			}
        /* END UPDATE STATEMENT QUERY  */      
    
        /* BEGIN DELETE STATEMENT QUERY  */
        public function deleteBillingDetail($vCodeBillingDetail){
				$vCodeBillingDetail = (int) $vCodeBillingDetail;				
				$this->vDataBase->query("DELETE FROM tb_easybilling_billingdetail WHERE n_codbillingdetail = $vCodeBillingDetail;");
			}        
        /* END DELETE STATEMENT QUERY  */
    }
