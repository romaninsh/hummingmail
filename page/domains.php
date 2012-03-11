<?php
class page_domains extends Page {
    function init(){
        parent::init();

        $this->add('H1')->set('Domain Administration');
        $cr=$this->add('Domain_CRUD');
        $cr->setModel('Domain_Editable');
        if($crf=$cr->form){
            $crf->setFormClass('stacked atk-row');
            $crf->add('Order')->move($crf->addSeparator('span7 noborder'),'first')->now();
            $crf->addSeparator('span4 noborder');

            $crf->add('H3')->set('Domain Admins');
            $do=$crf->add('Grid_Advanced');
            $do->setModel('User_Admin',array('email','name'));

            $crf->add('H3')->set('Super Admins');
            $do=$crf->add('Grid');
            $do->setModel('User_SuperAdmin',array('email','name'));

        }
    }
}

class Domain_CRUD extends CRUD {
    function formSubmit(){
        if($this->model->loaded()){
            // we know 
        }
    }
}
