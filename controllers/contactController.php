<?Php

class contactController extends IdEnController
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
			}
			
		public function index()
			{
                $this->vView->vUserNamesComplete = $this->vUsersData->getUserNamesComplete(IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'Code'));
				$this->vView->visualizar('index');
			}

		public function sendMail()
			{
				if($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						$fname = (string) $_POST['fname'];
						$lname = (string) $_POST['lname'];
						$email = (string) $_POST['email'];
						$website = (string) $_POST['website'];
						$message = (string) $_POST['message'];

						echo 'true';
					}				
				//$this->vView->visualizar('index');
			}

		public function sendOneMail()
			{												

				if ($_SERVER['REQUEST_METHOD'] == 'POST')
					{
						$fname = (string) $_POST['fname'];
						$lname = (string) $_POST['lname'];
						$email = (string) $_POST['email'];
						$website = (string) $_POST['website'];
						$message = (string) $_POST['message'];

						$vTextMessage = '<strong>Nombre Completo:</strong> '.$fname.' '.$lname.'<br/>'.'<strong>Correo Electronico:</strong> '.$email.'<br/>'.'<strong>Sitio Web:</strong> '.$website.'<br/>'.'<strong>Consulta:</strong> '.$message.'<br/>';
						
						$this->getLibrary('class.phpmailer');
						$this->vMail = new PHPMailer();								
						//$this->vMail->IsSMTP();
						$this->vMail->SMTPAuth = true;
						$this->vMail->Host = 'smtp.ideas-envision.com';
						$this->vMail->Username = 'informaciones@ideas-envision.com';
						$this->vMail->Password = '@1nf0rm4c10n3s';
						$this->vMail->SMTPSecure = 'ssl';
						$this->vMail->Port = 25;
						$this->vMail->SetFrom($email, strtoupper($fname.' '.$lname));
						$this->vMail->AddAddress(strtolower(trim('informaciones@ideas-envision.com')));
						$this->vMail->Subject = 'Consulta de servicios a Ideas-Envision';
						$this->vMail->MsgHTML($vTextMessage);											

						$exito = $this->vMail->Send();
						
						if($exito)
							{
								 $this->vMail->ClearAddresses();
								 //echo 'Se ha enviado el correo a '.$email;
								 echo 'true';
							}
						else
							{
								 //echo 'No se ha enviado el correo a '.$email;
								echo 'false';
							}

					}
			}	
	}
?>