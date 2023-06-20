<form action="/form?type=career-form" method="post">
<input type="hidden" name="postid" value="<?php echo get_the_ID();?>" required>
	<div class="form-group-row">
		<div class="form-group form-group-3">
			<input type="text" name="fullname" placeholder="Full Name" class="form-field-validate" data-validate="onlyalphabets" data-required="true" required>
			<span class="error_txt"></span>
		</div>
		<div class="form-group form-group-3">
			<input type="text" name="phonenumber" placeholder="Phone Number" class="form-field-validate" data-validate="phonenumber|onlynumeric" data-required="true" required>
			<span class="error_txt"></span>
		</div>
		<div class="form-group form-group-3">
			<input type="text" name="email" placeholder="Email Address" class="form-field-validate" data-validate="email" data-required="true" required>
			<span class="error_txt"></span>
		</div>
	</div>
	<div class="form-group-row">
		<div class="form-group form-group-2">
			<input type="text" name="jobtitle" placeholder="Job Title" class="form-field-validate" data-validate="onlyalphabets" data-required="true"  required>
		</div>
		<div class="form-group form-group-2 file-block">
			<div class="file-btn">
				<a href="javascript:void(0)" class="file-trigger"><span class="name">Resume</span><img src="https://wealthapp.dotncube.in/wp-content/uploads/2023/06/attachment-icon.webp" /></a>
			</div>
			<input id="resume" type="file" name="resume" placeholder="Resume" accept=".doc,.docx,application/msword, application/pdf" data-required="true" required>
		</div>
	</div>
	<div class="form-group-row">
		<div class="form-group form-group-1">
			<textarea name="message" placeholder="Message" rows="5" class="form-field-validate" data-validate="minchars_3" data-required="true" required></textarea>
			<span class="error_txt"></span>
		</div>
	</div>
	<div class="form-group form-group-1">
<input type="hidden" id="cf-recaptcha" name="cf-recaptcha" value="">
		<button class="transparent-btn-with-image">Submit <img decoding="async" loading="lazy" width="24" height="24" class="wp-image-39" style="width: 20px;" src="https://wealthapp.dotncube.in/wp-content/uploads/2023/03/cta-arrow.png" alt=""></button>
	</div>
</form>