<?php
class Model_Humming_User extends Model_Table {
    public $table='user';
    public $id_field='email';
    function init(){
        parent::init();
        $this->addField('name');
        $this->addField('clear')->type('password');
        $this->addField('domain');

        //$this->addExpression('domain')->set('substring_index(email,"@",-1)');

        $this->addField('enabled')->type('boolean')->defaultValue(true);

        $this->addField('cc_to')->caption('CC incoming email')->type('text');
        $this->addField('forward')->caption('redirect email')->type('boolean');
        $this->addField('forward_to')->caption('redirect to')->type('text');

        $this->addHook('beforeSave', $this);
    }
    function beforeSave()
    {
        list($e,$this['domain'])=explode('@',$this['email']);
    }
}
