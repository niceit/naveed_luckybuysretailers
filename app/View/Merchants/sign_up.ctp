<?php 
		if(empty($business_categories)) {
			$business_categories = array();
		}
		
		echo $this->Html->script('jquery-ui-1.10.4.custom.min');
		echo $this->Html->css('custom-theme/jquery-ui-1.10.4.custom.min');

?>
<div class="container marketing">
	<div class="row">
		<div class="col-sm-12">
			<h3>Retailer Joining Form</h3>
			<?php echo $this->Form->create('Merchant', array('novalidate' => true)); ?>
				<h4>Enter The Details Of Your Business</h4>
				<div class="panel">		
					<div class="row">
						<div class="col-md-9"><?=$this->Form->input('business_name', array('label' => 'Registered Company Name of Your Business', 'div' => 'form-group', 'class' => 'form-control')); ?></div>
						<div class="col-md-3"><?=$this->Form->input('abn', array('label' => 'ABN', 'type' => 'text', 'div' => 'form-group', 'class' => 'form-control')); ?></div>
					</div>
					<div class="row">
						<div class="col-md-9 end"><?=$this->Form->input('trading_name', array('label' => 'Trading Name of Your Business', 'div' => 'form-group', 'class' => 'form-control')); ?></div>
					</div>
					<div class="row">
						<div class="col-md-12"><?=$this->Form->input('address', array('div' => 'form-group', 'class' => 'form-control')); ?></div>
					</div>
					<div class="row">
						<div class="col-md-4"><?=$this->Form->input('suburb', array('div' => 'form-group', 'class' => 'form-control')); ?></div>
						<div class="col-md-4"><?=$this->Form->input('state', array('options' => $states, 'empty' => '--Select--', 'div' => 'form-group', 'class' => 'form-control')); ?></div>
						<div class="col-md-4"><?=$this->Form->input('postcode', array('type' => 'text', 'div' => 'form-group', 'class' => 'form-control')); ?></div>
					</div>
					<div class="row">
						<div class="col-sm-12">&nbsp;</div>
						<div class="col-sm-12"><p>To ensure that our members can find you easily...</p></div>
						<div class="col-md-4"><?=$this->Form->input('business_type', array('options' => $business_types, 'empty' => '--Select--', 'label' => 'First, select your business type', 'div' => 'form-group', 'class' => 'form-control')); ?></div>
						<div class="col-md-4">
						<?php	if($business_categories_type == 'select') {
									echo $this->Form->input(
										'business_category', 
										array(
											'options' => $business_categories, 
											'empty' => $business_categories_empty_text,
											'label' => 'Second, describe your business category', 
											'div' => 'form-group', 
											'class' => 'form-control'
									));
								} else {
									echo $this->Form->input(
										'business_category',
										array(
											'type' => $business_categories_type,
											'label' => 'Second, describe your business category', 
											'div' => 'form-group', 
											'class' => 'form-control'											
										)
									);
								}
						?>
						</div>
					</div>
				</div>
				<br>
	
				<h4>The best person to contact in your business is</h4>
				<div class="panel">		
					<div class="row">
						<div class="col-md-6"><?=$this->Form->input('Contact.' . 1 . '.first_name', array('div' => 'form-group', 'class' => 'form-control'));?></div>
						<div class="col-md-6"><?=$this->Form->input('Contact.' . 1 . '.last_name', array('div' => 'form-group', 'class' => 'form-control'));?></div>
					</div>
					<div class="row">
						<div class="col-md-6"><?=$this->Form->input('Contact.' . 1 . '.phone_business', array('div' => 'form-group', 'class' => 'form-control'));?></div>
						<div class="col-md-6"><?=$this->Form->input('Contact.' . 1 . '.phone_mobile', array('div' => 'form-group', 'class' => 'form-control'));?></div>
					</div>
					<div class="row">
						<div class="col-md-6 end"><?=$this->Form->input('Contact.' . 1 . '.email', array('div' => 'form-group', 'class' => 'form-control'));?></div>
						<div class="col-md-6 end"><?=$this->Form->input('Contact.' . 1 . '.email_confirm', array('label' => 'Confirm email address', 'div' => 'form-group', 'class' => 'form-control'));?></div>
					</div>
				</div>
				<br>
	
				<h4>When do you want this agreement to start</h4>
				<div class="panel">		
					<div class="row">
						<div class="col-md-6 end">
							<?=$this->Form->input('commencement_date', array('type' => 'text', 'default' => date('Y-m-d'), 'div' => 'form-group', 'class' => 'form-control'));?>
						</div>
					</div>
				</div>
				<br>
				
				<h4>The term of this agreement is</h4>
				<div class="panel">		
					<div class="row">
						<div class="col-sm-12">
							<p>2 years subject to clause 2 of the Bonus Cash <a href="/terms.pdf" target="_blank">General Terms & Conditions</a></p>
						</div>
					</div>
				</div>
				<br>
				
				<h4>How much Bonus Cash do you want give back to members?</h4>
				<div class="panel">		
					<div class="row">
						<div class="col-sm-12 col-md-3">
							<?=$this->Form->input('bonus_cash_amount', array('options' => $bonus_cash, 'empty' => '--Select--', 'div' => 'form-group', 'class' => 'form-control'));?>
						</div>
						<div class="col-sm-12 col-md-9">
							<p><br>% of the amount paid (exclusive of any GST) for using a Bonus Cash Card for goods or services purchased from you, the Retailer, subject to clause 7 of the Bonus Cash <a href="/terms.pdf" target="_blank">General Terms & Conditions</a></p>
						</div>
					</div>
				</div>
				<br>
				<h4>The Marketing & Admin Fee is</h4>
				<div class="panel">			
					<p>1.25% of the amount paid (exclusive of any GST) for using a Bonus Cash Card for goods or services purchased from the Retailer, subject to clause 8 of the Bonus Cash <a href="/terms.pdf" target="_blank">General Terms & Conditions</a></p>
				</div>
				<br>
				<h4>Enter the Details Of All Your Stores</h4>
				<div class="panel">
				
	<?php 
					foreach($stores as $store_number => $store) {
						echo $this->element('merchants/store_fields', array('store_number' => $store_number, 'store' => $store, 'div' => 'form-group', 'class' => 'form-control'));
					}
				
	?>
					<div class="col-sm-6 col-md-9 text-right" style="padding-top: 1.5em;">
						<p>If you have more than one Store, click the "Add Another Store" button</p>
					</div>					
					<div class="col-sm-6 col-md-3" style="padding: 1em;">					
