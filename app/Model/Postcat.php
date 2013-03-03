<?php
App::uses('AppModel', 'Model');
/**
 * Postcat Model
 *
 * @property post $post
 */
 

class Postcat extends AppModel {
       public $actsAs = array('Tree');
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'postcat';

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
		'Post' => array(
			'className' => 'Post',
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
