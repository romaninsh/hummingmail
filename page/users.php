<?php
class page_users extends Page {
    function init(){
        parent::init();
        $p=$this;
        $userlist = $this->add('CRUD');
        $userlist->setModel('User_Editable',null,array('email','name','forward','forward_to','access_level'));
        if($userlist->grid)$userlist->grid->addPaginator(25);

        /*
        if($_GET['details']){
            $userlist->js()->univ()->frameURL('User Details',$this->api->url('user',array('user_id'=>$_GET['details'])))->execute();
        }
         */

    }
}
