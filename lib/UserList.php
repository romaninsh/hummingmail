<?php
class UserList extends Grid {
	function init(){
		parent::init();
        $p=$this->add('Paginator',null,'paginator');
        $f=$this->addQuickSearch(array('name','email'));
        if($this->api->getUserLevel() > 9){
            $f=$f->addField('dropdown','domain','');
            $f->owner->search_field->template->trySet('row_class','span6');
            $f->owner->add('Order')->move($f,'first')->later();
            $f->setModel('Domain');
            $f->template->trySet('row_class','span6');
        }
		//if($this->api->getUserLevel() < 99)$this->setDomains();
	}
	function format_access($field){
		switch($this->current_row[$field]){
			case "0": 
				return $this->current_row[$field] = "User";
			case "1": 
				return $this->current_row[$field] = "No Login";
		
			case "9": 
				return $this->current_row[$field] = "Domain Admin";
			
			case "99": 
				return $this->current_row[$field] = "Super Admin";
			
			default:
				return $this->current_row[$field] = "Who is there? Get out!!!";
		}
	}
	function setDomains(){
		$domains = split(';', $this->api->getUserDomains());
		$where = "";
		foreach($domains as $domain){
			if($where != "")$where .= ' or ';
			$where .= "email like '%$domain%'";
		}
		$this->dq->where($where);
	}
}

