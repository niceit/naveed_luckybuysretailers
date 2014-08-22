<?php
	$states = array(
		'ACT' => 'ACT',
		'NSW' => 'NSW',
		'NT' => 'NT',
		'QLD' => 'QLD',
		'SA' => 'SA',
		'TAS' => 'TAS',
		'VIC' => 'VIC'
	);
?>
<div id="store_form<?=$store_number;?>" class="row store_form">
	
	<div  class="col-sm-12">
	<h5><strong>Store <?=$store_number;?></strong></h5>
		<div class="col-sm-12"><?=$this->Form->input('Store.' . $store_number . '.name', array('label' => 'Store Name', /* 'default' => $store_number, */ 'div' => 'form-group', 'class' => 'form-control'));?></div>
		<div class="col-sm-12"><?=$this->Form->input('Store.' . $store_number . '.address', array('label' => 'Address', 'div' => 'form-group', 'class' => 'form-control'));?></div>
		<div class="col-sm-12 col-md-4"><?=$this->Form->input('Store.' . $store_number . '.suburb', array('div' => 'form-group', 'class' => 'form-control'));?></div>
		<div class="col-sm-12 col-md-4"><?=$this->Form->input('Store.' . $store_number . '.state', array('options' => $states, 'empty' => '--Select--', 'div' => 'form-group', 'class' => 'form-control'));?></div>
		<div class="col-sm-12 col-md-4"><?=$this->Form->input('Store.' . $store_number . '.postcode', array('type' => 'text', 'div' => 'form-group', 'class' => 'form-control'));?></div>
		<h5>EFTPOS Merchant and Terminal Information</h5>
		<div class="col-sm-12 col-md-4"><?=$this->Form->input('Store.' . $store_number . '.eftpos_supplier', array('div' => 'form-group', 'class' => 'form-control'/* , 'default' => 'Store.' . $store_number . '.eftpos_supplier' */));?></div>
	</div>
	<?php 
		foreach($store['BankMerchant'] as $bank_merchant_number => $bank_merchant):			
			if(empty($bank_merchant['Terminal'])) { 
				$terminal_count = 1; 
			} else {
				$terminal_count = count($bank_merchant['Terminal']);
			}
	?>
		<?=$this->element('merchants/bank_merchant', 
			array(
				'store_number' => $store_number,
				'bank_merchant_number' => $bank_merchant_number,
				'terminal_count' => $terminal_count,
		));?>
	<?php endforeach;?>

	<div class="col-sm-12">
		<div class="col-sm-6 col-md-9 text-right" style="padding-top: 0.5em;">
			<p>If you have more than one Merchant ID for this store, click the "Add more Merchant IDs" button</p>
		</div>			
		<div class="col-sm-6 col-md-3">
			<?=$this->Form->submit(
				'Add More Merchant IDs', 
				array(
					'id' => 'add_merchant_to_store_' . $store_number, 
					'class' => 'add_merchant_to_store btn btn-branded pull-right form-control'
				));?>
		</div>
	</div>

</div>