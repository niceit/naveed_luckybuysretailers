<?php
App::uses('Component', 'Controller');
class PaymentComponent extends Component {
	public $components = array('Integrapay');
	
	private function process_details($payment_details) {		
		$creditCardExpiryDate = '20' . $payment_details['card_expiry_year'] . $payment_details['card_expiry_month'];
		$transactionAmountInCents = (int)($payment_details['amount'] * 100);

		return array(
			'creditCardExpiryDate' 	=> $creditCardExpiryDate,
			'creditCardNumber' 		=> $payment_details['card_number'],
			'creditCardName'		=> $payment_details['card_name'],
			'creditCardCcv'			=> $payment_details['card_cvv'],
			'transactionAmountInCents' => $transactionAmountInCents
		);
	}
		
	function addMerchant($details) {	
		$transaction_parameters = array(
			'payerUniqueID' => $details['payment_unique_id'],
			'payerFirstName' => $details['first_name'],
			'payerLastName' => $details['last_name'],
			'paymentMethod' => 'BANKACCOUNT',
			'useExistingPaymentDetails' => false,
			'bankAccountBsb' => $details['bsb'],
			'bankAccountNumber' => $details['account_number'],
			'bankAccountName' => $details['account_name'],
/* 			'transactionID' => rand(1000,20000), */
			'transactionDebitAmountInCents' => 0,
			'sendRejectionNotificationSms' => false,
			'sendRejectionNotificationEmail' => false,

		);

		 return $this->Integrapay->addMerchant($transaction_parameters);
	}	
    public function oneOffPayment($payment_details) {
    	$transaction_parameters = $this->process_details($payment_details);
    	$transaction_parameters['transactionID'] = String::uuid();
   /*
 	$transaction_parameters = array(
    		'transactionAmountInCents' => 100,
        	'transactionID' => String::uuid(),
        	'creditCardNumber' => '5555555555554444',
        	'creditCardExpiryDate' => '201405',
        	'creditCardCcv' => '123',
        	'creditCardName' => 'Lester Le Tester',
    	);
*/
		$response = $this->Integrapay->oneOffPayment($transaction_parameters);
        return $this->mergeResponse($payment_details, $transaction_parameters, $response);
    }
    
    function mergeResponse($payment_details, $transaction_parameters, $response) {
		return array(
			'description' => $payment_details['description'],
			'status' => $response['success'],
			'error' => $response['error'],
/* 			'retry' => $response['retry'], */
			'response_code' => $response['response_code'],
			'amount' => $payment_details['amount'],
			'transaction_number' => $transaction_parameters['transactionID'],
			'bank_receipt' => $response['bank_receipt'],
 			'ip_address' =>  $_SERVER['REMOTE_ADDR']
		);
    }
}

?>