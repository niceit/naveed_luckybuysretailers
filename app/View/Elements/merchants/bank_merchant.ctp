<div bank_merchant="<?=$bank_merchant_number;?>" class="bank_merchant_form col-sm-12">
<?php
	$field_name = 'Store.' . $store_number . '.BankMerchant.' . $bank_merchant_number . '.eftpos_merchant_id';
?>
	<?=$this->Form->input($field_name, array('type' => 'text', 'label' => 'EFTPOS Merchant ID Number', /* 'default' => $field_name, */ 'div' => 'form-group col-md-6', 'class' => 'form-control'));?>

<?php	
	for($terminal_number = 1; $terminal_number <= $terminal_count; $terminal_number++) {
		echo $this->element('merchants/terminal', 
			array(
				'store_number' => $store_number,
				'bank_merchant_number' => $bank_merchant_number,
				'terminal_number' => $terminal_number,
		));
	}
?>
	<div class="col-sm-6 col-md-9 text-right" style="padding-top: 1.5em;">
		<p>If you have more than one Terminal ID for this Merchant ID, click the "Add more Terminal IDs" button</p>
	</div>			
	<div class="col-sm-6 col-md-3"  style="padding: 1em;">
		<?=$this->Form->submit(
			'Add More Terminal IDs', 
			array(
				'store_number' => $store_number, 
				'bank_merchant_number' => $bank_merchant_number, 
				'terminal_number' => $terminal_number, 
				'class' => 'add_terminal_to_merchant btn btn-branded pull-right form-control'
		));?>
	</div>
</div>