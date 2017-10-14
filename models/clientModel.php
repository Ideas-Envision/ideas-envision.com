<?php

class clientModel extends IdEnModel
	{
		public function __construct(){
				parent::__construct();
			}

        /* BEGIN SELECT STATEMENT QUERY  */
    
		public function getTotalClients()
			{
            
				$vResultTotalClients = $this->vDataBase->query("SELECT COUNT(*) FROM tb_easybilling_client;");
				return $vResultTotalClients->fetchColumn();
				$vResultTotalClients->close();
			}
}