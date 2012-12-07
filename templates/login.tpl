{include file="header.tpl" title="Notiya"}
		{if $login =='not'}
			<body>
				<div class="container-fluid">
					<div class="row">
						<div class="span4 offset4">
							<form class="well">
								<input type="text" name="username">
								<input type="password" name="password">
								<input type="submit" name="login" class="btn btn-primary" value="Login">
							</form>
						</div>
					</div>
				</div>
			</body>
		{else if $login=='wrong'}
			<body>
				<div id="bt-message">
					<div id="content">
						<span id="message-txt"">Username or password is invalid.</span>
						<div class="message-content" style="margin-top:20px;">
							<form action="home.php" method="POST">
									<input name="email" class="span3" type="text" placeholder="Email">
									<div class="input-append">
										<input class="span2" type="password" placeholder="Password" name="password">
										<input class="btn btn-primary" type="submit" value="Login" name="submitLogin">
									</div>
							</form>
						</div>
					</div>
				</div>
			</body>

		{/if}
{include file="footer.tpl"}
				