<!-- 						<?=$this->Form->submit('Add Another Store', array('id' => 'add_store', 'div' => 'form-group', 'class' => 'form-control btn btn-branded pull-right'));?> -->
						<?=$this->Form->submit('Add Another Store', array('id' => 'add_store', 'class' => 'form-control btn btn-branded pull-right'));?>
					</div>
				</div>
				<hr class="featurette-divider">

				<br>
				
				<h4>Your Bank Account Details</h4>
				<div class="panel">
					<div class="row">
					
						<div class="col-sm-12"><?=$this->Form->input('account_name', array('div' => 'form-group', 'class' => 'form-control'));?></div>
						<div class="col-sm-12 col-md-4"><?=$this->Form->input('bsb', array('label' => 'BSB', 'div' => 'form-group', 'class' => 'form-control'));?></div>
						<div class="col-sm-12 col-md-4 end"><?=$this->Form->input('account_number', array('div' => 'form-group', 'class' => 'form-control'));?></div>
					</div>
				</div>
	
				<h4>Enter Payment Schedule</h4>
				<div class="panel">
					<p>We authorise and request Integrapay Pty Ltd to debit payments from our account as specified above at intervals and amounts as directed by Cash Rewards Global as per the <a href="/terms.pdf" target="_blank">Terms and Conditions</a> of my agreement with The Business and in accordance with Direct Debit Request and IntegraPay DDR Service Agreement</p>
				</div>
	
				<h4>Completing The Service Agreement</h4>
				<div class="panel">
					<div class="row">
		
						<div class="col-sm-12columns">
							<p>Please tick the two boxes below, and click the I Agree button</p>
							<p>By checking 'I Agree' below and clicking</p>
						</div>
						<div class="col-sm-12 col-md-9">
							
							<?=$this->Form->input('ddr_t_and_c', array('type' => 'checkbox', 'label' => 'Integrapay <a href="#">Direct Debit Terms & Conditions</a>'));?>
							<?=$this->Form->input('bonuscash_t_and_c', array('type' => 'checkbox', 'label' => 'Bonus Cash <a href="/terms.pdf" target="_blank">General Terms & Conditions</a>'));?>
						</div>
						<div class="col-sm-12 col-md-3">
							<?=$this->Form->submit('I Agree', array('class' => 'btn btn-branded btn-lg'));?>
						</div>
					</div>
				</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>

