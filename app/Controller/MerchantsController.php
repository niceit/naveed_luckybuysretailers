<?php
App::uses('AppController', 'Controller');
/**
 * Merchants Controller
 *
 * @property Merchant $Merchant
 * @property PaginatorComponent $Paginator
 */
class MerchantsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Payment');

	private function add_merchant($post, $payment_unique_id) {
		$details = array(
			'payment_unique_id' => $payment_unique_id,
			'first_name' => $post['Contact']['1']['first_name'],
			'last_name' => $post['Contact']['1']['last_name'],
			'bsb' => $post['Merchant']['bsb'],
			'account_number' => $post['Merchant']['account_number'],
			'account_name' => $post['Merchant']['account_name'],
		);

		return $this->Payment->addMerchant($details);
	}

	private function get_business_categories($business_type) {
		switch($business_type) {
			case 'Fashion & Footwear':
				$business_categories = array(
					'Womens Fashion' => 'Womens Fashion',
					'Mens Fashion' => 'Mens Fashion',
					'Kids Fashion' => 'Kids Fashion',
					'Accessories' => 'Accessories',
					'Watches & Jewellery' => 'Watches & Jewellery',
					'Footwear' => 'Footwear',
				);
				break;
			case 'Health & Beauty':
				$business_categories = array(
					'Skin and Hair Care' => 'Skin and Hair Care',
					'Cosmetics' => 'Cosmetics',
					'Chemists' => 'Chemists',
					'Eyewear & Optical' => 'Eyewear & Optical',
					'Nutrition' => 'Nutrition',
					'Fitness' => 'Fitness',
				);
				break;
			case 'Recreation & Lifestyle':
				$business_categories = array(
					'Sports and Fitness' => 'Sports and Fitness',
					'Pets' => 'Pets',
					'Gifts' => 'Gifts',
					'Gadgets' => 'Gadgets',
					'Flowers' => 'Flowers',
					'Bikes' => 'Bikes',
					'Automotive' => 'Automotive',
					'Camping & Outdoors' => 'Camping & Outdoors',
				);
				break;
			case 'Food & Entertainment':
				$business_categories = array(
					'Movies' => 'Movies',
					'Café & Fast Food' => 'Café & Fast Food',
					'Restaurants' => 'Restaurants',
					'Books & Magazines' => 'Books & Magazines',
					'Grocery' => 'Grocery',
					'Liquor' => 'Liquor',
				);
				break;
			case 'Travel & Tourism':
				$business_categories = array(
					'Accommodation' => 'Accommodation',
					'Holidays' => 'Holidays',
					'Travel Insurance' => 'Travel Insurance',
					'Attractions & Experiences' => 'Attractions & Experiences',
					'Flights' => 'Flights',
					'Car Hire' => 'Car Hire',
				);
				break;
			case 'Kids & Toys':
				$business_categories = array(
					'Kids Fashion ' => 'Kids Fashion ',
					'Babies Fashion' => 'Babies Fashion',
					'Kids Toys' => 'Kids Toys',
					'Baby Accessories' => 'Baby Accessories',
					'Kids Games' => 'Kids Games',
					'Kids Electronics' => 'Kids Electronics',
				);
				break;
			case 'Home & Garden':
				$business_categories = array(
					'Furniture' => 'Furniture',
					'Garden' => 'Garden',
					'Homewares' => 'Homewares',
					'Electrical' => 'Electrical',
					'Dept Stores' => 'Dept Stores',
					'DIY & Tools' => 'DIY & Tools',
					'Trades' => 'Trades',
					'Appliances' => 'Appliances',
				);
				break;
			case 'Home Office':
				$business_categories = array(
					'Telecommunications' => 'Telecommunications',
					'Finance and Insurance' => 'Finance and Insurance',
					'Adult Learning' => 'Adult Learning',
					'Office Equipment' => 'Office Equipment',
					'Gadgets' => 'Gadgets',
					'Services' => 'Services',
				);
				break;
			case 'Other':
				$business_categories = null;
				break;
			default:
				$business_categories = array(
					'no' => 'result'
				);
		}
		return $business_categories;
	}

	# Ajax method
	function business_categories() {
		$business_type = $this->request->query['business_type'];
		$this->layout = 'ajax';

		$business_categories = $this->get_business_categories($business_type);

		$this->set('business_categories', $business_categories);
	}

	private function business_types() {
		$business_types = array(
			'Fashion & Footwear' => 'Fashion & Footwear',
			'Health & Beauty' => 'Health & Beauty',
			'Recreation & Lifestyle' => 'Recreation & Lifestyle',
			'Food & Entertainment' => 'Food & Entertainment',
			'Travel & Tourism' => 'Travel & Tourism',
			'Kids & Toys' => 'Kids & Toys',
			'Home & Garden' => 'Home & Garden',
			'Home Office' => 'Home Office',
			'Other' => 'Other',
		);

		return $business_types;
	}

	# Ajax method
	public function new_bank_merchant() {
		$bank_merchant_number = $this->request->query['bank_merchant_number'];
		$store_number = $this->request->query['store_number'];
		$terminal_count = 1;

		$this->layout = 'ajax';
		$this->set(compact('bank_merchant_number', 'store_number', 'terminal_count'));
	}

	# Ajax method
	public function new_terminal() {
		$bank_merchant_number = $this->request->query['bank_merchant_number'];
		$store_number = $this->request->query['store_number'];
		$terminal_number = $this->request->query['terminal_number'];

		$this->layout = 'ajax';
		$this->set(compact('bank_merchant_number', 'store_number', 'terminal_number'));
	}

	# Ajax method
	public function new_store($store_number) {
		$store = array(
			'BankMerchant' => array(
				1 => array(
					'id' => '',
					'Terminal' => array(
						1 => array(
							'id' => ''
						)
					)
				)
			)
		);

		$this->set('store', $store);
		$this->layout = 'ajax';
		$this->set('store_number', $store_number);
	}
