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
			<table class="tax-old">
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
						<td>HRA Exemptions us/ 10A</td>
						<td>HRA Calculation <a href="#">Calculate Now</a></td>
						<td><input type="text" name="hra-excemptions"></td>
					</tr>
					<tr>
						<td>Other Exemptions u/s 10A</td>
						<td>Medical, Conveyance etc </td>
						<td><input type="text" name="other-excemptions" disabled value="50000"></td>
					</tr>
					<tr>
						<td>Profession Tax</td>
						<td>Professional Tax</td>
						<td><input type="text" name="professional-tax"></td>
					</tr>

					<tr>
						<td class="highlight">Net Income under Salaries</td>
						<td>Gross Income - Exemptions</td>
						<td><input type="text" name="netincome"></td>
					</tr>

					<tr>
						<td>Deductions u/s 80 C</td>
						<td>Investments in PF, PPF, Life Ins, ELSS etc</td>
						<td><input type="text" name="taxbenefits"></td>
					</tr>
					<tr>
						<td>Deductions u/s 80 CCG</td>
						<td>Investments in RGESS (50% of Investments)</td>
						<td><input type="text" name="taxbenefits"></td>
					</tr>
					<tr>
						<td>Deductions u/s 80D</td>
						<td>Medical Insurance Premium (Self, Parents)</td>
						<td><input type="text" name="taxbenefits"></td>
					</tr>
					<tr>
						<td>Tax Benefit u/s 24</td>
						<td>Interest Paid on Home Loan (Max 2L)</td>
						<td><input type="text" name="taxbenefits"></td>
					</tr>
					<tr>
						<td>Tax Benefit u/s 80EE</td>
						<td>First Time Home Buyer (Rs.50000) in period [2016-2017]</td>
						<td><input type="text" name="taxbenefits"></td>
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

			<table class="tax-old">
				<thead>
					<th>Tax Slab</th>
					<th>Slab Income	</th>
					<th>Tax Rate</th>
					<th>Tax Amount</th>
				</thead>
				<tbody>
					<tr>
						<td>Income Tax Payee Type</td>
						<td>Male, Female, Sr. Citizen>60 years, Very Sr. Citizen>80 years</td>
						<td></td>
						<td><select>
							<option value="male">Male</option>
							<option value="female">FeMale</option>
							<option value="seniorcitizen">Senior Citizen</option>
							<option value="veryseniorcitizen">Very Senior Citizen</option>
						</select></td>
					</tr>
					<tr>
						<td>0</td>
						<td>0</td>
						<td>0%</td>
						<td>-</td>
					</tr>
					<tr>
						<td>0</td>
						<td>0</td>
						<td>5%</td>
						<td>0</td>
					</tr>
					<tr>
						<td>0</td>
						<td>1,87,600</td>
						<td>20%</td>
						<td>0</td>
					</tr>
					<tr>
						<td>0+</td>
						<td>0</td>
						<td>30%</td>
						<td>0</td>
					</tr>
					<tr>
						<td class="highlight" colspan="3">Tax on Total Income</td>
						<td>0</td>
					</tr>
					<tr>
						<td>Surcharge</td>
						<td>12% on Tax if Income > Rs. 1 Crore</td>
						<td>12%</td>
						<td>0</td>
					</tr>
					<tr>
						<td colspan="3">Tax with Surcharge</td>
						<td>0</td>
					</tr>
					<tr>
						<td colspan="2">Education Cess</td>
						<td>4%</td>
						<td>0</td>
					</tr>
					<tr>
						<td colspan="3">Tax with Cess</td>
						<td>0</td>
					</tr>
					<tr>
						<td>Tax Credit</td>
						<td>Upto Rs.2000 if Taxable Income < Rs. 5 lakhs</td>
						<td></td>
						<td>0</td>
					</tr>
					<tr>
						<td class="highlight" colspan="3">Tax Liability</td>
						<td>0</td>
					</tr>
				</tbody>
			</table>
			<table>
				<thead>
					<th colspan="3" class="text-center">Income Tax Ratio</th>
				</thead>
				<tbody>
					<tr>
						<td>Monthly Income</td>
						<td>Gross Income/12</td>
						<td>0</td>
					</tr>
					<tr>
						<td>Monthly Tax (Appx TDS)</td>
						<td>Tax Liability/12</td>
						<td>0</td>
					</tr>
					<tr>
						<td>Income Tax Ratio</td>
						<td>Tax Liability/Gross Income	</td>
						<td>0%</td>
					</tr>
				</tbody>
			</table>


		</div>
	</div>
		
	</div>
</div>