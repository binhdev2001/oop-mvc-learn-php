<link rel="stylesheet"
	href="<?php echo siteUrl ?>/public/theme/assets/css/login.css">
<div class="container-login-page" id="container-login-page">
	<div class="form-container sign-up">

		<form method="POST">
			<h1>Create Account</h1>
			<span>use your email for registeration</span>
			<input name="display_name" type="text" placeholder="Name">
			<input name="email_user" type="email" placeholder="Email">
			<input name="password" type="password"
				placeholder="Password">
			<button type="submit" name="signup_user"
				value="Signup">Sign
				Up</button>
		</form>
	</div>
	<div class="form-container sign-in">
		<form method="post">
			<h1>Sign In</h1>
			<span> use your email andpassword</span>
			<input name="email_user" type="email" placeholder="Email">
			<input name="password" type="password"
				placeholder="Password">
			<a href="#">Forget Your Password?</a>
			<button type="submit" name="login_user" value="Login">Sign
				In</button>
		</form>
	</div>
	<div class="toggle-container">
		<div class="toggle">
			<div class="toggle-panel toggle-left">
				<h1>Welcome Back!</h1>
				<p>Enter your personal details to use all of site
					features</p>
				<button class="hidden" id="login">Sign In</button>
			</div>
			<div class="toggle-panel toggle-right">
				<h1>Hello, Friend!</h1>
				<p>Register with your personal details to use all of
					site features</p>
				<button class="hidden" id="register">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<script src="<?php echo siteUrl ?>/public/theme/assets/js/login.js"
	?></script>