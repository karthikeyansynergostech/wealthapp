<form action="/form?type=contact-form" method="post">
<div class="form-group-row">
<div class="form-group form-group-3">
			<input type="text" name="fullname" placeholder="Full Name*" class="form-field-validate" data-validate="onlyalphabets|minchars_3" data-required="true" required><br />
			<span class="error_txt"></span>
		</div>
<div class="form-group form-group-3">
			<input type="text" name="phonenumber" placeholder="Phone Number*" class="form-field-validate" data-validate="phonenumber|onlynumeric|minnum_10|maxnum_16" data-required="true" required><br />
			<span class="error_txt"></span>
		</div>
<div class="form-group form-group-3">
			<input type="text" name="email" placeholder="Email Address*" class="form-field-validate" data-validate="email" data-required="true" required><br />
			<span class="error_txt"></span>
		</div>
</p>
</div>
<div class="form-group-row">
<div class="form-group form-group-1">
			<textarea name="message" placeholder="Message*" rows="5" class="form-field-validate" data-validate="minchars_3" data-required="true" required></textarea><br />
			<span class="error_txt"></span>
		</div>
</p>
</div>
<div class="form-group form-group-1">
<input type="hidden" id="pf-recaptcha" name="pf-recaptcha" value=""><br />
		<button class="transparent-btn-with-image">Submit <img decoding="async" loading="lazy" width="24" height="24" class="wp-image-39" style="width: 20px;" src="https://wealthapp.dotncube.in/wp-content/uploads/2023/03/cta-arrow.png" alt=""></button>
	</div>
</form>