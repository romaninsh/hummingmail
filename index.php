<?php
include 'atk4/loader.php';

class ApiMailSql extends ApiFrontend {
	public $auth;
	public $logger;
	
    public $apinfo=array(
            'version'=>'0.96',
            'name'=>'MailSql Admin'
            );
	
	function init(){
		parent::init();
        $this->add('jUI');
		$this->dbConnect();

        $this->add('GmailImporter');
		//$this->api->add('VersionControl');
		$this->template->trySet('page_title', $this->apinfo['name']);
		$this->auth = $this->api->add('BasicAuth');
        $this->auth->setModel('User','email','clear');
             #->setNoCrypt();
            
	}
	function page_Index(){
            $this->redirect('users');
	}
	function page_Logout(){
		$this->auth->logout();
	}
	function page_PostfixConfiguration($p){
		$p->add('NotImplemented', null, 'Content');
	}
	function getUserLevel(){
        return $this->api->auth->get('access_level');
	}
}

$api = new Frontend('MailSQL');
//$api->info('test');
$api->main();
