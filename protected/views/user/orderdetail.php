<?php
	$address=Address::model()->findByPk($order->address_id);
	$me=User::model()->findByPk(Yii::app()->user->id);
?>
<!--lable begin-->
<div  class="lable">
	<span>INDENTS</span>
	<span class="lable_Ch">我的订单</span>
	<span class="lable_El lable_El_some"></span>
</div>
<!--lable end-->
<!--indents begin-->
<div class="indents_detail">
	<div class="indents_detail_head">
		<span>
			订单状态：
			<span class="_red"><?php echo $this->getOrderStatus($order->goods_type,$order->order_status)?></span>
		</span>
		<span>下单时间：<?php echo $order->create_time?></span>
	</div>
	<div>
		<div class="indents_detail_part">
			<div class="indents_part_head">
				<div class="indent_Nom">订单信息</div>
			</div>
			<div class="indents_detail_part_section">
					<div class="seller_inf">
						<h2>校缘网客服</h2>
					<div>
						<p>QQ&nbsp;&nbsp;:&nbsp;&nbsp;120308593 </p>
					</div>
					<div>
						<p>手机号码：12345678901</p>
					</div>
					<div>
						<p>详细地址：四川省成都市高新西区西源大道2006号电子科技大学</p>
					</div>
				</div>
				<div class="seller_inf">
					<h2>买家信息</h2>
					<div>
						<p>QQ&nbsp;&nbsp;:&nbsp;&nbsp;<?php echo $me->QQ?></p>
					</div>
					<div>
						<p>手机号码：<?php echo $address->phone;?></p>
					</div>
					<div>
						<p>详细地址：<?php echo $address->province.$address->city.$address->county.strip_tags($address->detail);?></p>
					</div>
				</div>
				<div class="goods_inf">
					<div class="goods_head">
						<div class="goods_head_left">
							<?php if ($order->goods_type=='0') {
								$goods=Clothes::model()->findByPk($order->goods_id);
								?>
								<img width="80px" height="80px" src="<?php echo Yii::app()->baseUrl.'/images/clothes/'.$goods->picture;?>">
								<span><?php echo $goods->clothesname?></span>
							<?php }elseif ($order->goods_type=='1') {?>
								<img width="80px" height="80px" src="<?php echo Yii::app()->baseUrl.'/images/souvenir/'.$goods->picture;?>">
								<span><?php echo $goods->name?></span>
							<?php }?>
						</div>
						<div class="goods_head_right">
							<?php if ($order->goods_type=='0') {?>
							<span>天数:<?php echo $order->amount?>天</span>
								<span>租金:￥<?php echo $goods->rent?>/天</span>
								<span>押金:￥<?php echo $goods->cash_pledge?></span>
							<?php }elseif ($order->goods_type=='1') {?>
							<span>数量：<?php echo $order->amount?></span>
								<span>金额：￥<?php echo $goods->reduce_price?></span>
							<?php }?>
						</div>
					</div>
					<div class="goods_send">
							<?php if ($order->goods_type=='0') {?>
								<span>
								总价：
								<span class="_red">￥<?php echo $order->price+$goods->cash_pledge?></span>
								</span>
							<?php }elseif ($order->goods_type=='1') {?>
								<span>运费：￥6.00（邮递）</span>
								<span>总价：<span class="_red">￥<?php echo $goods->price+6;?></span></span>
							<?php }?>
					</div>
					<div class="goods_indents">
						<span>下单时间：<?php echo $order->create_time?></span>
					</div>
				</div>
			</div>
		</div>
		<div class="indents_detail_part">
			<div class="indents_part_head">
				<div class="indent_Nom">物流信息</div>
			</div>
			<div class="indents_detail_part_section">
				<div class="indents_iframe">
					<iframe src=""></iframe>
				</div>
			</div>
		</div>
	</div>
</div>
<!--account end-->