<script type="text/javascript">
	
	$( document ).ready(function() {
		var stores = <?=$store_count;?>;
		
		$( "#MerchantCommencementDate" ).datepicker({ dateFormat: "yy-mm-dd" });
		
		$('#add_store').click(function(event) {
/* 			console.log('clicked! ' + stores); */
			stores++;
			
			$.ajax({
				type: 'get',
				dataType: 'html',
				url: '/merchants/new_store/' + stores,
				success: function(response) {
					if (response) {
						$( ".store_form" ).last().after(response);
					}
				},
				error: function(event) {
					alert("An error occurred: " + e.responseText.message);
					console.log(event);
				}
			});
			event.preventDefault();
		});
		
		$('#MerchantBusinessType').change(function(event) {
			var business_type = $('#MerchantBusinessType').val();			
			
			$.ajax({
				type: 'get',
				data: {
					'business_type' : business_type	
				},
				dataType: 'html',
				url: '/merchants/business_categories/',
				success: function(response) {
					if (response) {
						$( "#MerchantBusinessCategory" ).replaceWith( response );
					}
				},
				error: function(event) {
					alert("An error occurred: " + e.responseText.message);
					console.log(event);
				}
			});
			event.preventDefault();
			
		});
		
		$('form').on('click', '.add_terminal_to_merchant', function(event){ 
			var button_container = $(this).parent('div').parent('div');
			var store_div = $(this).closest('.store_form');
			var store_number = $(this).attr('store_number');
			var bank_merchant_number = $(this).attr('bank_merchant_number');
			var merchant = $(this).closest('.bank_merchant_form');
			var last_terminal = $(merchant).find('.terminal_input_div').last();
			var last_terminal_number = last_terminal.find('.terminal_input').attr('terminal_number');
			
			$.ajax({
				type: 'get',
				data: {
					'store_number' : Number(store_number),
					'bank_merchant_number' : Number(bank_merchant_number),
					'terminal_number' :  Number(last_terminal_number) + 1
				},
				dataType: 'html',
				url: '/merchants/new_terminal/',
				success: function(response) {
					if (response) {
						$(last_terminal).after(response);
					}
				},
				error: function(event) {
					alert("An error occurred: " + event.responseText.message);
					console.log(event);
				}
			});
			event.preventDefault();

		});
		
		
		$('form').on('click', '.add_merchant_to_store', function(event){ 	
			var button_container = $(this).parent('div').parent('div').parent('div');
			var store_div = $(this).closest('.store_form');
			var store_number = $(store_div).attr('id').replace("store_form", "");
			var bank_merchant_number = $(store_div).find('.bank_merchant_form').last().attr('bank_merchant');
			
			$.ajax({
				type: 'get',
				data: {
					'store_number' : store_number,
					'bank_merchant_number' : Number(bank_merchant_number) + 1,
				},
				dataType: 'html',
				url: '/merchants/new_bank_merchant/',
				success: function(response) {
					if (response) {
						$(button_container).before(response);
					}
				},
				error: function(event) {
					alert("An error occurred: " + event.responseText.message);
					console.log(event);
				}
			});
			event.preventDefault();
		});
		
		
	});
</script>