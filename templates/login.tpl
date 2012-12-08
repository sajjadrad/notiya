{include file="header.tpl" title="Notiya"}
			<body>
				{include file="../templates/user/nav.tpl" title="Note"}
				<div class="container-fluid">
					<div class="row-fluid">

						<div class="span4 offset4">
							<h2>ورود به حساب کاربری</h2>
							{if isset($error)}
								<div class="alert alert-error">{$error}</div>
							{/if}
							<form method="POST" action="login.php" style="text-align:center;" class="well">
								
								<input name="email" style="direction:ltr;text-align:left;" class="span8" type="text" placeholder="ایمیل">
							

								<input name="password" class="span8" type="password" placeholder="کلمه عبور">
							<div class="form-actions">	
								<input class="btn btn-primary" type="submit" value="ورود">
								<button href="signup.php" class="btn btn-warning">ثبت نام</button>
								
							</div>
							</form>
						</div>
					</div>
				</div>
{include file="footer.tpl"}
				