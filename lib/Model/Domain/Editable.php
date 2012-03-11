<?php
class Model_Domain_Editable extends Model_Domain {
    function init(){
        parent::init();

        $this->addExpression('users')->set('count(*)');
    }
}
