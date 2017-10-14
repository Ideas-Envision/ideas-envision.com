<?Php

class portfolioController extends IdEnController
	{		
		public function __construct()
			{
				parent::__construct();         
            
                $this->vUsersData = $this->LoadModel('users');
			}
			
		public function index()
			{
                $this->vView->vUserNamesComplete = $this->vUsersData->getUserNamesComplete(IdEnSession::getSession(DEFAULT_USER_AUTHENTICATE.'Code'));
				$this->vView->visualizar('index');
			}

		public function web()
			{
				$this->vView->visualizar('web');
			}

		public function design()
			{
				$this->vView->visualizar('design');
			}

		public function social()
			{
				$this->vView->visualizar('social');
			}						
	}
?>