<?php
App::uses('AppModel', 'Model');
/**
 * Merchant Model
 *
 * @property Offer $Offer
 * @property Store $Store
 */
class Contact extends AppModel {

	public $actsAs = array('Containable');
	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $belongsTo = array('Merchant');

	public $validate = array(
		'first_name' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'last_name' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'phone_business' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'phone_mobile' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'email' => array(
			'notEmpty' => array(
				'rule'	   => 'notEmpty',
				'message'  => 'Required'
			)
		),
		'email_confirm' => array(
			'email',
			'equaltofield' => array(
				'rule' => array('equaltofield','email'),
				'message' => '"Confirm email address" must match.',
				'on' => 'create',
			)
		),
	);
	
	# Validation method for email confitmation
	function equaltofield($check, $otherfield){
		$field_name = '';
		foreach ($check as $key => $value){
			$field_name = $key;
			break;
		}
		return $this->data[$this->name][$otherfield] === $this->data[$this->name][$field_name];
	}

}
