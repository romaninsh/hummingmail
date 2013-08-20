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
		$this->readConfig('config.php');
		parent::init();
        $this->add('jUI');
		$this->dbConnect();
		//$this->api->add('VersionControl');
		$this->template->trySet('page_title', $this->apinfo['name']);
	//	$this->auth = $this->api->add('BasicAuth');
        //$this->auth->setModel('User','email','clear');
             #->setNoCrypt();
            
        //$this->auth->check();
        $menu = $this->add('Menu', null, 'Menu');
        $menu
            ->addMenuItem('UserManagement','User Management')
            //->addMenuItem('domains','Domains')
            //->addMenuItem('Postfix Configuration')
            ->addMenuItem('About')
            ->addMenuItem('Logout')
            ;
	}
	function page_Index(){
            $this->redirect('UserManagement');
	}
	function page_Logout(){
		$this->auth->logout();
	}
    function page_UserManagement($p){
    		if($this->getUserLevel() > 0){
                $userlist = $this->add('CRUD',array('grid_class'=>'UserList'));
                $userlist->setModel('User_Editable',null,array('id','email','name','forward','forward_to','access_level','enabled'))->setOrder('email');
    		}else{
                $f=$this->add('Form');
                $f->addSubmit('Update');
                $f->setModel('User_Editable')->loadAny();
                if($f->isSubmitted()){
                    $f->update();
                    $f->js()->univ()->successMessage('Your settings have been updated')->execute();
                }
    		}
    }
	function page_PostfixConfiguration($p){
		$p->add('NotImplemented', null, 'Content');
	}
	function getUserLevel(){
	return 99;
        //return $this->api->auth->get('access_level');
	}
}

$api = new ApiMailSql('MailSQL');
//$api->info('test');
$api->main();
