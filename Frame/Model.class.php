<?php
 
class Model{
	protected $dao;

	public function __construct(){
		$this->initDao();
	}
        
        private function initDao(){
            
            $config = $GLOBALS['conf']['database'];
            switch (strtolower($GLOBALS['conf']['App']['dao'])){
                case 'pdo': $dao_class = 'PDODB';break;
                case 'mysql' : $dao_class = 'MySQLDB';
            }
            
            $this->dao = $dao_class::getInstance($config);
            
        }
}