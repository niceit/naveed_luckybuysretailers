<?php
App::uses('AppModel', 'Model');
/**
 * Merchant Model
 *
 * @property Offer $Offer
 * @property Store $Store
 */
class Store extends AppModel {

	public $actsAs = array('Containable');
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $belongsTo = array('Merchant');
	public $hasMany = array('BankMerchant');

	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'address' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'suburb' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'state' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'postcode' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'eftpos_supplier' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		)
	);
}
