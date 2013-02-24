<?php
App::uses('AppModel', 'Model');
/**
 *	Message Model
 *
 * @property User $User
 
 */
class Message extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'post_id';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

	
	
	
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'sender_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		
		));
		

}