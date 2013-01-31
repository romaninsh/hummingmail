<?php
class Model_User_Editable extends Model_User {
    function init(){
        parent::init();
        if($this->api->auth){
            $al=$this->api->auth->get('access_level');

            if($al==0){
                $this->addCondition('email',$this->api->auth->get('email'));
                $this->getField('email')->readonly(true);
                $this->getField('access_level')->destroy();
            }
            elseif($al==9){
                $d=explode('@',$this->api->auth->get('email'));
                $this->addCondition('domain',$d[1]);
            }elseif($al!=99){
                throw $this->exception('Unknown user level')
                    ->addMoreInfo('users level',$al);
            }
        }
    }
}
