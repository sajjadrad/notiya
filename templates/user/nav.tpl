<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="brand" href="http://sajjadrad.com/notiya">نوتیا</a>
			<ul class="nav">
				<li>
					<a href="index.php">خانه</a>
				</li>
				{if isset($nav)}
				<ul class="nav pull-left">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							حساب کاربری
							<b class="caret"></b>
						</a>
						<ul class="dropdown-menu">
							<li><a href="profile.php">پروفایل</a></li>
							<li><a href="setting.php">تنظیمات</a></li>
							<li><a href="../logout.php">خروج</a></li>
						</ul>
					</li>
				</ul>
				{else}
				<li>
					<a href="login.php">ورود</a>
				</li>
				<li>
					<a href="signup.php">ثبت نام</a>
				</li>
				{/if}
			</ul>
		</div>
	</div>
</div>