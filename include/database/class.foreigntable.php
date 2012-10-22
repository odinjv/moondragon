<?php

class ForeignTable extends BasicTable
{
	protected $field;
	
	protected $key;
		
	public function __construct($table, $field, $key) {
		$this->table = $table;
		$this->field = $field;
		$this->key = $key;
	}
	
	public function getField() {
		return $this->field;
	}
	
	public function getKey() {
		return $this->key;
	}
	
	public function isJoined() {
		assert('is_array($this->fields)');
		if(empty($this->fields)) {
			return false;
		}
		else {
			return true;
		}
	}
	
	public function getJoinFields($fields) {
		assert('is_array($this->fields)');
		if(!empty($this->fields)) {
			if(is_array($fields)) {
				foreach($this->fields as $alias => $field) {
					if(is_string($alias)) {
						$this->addAlias($field, $alias);
					}
					elseif(in_array($field, $fields)) {
						$this->addAlias($field, $this->table.'_'.$field);
					}
				}
			}			
			return $this->getFields();
		}
		else {
			return '';
		}
	}
}
