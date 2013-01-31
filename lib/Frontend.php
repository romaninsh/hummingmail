<?php
class Frontend extends ApiFrontend
{
    public $apinfo=array(
            'version'=>'0.97',
            'name'=>'Humming Mail'
            );

    function init()
    {
        parent::init();

        $this->add('jUI');
        $this->dbConnect();

        $this->add('Auth')->setModel('User','email','clear');

        $this->auth->check();
        $menu = $this->add('Menu', null, 'Menu');
        $menu
            ->addMenuItem('users','User Management')
            ->addMenuItem('domains','Domains')
            //->addMenuItem('Postfix Configuration')
            ->addMenuItem('About')
            ->addMenuItem('Logout')
            ;
    }
    function getAccessLevel()
    {
        return 'admin';
    }
}
