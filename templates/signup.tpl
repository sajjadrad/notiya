{include file="header.tpl" title="Notiya"}
			<body>
				{include file="../templates/user/nav.tpl" title="Note"}
				<div class="container-fluid">
					<div class="row-fluid">

						<div class="span4 offset4">
							<h2>ثبت نام</h2>
							<form action="signup.php" method="POST" autocomplete="off" style="text-align:center;" class="well">
								<input style="direction:ltr;text-align:left;" class="span128" type="text" name="email" placeholder="ایمیل">
								<input name="password" class="span12" type="password" placeholder="کلمه عبور">
								<input name="confirm" class="span12" type="password" placeholder="تکرار کلمه عبور">
								<div class="form-actions">	
									<input name="submit" class="btn btn-warning" type="submit" value="ثبت نام">
								</div>
							</form>
						</div>
					</div>
				</div>
{include file="footer.tpl"}
				