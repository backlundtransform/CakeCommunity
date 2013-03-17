<?php
App::uses('AppModel', 'Model');
/**

 */
class Thread extends AppModel {
  
 


/**
 * Display field
 *
 * @var string
 */     



public function isOwnedBy($thread, $user) {
 return $this->field('id', array('id'=> $thread, 'user_id' => $user)) === $thread;
}
	public $displayField = 'title';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

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
		'Forumcat' => array(
			'className' => 'Forumcat',
			'foreignKey' => 'cat',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Threadanswer' => array(
			'className' => 'Threadanswer',
			'foreignKey' => 'thread_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
