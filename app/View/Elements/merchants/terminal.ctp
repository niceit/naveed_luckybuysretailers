<?php $fieldname = 'Store.' . $store_number . '.BankMerchant.' . $bank_merchant_number . '.Terminal.' . $terminal_number . '.eftpos_terminal_id'; ?>
<?php 
	if($terminal_number > 1) {
		$offset = 'col-sm-offset-6';
		$label = '';
		$div = '';
	} else {
		$offset = '';
		$label = 'EFTPOS Terminal ID Number';
		$div = 'form-group';
	}
	
?>

<div class="col-sm-6 <?=$offset;?> terminal_input_div">
	<?=$this->Form->input(
		$fieldname, 
		array(
			'type' => 'text',
			'label' => $label, 
/* 			'default' => $fieldname,  */
			'store_number' => $store_number, 
			'bank_merchant_number' => $bank_merchant_number, 
			'terminal_number' => $terminal_number,
			'div' => $div, 
			'class' => 'form-control terminal_input'
	));?>
</div>
