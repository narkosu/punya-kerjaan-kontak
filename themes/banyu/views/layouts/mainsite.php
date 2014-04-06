<!DOCTYPE html>
<html data-nav-highlight-class-name="highlight-global-nav-home">
  <head>
    
    <title><?php echo Yii::app()->name?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="utf-8" />


  
    <meta name="description" content="Instantly connect to what&#39;s most important to you. Follow your friends, experts, favorite celebrities, and breaking news." />
  <link href="/phoenix/favicon.ico" rel="shortcut icon" type="image/x-icon" />

      
     <?php /*   <link rel="stylesheet" href="http://a0.twimg.com/a/1335395051/t1/css/t1_core_logged_out.bundle.css" type="text/css" media="screen" />*/?>
     
      <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/logouted.css" />
    
      <?php /*<link rel="stylesheet" href="http://a0.twimg.com/a/1335395051/t1/css/t1_more.bundle.css" type="text/css" media="screen" />*/?>
  </head>

  <body class="t1   logged-out   front-random-image-city-balcony ">
  
  <div id="doc">
    <div id="page-outer">
		
      <div class="front-container" id="front-container">
		
		  <div class="front-card" >
			<div id="logo-place">Nolkm.Com</div>
			<div class="front-welcome">
			  <div class="front-welcome-text">
				<h1>Welcome to Nolkm.</h1>
				<p>Berbagi informasi produk dan berbelanja.</p>
			  </div>
			</div>

			<div class="front-signin js-front-signin">
			  <form action="<?php echo Yii::app()->createUrl('site/login')?>" class="signin" method="post">
				<div class="placeholding-input username">
				  <input type="text" class="text-input email-input" name="session[username_or_email]" title="Username or email" autocomplete="on">
				  <span class="placeholder">Username or email</span>
				</div>

				<table class="flex-table password-signin">
				  <tbody>
					<tr>
					  <td class="flex-table-primary">
						<div class="placeholding-input password flex-table-form">
						  <input type="password" class="text-input flex-table-input" name="session[password]" title="Password">
						  <span class="placeholder">Password</span>
						</div>
					  </td>
					  <td class="flex-table-secondary">
						<input type="submit" class="submit btn primary-btn flex-table-btn js-submit" value="Sign in">
					  </td>
					</tr>
				  </tbody>
				</table>

				<div class="remember-forgot">
				  <label class="remember">
					<input type="checkbox" value="1" name="remember_me">
					<span>Remember me</span>
				  </label>
				  <span class="separator">&middot;</span>
				  <a class="forgot" href="/account/resend_password">Forgot password?</a>
				</div>

				

				<input type="hidden" name="scribe_log">
				<input type="hidden" name="redirect_after_login" value="">
			  </form>
			</div>

			<div class="front-signup js-front-signup">
			  <h2><strong>New to Nolkm?</strong> Sign up</h2>

			  <form action="https://twitter.com/signup" class="signup" method="post">
				<div class="placeholding-input">
				  <input type="text" class="text-input" autocomplete="off" name="user[name]" maxlength="20">
				  <span class="placeholder">Full name</span>
				</div>
				<div class="placeholding-input">
				  <input type="text" class="text-input email-input" autocomplete="off" name="user[email]">
				  <span class="placeholder">Email</span>
				</div>
				<div class="placeholding-input">
				  <input type="password" class="text-input" name="user[user_password]">
				  <span class="placeholder">Password</span>
				</div>

				<input type="hidden" value="front" name="context">
				<input type="submit" class="btn signup-btn" value="Sign up for Twitter">
			  </form>
			</div>
		  </div>
	</div>

       
    </div>
  </div>
  <div class="twttr-dialog-wrapper"></div>

<!--[if lte IE 6]>
  <script>using('bundle/ie6').load();</script>
<![endif]-->

</body>

</html>
