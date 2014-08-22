<?php
App::uses('AppModel', 'Model');
/**
 * Merchant Model
 *
 * @property Offer $Offer
 * @property Store $Store
 */
class Terminal extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $belongsTo = array('BankMerchant');

	public $validate = array(
		'eftpos_terminal_id' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
	);
}
