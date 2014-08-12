<head>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/html/css/shopping.css">
</head>
	<!-- section  begin -->
	<section>
		<div class="ad">
			<img src="<?php echo Yii::app()->baseUrl?>/html/img/AD.png">
		</div>
		<div class="shopping_state">
			<img src="<?php echo Yii::app()->baseUrl?>/html/img/shopping_stateTwo.png">
		</div>
		<div class="shopping_address_concent">
			<div class="shopping_address_left">
				<div class="shopping_address_leftPart">
					<h2>收货人地址</h2>
					<p><a href="<?php echo $this->createUrl('user/address')?>">管理收货人地址</a></p>
					<form>
						<?php foreach ($address as $key => $oneaddress) {?>
							<div>
								<input type="radio" name="address_choose" value="<?php echo $oneaddress->id?>">
								<?php echo '<span>'.$oneaddress->province.'</span><span>'.$oneaddress->city.'</span><span>'.$oneaddress->county.'</span><span>'.strip_tags($oneaddress->detail).'</span>'?>
								<span class="address_choose_right">
									<span>收货人：<span><?php echo strip_tags($oneaddress->receipter)?></span></span>
									<span><?php echo strip_tags($oneaddress->phone)?></span>
								</span>
							</div>
						<?php }?>
					</form>
				</div>
				<div class="shopping_address_leftPart">
					<h2>选择纪念品配送方式</h2>
					<form class="shopping_sent">
						<div>
							<input type="radio" name="address_choose">
							<h3>快递</h3>
							<span class="address_choose_right">
								<span>配送费用：<span class="_red">￥6.00</span></span>
							</span>
						</div>
					</form>
				</div>
				<div class="shopping_address_leftPart">
					<h2>服装的配送方式</h2>
					<form class="shopping_sent">
						<div>
							<input type="radio" name="address_choose">
							<h3></h3>
							<span class="address_choose_right">
								<span>送货上门,货到付款<span class="_red">支付租金以及押金</span></span>
							</span>
						</div>
					</form>
				</div>

				<div class="shopping_address_leftPart">
					<h2>给卖家留言</h2>
					<form>
						<textarea placeholder="请输入您的留言……"></textarea>
					</form>
				</div>
				<div>
					<span>服装总价：<span class="_red">￥<?php if(isset($_COOKIE['total'])) echo $_COOKIE['total']?></span></span>
				</div>
				<div class="shopping_btn">
					<span><a href="<?php echo $this->createUrl('cart/show')?>">返回购物车</a></span>
					<button type="submit" class="order"><a href="javascript:;">下单并完成支付</a></button>
				</div>
			</div>
		</div>
	</section>
	<!-- section  end -->