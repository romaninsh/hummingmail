<?php
class Model_Humming_User extends Model_Table {
    public $table='user';
    function init(){
        parent::init();
        $this->addField('name')->sortable(true);
        $this->addField('email')->sortable(true);
        $this->addField('clear')->type('password');
        $this->addField('domain');
	$this->getElement('id')->sortable(true);

        //$this->addExpression('domain')->set('substring_index(email,"@",-1)');

        //$this->addField('postfix')->type('boolean')->enum(array('y','n'));
        //$this->addCondition('postfix',true);

        $this->addField('cc_to')->caption('CC incoming email');
        $this->addField('forward')->caption('redirect email')->type('boolean');
        $this->addField('forward_to')->caption('redirect to')->type('text')->sortable(true);
	$this->addField('enabled')->type('boolean')->defaultValue(1);

/*
        $this->addField('access_level')->caption('Access Level')
            ->setValueList(array(
                '0'=>'User',
                '1'=>'No Login',
                '9'=>'Domain Admin',
                '99'=>'Super Admin'
            ));
	    */
        //$this->addField('domains')->caption('Administrating Domains');
        //
        $this->addHook('beforeSave',$this);

    }
    function beforeSave(){
        list($e,$this['domain'])=explode('@',$this['email']);
    }
}
