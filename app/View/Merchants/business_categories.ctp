<?php	if (!empty($business_categories)) : ?>
			<select name="data[Merchant][business_category]" class="form-control" id="MerchantBusinessCategory">
				<option value="">--Select--</option>
<?php		foreach ($business_categories as $k => $v) {
				echo '<option value="' . h($k) . '">' . h($v) . '</option>';
			} ?>
			</select>
<?php	else :?>
			<input name="data[Merchant][business_category]" class="form-control" type="text" id="MerchantBusinessCategory">
<?php	endif; ?>