<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/html/css/user.css">
	
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/html/js/main.js"></script>
</head>
<!-- section  begin -->
	<section>
		<div class="ad">
			<img src="<?php echo Yii::app()->baseUrl?>/html/img/AD.png">
		</div>
		<!--user begin-->
		<div class="user">
			<!--menu begin-->
			<div class="menu">
				<div class="menu_title">
				</div>
				<div>
					<a href="user_account.html"><div class="menu_list">我的账户</div></a>
					<a href="user_order.html"><div class="menu_list">我的订单</div></a>
					<a href="user_address.html"><div class="menu_list">我的地址</div></a>
					<a href="user_photos.html"><div class="menu_list">我的相册</div></a>
					<a href="user_friends.html"><div class="menu_list">我的朋友</div></a>
					<a href="user_systemMessage.html"><div class="menu_list">系统消息</div></a>
				</div>
			</div>
			<!--menu end-->
			<!--user_section begin-->
			<div class="all_lable">
				<!--lable begin-->
				<div  class="lable">
					<span>ACCOUNT</span>
					<span class="lable_Ch">我的账户</span>
					<span class="lable_El lable_El_some"></span>
				</div>
				<!--lable end-->
				<!--account begin-->
				<div class="account">
					<nav class="user_nav">
						<div id="nav_information" class="select" onclick="showBox('information','rePasswords','reInformation')"></div>
						<div id="nav_rePasswords" class="no" onclick="showBox('rePasswords','information','reInformation')"></div>
						<div id="nav_reInformation" class="no" onclick="showBox('reInformation','information','rePasswords')"></div>
					</nav>
					<div>
						<div id="nav_information_concent">
							<div class="account_head">
								<img src="">
								<input type="button" class="btn btn_no" value="更换头像">
							</div>
							<div class="information_form">
								<form>
									<div class="form_part">
										<span>用户名：</span>
										<input type="text" readonly value="aaaa">						
									</div>
									<div class="form_part">
										<span>电子邮箱：</span>
										<input type="text" readonly value="aaaa">
									</div>
									<div class="form_part">
										<span>真实姓名：</span>
										<input type="text" readonly value="aaaa">
									</div>
									<div class="form_part">
										<span>性别：</span>
										<input type="text" readonly value="男">
									</div>
									<div class="form_part">
										<span>生日：</span>
										<input type="text" readonly value="1994-01-01">
									</div>
									<div class="form_part">
										<span>QQ：</span>
										<input type="text" readonly value="1234567890">
									</div>
								</form>
							</div>
						</div>
						<div id="nav_rePasswords_concent">
							<div class="rePasswords_form">
								<form>
									<div class="form_part">
										<span>原密码：</span>
										<input type="passwords">
									</div>
									<div class="form_part">
										<span>新密码：</span>
										<input type="passwords">
									</div>
									<div class="form_part">
										<span>确认密码：</span>
										<input type="passwords">
									</div>
									<div class="form_btn">
										<input type="submit" class="btn" value="确认修改">
									</div>
								</form>
							</div>
						</div>
						<div id="nav_reInformation_concent">
							<div class="account_head">
								<img src="">
								<input type="button" class="btn" value="更换头像">
							</div>
							<div class="reInformation_form">
								<form>
									<div class="form_part">
										<span>用户名：</span>
										<input type="text"  value="aaa">						
									</div>
									<div class="form_part">
										<span>电子邮箱：</span>
										<input type="text"  value="aaa">
									</div>
									<div class="form_part">
										<span>真实姓名：</span>
										<input type="text"  value="aaa">
									</div>
									<div class="form_part">
										<span>性别：</span>
										<input type="text"  value="aaa">
									</div>
									<div class="form_part">
										<span>生日：</span>
										<input type="text"  value="aaa">
									</div>
									<div class="form_part">
										<span>QQ：</span>
										<input type="text"  value="aaa">
									</div>
									<div class="form_btn">
										<input type="submit" class="btn" value="保存修改">
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
				<!--account end-->
			</div>
			<!--user_section end-->
			<!--user end-->
		</div>
	</section>
