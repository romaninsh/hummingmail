<?php
class Model_Humming_Domain extends Model_Table {
    public $table='hmm_users';
    public $id_field='domain';
    function init(){
        parent::init();
        $this->getField('domain')->visible(true);
        //$this->addExpression('name')->set('substring_index(email,"@",-1)');
        //$this->addField('postfix');
        //$this->dsql->group($this->dsql->expr('substring_index(email,"@",-1)'));
        $this->dsql->where('postfix','y');

        //$this->dsql->option('distinct');
        $this->dsql->group('domain');
    }
}
