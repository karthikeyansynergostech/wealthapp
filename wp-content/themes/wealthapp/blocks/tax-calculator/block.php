<div class="tax-calculator">
	<div class="tax-tab-menu">
		<div class="row">
			<h3 class="small-title">SELECT TAX SCHEME:</h3>
			<div class="tax-tab-options">
				<label class="tax-tab-option">New
				  <input type="radio"  checked="checked" value="tax-new" name="tax-scheme" class="tax-scheme">
				  <span class="checkmark"></span>
				</label>

				<label class="tax-tab-option">Old
				  <input type="radio"   value="tax-old" name="tax-scheme" class="tax-scheme">
				  <span class="checkmark"></span>
				</label>
			</div>
		</div>
	</div>
	<div class="tax-tab-content">
		<div class="tab-content active" id="tax-new">
			<table class="tax-new">
				<thead>
					<th>Particulars</th>
					<th>Details</th>
					<th>Amount(Rs)</th>
				</thead>
				<tbody>
					<tr>
						<td>Gross Income(CTC)</td>
						<td>Salary, Bonus, Allowances, Other income etc</td>
						<td><input type="text" name="grossincome"></td>
					</tr>
					<tr>
						<td class="highlight">Net Income under Salaries</td>
						<td>Gross Income - Exemptions</td>
						<td><input type="text" name="netincome"></td>
					</tr>
					<tr>
						<td>Tax Benefit u/s 80CCD</td>
						<td>For Additional Contribution to New Pension Scheme (Max Rs.50000)</td>
						<td><input type="text" name="taxbenefits"></td>
					</tr>
					<tr>
						<td class="highlight">Total Deductions/Benefits</td>
						<td></td>
						<td><input type="text" name="netincome"></td>
					</tr>
					<tr>
						<td class="highlight">Taxable Income</td>
						<td>Tax payable on this income</td>
						<td><input type="text" name="taxableincome"></td>
					</tr>
					<tr>
						<td colspan="3" class="transparent-bg text-center">
							<button class="transparent-btn" >Calculate Tax &nbsp;<img decoding="async" loading="lazy" width="24" height="24" class="wp-image-39" style="width: 20px;" src="https://wealthapp.dotncube.in/wp-content/uploads/2023/03/cta-arrow.png" alt=""></button>
						</td>
					</tr>
				</tbody>
			</table>

		</div>
		<div class="tab-content" id="tax-old">
			OLD
		</div>
	</div>
		
	</div>
</div>