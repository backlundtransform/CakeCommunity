<?php
App::uses('AppModel', 'Model');
/**
 * Forumcat Model
 *
 * @property thread $thread
 */
 

class Forumcat extends AppModel {
       public $actsAs = array('Tree');
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'forumcats';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Thread' => array(
			'className' => 'Thread',
			'foreignKey' => 'cat',
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
