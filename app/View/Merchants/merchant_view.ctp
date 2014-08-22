<style>
	.box {
		border: 1px solid #e7e7e7;
		padding: 1em;
	}
</style>
<div class="banner-wrapper">
	<br>
</div>
<div class="container marketing">
	<h2>Merchant Info</h2>
	<a href="/merchants/merchant_index">Return to index</a>
	<p>To get Bonus Cash amount, divide by 10. eg: 25 = 2.5%</p>
	<table class="table">
	<?php 	foreach($merchant['Merchant'] as $field => $value) : ?>
				<tr><td><?=$field;?></td><th><?=$value;?></th></tr>			
	<?php	endforeach; ?>
	</table>
	
	<h2>Contacts</h2>
	<?php 	foreach($merchant['Contact'] as $contact) : ?>
	<table class="table">
	<?php		foreach($contact as $field => $value) : ?>
				<tr><td><?=$field;?></td><th><?=$value;?></th></tr>			
	<?php		endforeach; ?>
	</table>
	<?php	endforeach; ?>
	
	
	
	<h2>Stores</h2>
	<div class="box">
	<?php 	foreach($merchant['Store'] as $store) : ?>
		<h4><?=$store['name'];?></h4>
		<div class="box">
			<table class="table">			
				<?=$this->Html->tableHeaders(
					array(
						'name',
						'address',
						'suburb',
						'state',
						'postcode',
						'eftpos_supplier',
					)
				);?>

				<?=$this->Html->tableCells(
					array(
						$store['name'],
						$store['address'],
						$store['suburb'],
						$store['state'],
						$store['postcode'],
						$store['eftpos_supplier'],
					)
				);?>
			</table>
			<h5>Merchant Facilities</h5>
			<?php foreach($store['BankMerchant'] as $bank_merchant) : ?>
			<div class="box">
				<strong>EFTPOS Merchant</strong>
				<table class="table">			
<!--
					<?=$this->Html->tableHeaders(
						array(
							'eftpos_merchant_id',
						)
					);?>
-->
	
					<?=$this->Html->tableCells(
						array(
							$bank_merchant['eftpos_merchant_id'],
						)
					);?>
				</table>
				<div class="box">
					<strong>Terminals</strong>
					<table class="table">
					<?=$this->Html->tableHeaders(
						array(
							'eftpos_terminal_id',
						)
					);?>

					<?php foreach($bank_merchant['Terminal'] as $terminal) : ?>	
					<?=$this->Html->tableCells(
						array(
							$terminal['eftpos_terminal_id'],
						)
					);?>
					<?php endforeach; ?>				
					</table>
				</div>
			</div>
			<?php	endforeach; ?>
	</div>
<?php	endforeach; ?>
	
	<?php
/* 		debug($merchant); */
/* 		debug($stores); */
?>
</div>