<?php
App::uses('Component', 'Controller');
//First Load the Utility Class
App::uses('Xml', 'Utility');
class IntegrapayComponent extends Component {
    public $status;
    public $success;
    public $error;
    
	# Live
	public $url = 'https://api.integrapay.com.au/basic/PayLinkService.svc?WSDL';
	public $credentials = array(
		'username' => 2272,
		'password' => 'sM%4D$3i2Tq',
	);

/*
	# Test
//	public $url = 'https://apitest.integrapay.com.au/PayLinkService.svc?WSDL';
	public $url = 'https://apitest.integrapay.com.au/basic/PayLinkService.svc?WSDL';
	public $credentials = array(
		'username' => 1131,
		'password' => '6i?B}Tg7k*5',
	);
*/
    
    public function oneOffPayment($transaction_parameters) {
/* 		ImmediateCreditCardTransactionFullPayerInfo 
		username
		password
		transactionAmountInCents
		transactionID
		creditCardNumber
		creditCardExpiryDate
		creditCardCcv
		creditCardName
*/
		# Test account credentials
		$parameters = array(
			'username' => 1131,
			'password' => '6i?B}Tg7k*5',
		);

		# Live account credentials
		$parameters = array(
			'username' => 2272,
			'password' => 'sM%4D$3i2Tq',
		);

		$all_params = array_merge($transaction_parameters, $parameters);

		# Test
/* 		$url	= 'https://apitest.integrapay.com.au/basic/PayLinkService.svc?WSDL';  */

		# Live
		$url	= 'https://api.integrapay.com.au/basic/PayLinkService.svc?WSDL';
		$client	= new SoapClient($url, array("trace" => 1, "exception" => 0));
		try {
			$soap_response = $client->ImmediateCreditCardTransactionFullPayerInfo($all_params);
			return $this->processResults($soap_response);
		} catch (Exception $e) {
			$this->log($e->faultstring, 'payment_errors');
/*			debug($e); */
		}
	}

	private function processResults($response) {
		$this->result_type($response->resultRejectionTypeID);

		$results = array(
			'success' => $this->success,
			'status' => $this->status,
			'error' => $this->error,
			'response_code' => $response->resultRejectionTypeID,
			'bank_receipt' => $response->resultBankReceiptID,
		);
		return $results;
	}

	private function resultID($result_id) {
		$status = false;
		$retry = false;

		switch($result_id) {
			case 'S':
				$status = true;
				$retry = false;
				break;
			case 'R':
				$status = false;
				$retry = true;
				break;
			case 'F':
				$status = false;
				$retry = false;
				break;
		}

		 return array(
		 	'status' => $status,
		 	'retry' => $retry
		 );
	}

	private function result_type($response_code) {
		$response_code = (int)$response_code;

		$success = false;
		$message = 'Undefined Error';

		switch($response_code) {
			 case 0:
				$success = true;
				$message = 'Successful transaction';
				break;
			case 1:
				$success = false;
				$message = 'Insufficient Funds';
				break;
			case 3:
				$success = false;
				$message = 'Invalid Credit Card';
				break;
			case 4:
				$success = false;
				$message = 'Expired Credit Card';
				break;
			case 5:
				$success = false;
				$message = 'Technical Failure';
				break;
			case 6:
				$success = false;
				$message = 'Transaction Declined';
				break;
			case 7:
				$success = false;
				$message = 'Authority Revoked By Payer';
				break;
			case 8:
				$success = false;
				$message = 'Payer Deceased';
				break;
		}

		$this->success = $success;
		$this->error = $message;

		return array(
			'success' => $success,
			'message' => $message
		);
	}

	function addMerchant($details) {
/*
		username		(string – max 32 chars)		required
		password		(string – max 32 chars)		required
		payerUniqueID	(string – max 100 chars)	required
		payerDisplayID	(string – max 100 chars)	optional
		payerLastName	(string – max 50 chars) [Required]
		payerFirstName (string – max 50 chars) [Optional]
		payerAddressLine1 (string – max 255 chars) [Optional]
		payerAddressLine2 (string – max 255 chars) [Optional]
		payerAddressSuburb (string – max 50 chars) [Optional]
		payerAddressState (string – max 50 chars) [Optional]
		payerAddressPostCode (string – max 50 chars) [Optional]
		payerAddressCountry (string – max 50 chars) [Optional]
		payerEmail (string – max 255 chars) [Optional]
		payerPhone (string – max 50 chars) [Optional]
		payerMobileNumber (string – max 50 chars) [Optional]
		paymentMethod (string – must be either “BANKACCOUNT” or “CREDITCARD”) [Required]
		useExistingPaymentDetails (boolean) [Required]
		bankAccountBsb (string – 6 digit number) [Required or Optional*]
		bankAccountNumber (string – 4 to 12 digit number) [Required or Optional*]
		bankAccountName (string) [Required or Optional*]
		creditCardNumber (string – must be >= 14 and <= 16 chars) [Required or Optional*]
*/
		$all_params = array(
			'username' => $this->credentials['username'],
			'password' => $this->credentials['password'],
			'transactionDebitAmountInCents' => 0,
			'sendRejectionNotificationSms' => false,
			'sendRejectionNotificationEmail' => false,
		);

		$transaction_parameters = array_merge($details, $all_params);

		$client	= new SoapClient($this->url, array("trace" => 1, "exception" => 0));
		try {
		 	$soap_response = $client->ScheduleTransactionWithAutoCreatePayer($transaction_parameters);

			debug($soap_response);
		} catch (Exception $e) {
/* 			debug($e); */
			$this->log($e->faultstring, 'payment_errors');
		}
	}

	function ScheduleTransactionWithAutoCreatePayer($transaction_parameters) {
		 $client	= new SoapClient($this->url, array("trace" => 1, "exception" => 0));
		try {
		 	$soap_response = $client->ScheduleTransactionWithAutoCreatePayer($transaction_parameters);
			return $soap_response;
		} catch (Exception $e) {
/* 			debug($e); */
			$this->log($e->faultstring, 'create_payer_errors');
			return false;
/*			debug($e); */
		}

	}
}

?>