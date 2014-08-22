<?php
App::uses('AppModel', 'Model');
/**
 * Merchant Model
 *
 * @property Offer $Offer
 * @property Store $Store
 */
class Merchant extends AppModel {

	public $actsAs = array('Containable');
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Store' => array(
			'className' => 'Store',
			'foreignKey' => 'merchant_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Contact'
	);
	
/*
	# Convert bonus cash integer to percentage
	# 25 = 2.5%
	# 250 = 25%
	public function beforeSave($options = array()) {
	    if (!empty($this->data['Merchant']['begindate'])) {
			
	    }
	    return true;
	}
*/
	
	public $validate = array(
		'business_name' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'abn' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'trading_name' => array(
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
		'business_type' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'business_category' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'commencement_date' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			),
			'date' => array(
				'rule'     => array('date', 'ymd'),
				'message'  => "Must be in 'YYYY-MM-DD' format"
			)
		),
		'bonus_cash_amount' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'account_name' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'bsb' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'account_number' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'ddr_t_and_c' => array(
			'notEmpty' => array(
				'rule'	   => array('comparison', '!=', 0),
				'message'  => 'Required'
			)
		),
		'bonuscash_t_and_c' => array(
			'notEmpty' => array(
				'rule'	   => array('comparison', '!=', 0),
				'message'  => 'Required'
			)
		)
	);
}
