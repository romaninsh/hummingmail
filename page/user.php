<?php
class page_user extends Page {
    public $user_id;
    function init(){
        parent::init();

    }

    function page_index(){
        $tt=$this->add('Tabs');

        $t=$tt->addTab('Account');

        // Bind addition of additional tabs
        $this->api->hook('usertabs',array($tt,$this));
        $f=$t->add('Form');
        $f->addSubmit('Update');
        $f->setModel('User_Editable');//->load($this->user_id);

        $this->api->hook('userdetails',array($f,$this));

        if($f->isSubmitted()){
            $f->update();
            $this->closeFrame();
        }
    }
    function closeFrame(){
        $this->js()->univ()->successMessage('Your settings have been updated')->closeDialog()->getjQuery()->trigger('reload')->execute();
    }
}