/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->redirect('/');
	}

	private function bonus_cash() {
		$bonus_cash = array();
		for($i = 2.5; $i <= 30; $i += 2.5) {
			$key = $i * 10;
			$bonus_cash[$key] = number_format($i, 1) . '%';
		}

		return $bonus_cash;
	}

	function sign_up() {
		$business_categories_empty_text = '(Select Business Type)';
		$business_categories_type = 'select';
		$business_types = $this->business_types();
		$states = array(
			'ACT' => 'ACT',
			'NSW' => 'NSW',
			'NT' => 'NT',
			'QLD' => 'QLD',
			'SA' => 'SA',
			'TAS' => 'TAS',
			'VIC' => 'VIC'
		);
		$this->set('states', $states);
/*

		# Dummy data
		$this->loadModel('Fakename');
		$form_filler = $this->Fakename->find(
			'first',
			array(
				'conditions' => array(
					'id' => rand(1,3000)
		)));
*/

		$store_count = 1;
		if($this->request->data) {
			$payment_unique_id = String::uuid();

			$post_data_to_log = $this->request->data;
			$post_data_to_log['Merchant']['bsb'] = '******';
			$post_data_to_log['Merchant']['account_number'] = '**********';
			$post_data_to_log['Merchant']['payment_unique_id'] = $payment_unique_id;
			$this->log($post_data_to_log, 'sign_up_submit');

			# Handle business category field on subsequent loads
			if($this->request->data['Merchant']['business_type']) {
				$business_categories = $this->get_business_categories($this->request->data['Merchant']['business_type']);
				if($business_categories) {
					$business_categories_empty_text = '--Select--';
				} else {
					$business_categories_type = 'text';
				}
			}
			$data = $this->request->data;
			# Validate merchant
			if(!$this->Merchant->validateAssociated($data)) {
				$this->Session->setFlash('Some fields are missing or invalid', 'flash/bad');
			} else {
				$stores = $this->request->data['Store'];
				# Try and validate store data (pretty sure this will never fail)
				if($this->Merchant->Store->validateAssociated($stores)) {
					$data = $this->request->data;

					$data['Merchant']['payment_unique_id'] = $payment_unique_id;
                    $data['Merchant']['report_status'] = 0;
					if($saved = $this->Merchant->save($data)) {
						if(!$this->add_merchant($data, $payment_unique_id)) {
							$this->log($post_data_to_log, 'failed_to_create_payer');
						} else {
							debug('success');
						}

						$merchant_id = $saved['Merchant']['id'];

						$contact['Contact'] = $data['Contact'];
						$contact['Contact']['merchant_id'] = $merchant_id;
						$this->Merchant->Contact->save($contact);


						$stores = $this->request->data['Store'];

						foreach($stores as $store) {
							$store['merchant_id'] = $merchant_id;
							debug($store);
							$store_to_save = $store;
							$this->Merchant->Store->create($store);
							$saved = $this->Merchant->Store->save($store);
							$store_id = $saved['Store']['id'];
							foreach($store['BankMerchant'] as $bank_merchant) {
								$bank_merchant['store_id'] = $store_id;
/* 								debug($bank_merchant); */
								$terminals = $bank_merchant['Terminal'];
								$this->Merchant->Store->BankMerchant->create();
								$saved_bank_merchant = $this->Merchant->Store->BankMerchant->save($bank_merchant);
								$bank_merchant_id = $saved_bank_merchant['BankMerchant']['id'];
								foreach($terminals as $terminal) {
									$terminal['bank_merchant_id'] = $bank_merchant_id;
									$this->Merchant->Store->BankMerchant->Terminal->create();
									$this->Merchant->Store->BankMerchant->Terminal->save($terminal);
								}
							}
						}
						$this->redirect('/thanks');
					} else {
/* 						debug('!$this->Merchant->saveAssociated($data)'); */
					}
				} else {
/*
					debug($stores);
					debug('!$this->Merchant->Store->validateAssociated($stores)');
*/
				}
			}
/*
			if($this->Merchant->validateMany($this->request->data, array())) {
//			array('validate' => 'only')

				$this->Session->setFlash('Validated!');
//				if($this->Merchant->Store->validateAssociated($this->request->data['Store'])) {
//					debug('$this->Merchant->Store->validateAssociated($this->request->data[Store])');
//				} else {
//					debug('validateAssociated failed');
//				}
			} else {
				$this->Session->setFlash('Failed!');
			}
*/

			$store_count = count($this->request->data['Store']);
			if($store_count <1) {
				$store_count = 1;
			}
			$stores = $this->request->data['Store'];
		} else {
			$stores = array(
				1 => array(
					'BankMerchant' => array(
						1 => array(
							'id' => '',
							'Terminal' => array(
								1 => array(
									'id' => ''
								)
							)
						)
					)
				)
			);
		}

/*
		$this->set('stores', $stores);
		$this->set('store_count', $store_count);
*/

		$bonus_cash = $this->bonus_cash();


/* 		$this->set('bonus_cash', $bonus_cash); */

/*
		# Dummy data
		if(empty($this->request->data)) {
			$bonus_cash_shuffled = $bonus_cash;
			shuffle($bonus_cash_shuffled);
			$bonus_cash_amount = array_pop($bonus_cash_shuffled);

			$this->request->data['Merchant'] = $form_filler['Fakename'];
			$this->request->data['Merchant']['bonus_cash_amount'] = $bonus_cash_amount;
			$this->request->data['Contact'][1] = $form_filler['Fakename'];
			$this->request->data['Store'][1] = $form_filler['Fakename'];

			$store_count = 1;
			$contact_count = 1;
		} else {
//			debug($this->request->data);
		}
*/

		$this->set(compact('states', 'stores', 'store_count', 'bonus_cash', 'business_types', 'business_categories', 'business_categories_type', 'business_categories_empty_text'));
	}

	private function merchant_index() {
		$this->set('merchants', $this->Merchant->find('all', array('contain' => false)));

	}

	private function merchant_view($merchant_id) {
		$merchant = $this->Merchant->find(
			'first',
			array(
				'conditions' => array('id' => $merchant_id),
				'contain' => array(
					'Contact',
					'Store.BankMerchant.Terminal'
				)
		));
		$this->set(compact('merchant'));
	}

    /*
     * This function for cron job
     * Will send new customers everyday to admin email
     * */
    public function newCustomers(){
        //Fetch new customers
        $customers = $this->Merchant->find('all', array(
            'conditions' => array(
                "DATE_FORMAT(Merchant.created, '%m/%d/%Y')"  => date("m/d/Y"),
                'OR'                => array('Merchant.report_status = 0', 'Merchant.report_status' => null)
            ),
            'recursive' => false
        ));

        $csvFile = $this->createCSVFile(date("m_d_Y"));

        $fileHandle = fopen($csvFile, 'w');
        $contentHeader = array("Merchant ID", "Bussiness name", "ABN", "Trading name",
                                "Address", "Suburb", "State", "Postcode", "Business type",
                                "Business category", "Commencement date", "Bonus Cash Amount",
                                "Account Name", "BSB", "Account number", "Date"
                                );
        $fileContent = array();
        $fileContent['header'] = implode(',', $contentHeader);
        if ($customers){
            foreach ($customers as $key => $customer){
                $fileContent[$key] = implode(',', array(
                    $customer['Merchant']['id'],
                    $customer['Merchant']['business_name'],
                    $customer['Merchant']['abn'],
                    $customer['Merchant']['trading_name'],
                    $customer['Merchant']['address'],
                    $customer['Merchant']['suburb'],
                    $customer['Merchant']['state'],
                    $customer['Merchant']['postcode'],
                    $customer['Merchant']['business_type'],
                    $customer['Merchant']['business_category'],
                    $customer['Merchant']['commencement_date'],
                    $customer['Merchant']['bonus_cash_amount'],
                    $customer['Merchant']['account_name'],
                    $customer['Merchant']['bsb'],
                    $customer['Merchant']['account_number'],
                    $customer['Merchant']['created']
                ));

                //Set report flag is true
                $customer['Merchant']['report_status'] = 1;
                $this->Merchant->id = $customer['Merchant']['id'];
                $this->Merchant->save($customer);
            }
        }
        $fileContent = implode("\n", $fileContent);

        fwrite($fileHandle, $fileContent, strlen($fileContent));

        fclose($fileHandle);

        //Init email will send to admin
        App::uses("CakeEmail", "Network/Email");
        $mail = new CakeEmail('customer_report');
        $mail->from(array('support@luckycashretailers.com.au'))
                ->attachments(array($csvFile))
                ->emailFormat('html')
                ->to(array('na@cashrg.com.au', 'divand553@gmail.com'))
                ->subject('Daily new customers report');
        $mail->send();


        $this->autoRender = false;
    }

    private function createCSVFile($date){
        $csvDir = WWW_ROOT . 'files/new_customers/';
        $baseCsvFileName = $date . '_customers';
        $csvFileExt = '.csv'; //For csv format file

        $csvFileName = $baseCsvFileName;

        $i = 1;
        do{
            $csvFileName = $baseCsvFileName . "_" . $i++;
        }
        while(file_exists($csvDir . $csvFileName . $csvFileExt));

        return $csvDir . $csvFileName . $csvFileExt;
    }
}
