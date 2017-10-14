<?Php

class clientsController extends IdEnController
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
                $this->vClientsData = $this->LoadModel('client');
			}
			
		public function index(){
            
                $this->vView->vUserNamesComplete = $this->vUsersData->getUserNamesComplete(IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'Code'));
            
                $this->vView->vTotalClients = $this->vClientsData->getTotalClients();
                $this->vView->visualizar('index');
            
			}       
	}
?>