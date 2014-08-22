<?php
App::uses('AppModel', 'Model');
/**
 * Merchant Model
 *
 * @property Offer $Offer
 * @property Store $Store
 */
class BankMerchant extends AppModel {

	public $actsAs = array('Containable');
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $belongsTo = array('Store');
	public $hasMany = array('Terminal');

	public $validate = array(
		'eftpos_merchant_id' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
	);
}
