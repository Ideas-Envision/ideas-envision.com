<?Php

class portfolioController extends IdEnController
	{		
		public function __construct()
			{
				parent::__construct();
			}
			
		public function index()
			{
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