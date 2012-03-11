<?php
class Model_User_Admin extends Model_User {
    function init(){
        parent::init();
        $this->addCondition('access_level',9);
    }
}
