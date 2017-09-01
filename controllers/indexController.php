<?Php

class indexController extends IdEnController
	{		
		public function __construct(){
                parent::__construct();
            
                $this->vUsersData = $this->LoadModel('users');
			}
			
		public function index(){
            $this->vView->vUserNamesComplete = $this->vUsersData->getUserNamesComplete(IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'Code'));
            $this->vView->visualizar('index');
			}       
	}
?>