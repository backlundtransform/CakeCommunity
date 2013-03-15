<?php
App::uses('AppModel', 'Model');
/**
 * Comment Model
 *
 * @property User $User
 * @property Post $Post
 */
class Comment extends AppModel {
var $createField = 'added'; 
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'post_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

	public function user_id()
	{
		return $this->$belongsTo['User']['foreignKey'];
	}
	
	public function post_id()
	{
		return $this->$belongsTo['Post']['foreignKey'];
	}
	
	public function isOwnedBy($comment, $user) {
  	  return $this->field('id', array('id' => $comment, 'user_id' => $user) === $comment);
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
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
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
