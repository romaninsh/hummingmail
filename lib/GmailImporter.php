<?php
class GmailImporter extends AbstractController {
    function init(){
        parent::init();

        $this->api->addHook('usertabs',$this);
        $this->api->addMethod('page_gmailimporter',array($this,'page_gmailimporter'));
    }
    function usertabs($a,$tabs,$page){
        $tabs->addTabURL('gmailimporter','Import from GMail');
    }
    function page_gmailimporter($a,$p){
        $p->add('View_Info')->set('You can import messages from yoru GMail account by simply specifying your gmail username and password below');
        $f=$p->add('Form');

        $f->setModel('GMail_Importer')->tryLoadBy('user_id','');
    }

}
