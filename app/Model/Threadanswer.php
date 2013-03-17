<?php
App::uses('AppModel', 'Model');
/**

 */
class Threadanswer extends AppModel {
var $createField = 'added'; 
/**
 * Display field
 *
 * @var string
 */         
	public $displayField = 'thread_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public function user_id()
	{
		return $this->$belongsTo['User']['foreignKey'];
	}
	
	public function thread_id()
	{
		return $this->$belongsTo['Thread']['foreignKey'];
	}
	
	public function isOwnedBy($threadanswer, $user) {
  	  return $this->field('id', array('id' => $threadanswer, 'user_id' => $user) === $threadanswer);
	}

	
	
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Thread' => array(
			'className' => 'Thread',
			'foreignKey' => 'thread_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function beforeSave($options = array()) {
		
		
	 
		    $nowDate = date('Y-m-d H:i:s');
                if ($this->updateField) {
                        $this->set($this->updateField, $nowDate);
                }
                if ($this->createField and !$this->exists()) {
                        $this->set($this->createField, $nowDate);
                }

               
	    return true;
	}
}   
