<?php
class Model_User_SuperAdmin extends Model_User {
    function init(){
        parent::init();
        $this->addCondition('access_level',99);
    }
}
