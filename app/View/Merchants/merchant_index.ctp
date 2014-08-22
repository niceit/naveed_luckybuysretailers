<div class="banner-wrapper">
	<br>
</div>
<div class="container marketing">
<h3>List of submitted merchants</h3>
<table class="table">
<?php 
	echo $this->Html->tableHeaders(
		array(
			'',
			'business_name',
			'business_type',
			'business_category',
			'bonus_cash_amount',
			'form submitted',
		)
	);
	foreach($merchants as $merchant) {
		$bonus_cash_amount = number_format($merchant['Merchant']['bonus_cash_amount'] / 10, 1);
		$merchant_row = array(
			$this->Html->link('View Mechant', '/merchants/merchant_view/'.$merchant['Merchant']['id']),
			$merchant['Merchant']['business_name'],
			$merchant['Merchant']['business_type'],
			$merchant['Merchant']['business_category'],
			sprintf('%s%%', $bonus_cash_amount),
			$merchant['Merchant']['created'],
		);
		echo $this->Html->tableCells($merchant_row);
	}

/* 	debug($merchants); */
?>
</table>
</div>