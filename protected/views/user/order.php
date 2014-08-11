<!--lable begin-->
<div  class="lable">
	<span>INDENTS</span>
	<span class="lable_Ch">我的订单</span>
	<span class="lable_El lable_El_some"></span>
</div>
<!--lable end-->

<?php if (empty($orders)) {?>
	<h1>您还没有购买记录哦</h1>
<?php } else {?>

<!--indents begin-->
<div class="indents">
	<nav class="user_nav">
		<div class="indents_select"></div>
	</nav>
	<div>
		<?php $length=count($orders);foreach ($orders as $key =>
		$order) {
				switch ($order->goods_type) {
					case '0':
						$goods=Clothes::model()->findByPk($order->goods_id);
						break;
					case '1':
						$goods=Souvenir::model()->findByPk($order->goods_id);
						break;
					default:
						$goods=null;
						break;
				}
			?>
		<div class="indents_part">
			<div class="indents_part_head">
				<div class="indent_Nom">
					我的
					<!-- 第<span>
					<?php echo $length.'  '.$key?></span>
				份 -->订单
			</div>
			<div class="indent_state">
				订单状态：
				<span>
					<?php echo $this->getOrderStatus($order->goods_type,$order->order_status)?></span>
			</div>
		</div>
		<div class="indents_part_section">
			<div class="indent_inf">
				<?php if ($order->goods_type==0) {?>
				<a target="_blank" href="<?php echo $this->
					createUrl('clothes/view',array('id'=>$goods->id))?>">
					<img width="120px" height="120px" src="<?php echo Yii::app()->baseUrl.'/images/clothes/'.$goods->picture?>"></a>
				<?php } elseif ($order->goods_type==1) {?>
				<a target="_blank" href="<?php echo $this->
					createUrl('souvenir/view',array('id'=>$goods->id))?>">
					<img width="120px" height="120px" src="<?php echo Yii::app()->baseUrl.'/images/souvenir/'.$goods->picture?>"></a>
				<?php }?>
				<div class="indent_inf_all">
					<div class="indent_name">
						<?php if ($order->goods_type==0) {?>
						<h2>
							服饰租赁&nbsp;&nbsp;&nbsp;名称:
							<?php echo $goods->clothesname?></h2>
						<?php } elseif ($order->goods_type==1) {?>
						<h2>
							纪念品&nbsp;&nbsp;&nbsp;名称:
							<?php echo $goods->name?></h2>
						<?php }?>
					</div>
					<div class="indent_buy">
						<?php if ($order->goods_type==0) {?>
						<span>
							租金：￥
							<?php echo $order->price;?>/天</span>
						<span>
							天数：
							<?php echo $order->amount;?></span>
						<?php } elseif ($order->goods_type==1) {?>
						<span>
							价格：￥
							<?php echo $order->price;?>/天</span>
						<span>
							数量：
							<?php echo $order->amount;?></span>
						<?php }?>
					</div>
				</div>
			</div>
			<div class="indent_do">
				<div class="indent_do_left">
					下单时间:
					<?php echo $order->create_time?></div>
				<div class="indent_do_right">
					<span>
						订单总价：￥
						<?php echo $order->price;?></span>
					<a href="<?php echo $this->createUrl('user/orderdetail',array('id'=>$order->id));?>"><input type="button" class="btn" value="查看订单"></a>
				</div>
			</div>
		</div>
		<?php }?>

		<div class="pager" style="margin-left: 325px">
			<?php
			$this->
			widget('CLinkPager',array(
					'header'=>'',
					'firstPageLabel'=>'第一页',
					'lastPageLabel' => '末页',
					'prevPageLabel' => '上一页',
					'nextPageLabel' => '下一页',
					'pages' => $pages, 
				)
			);
		?>
		</div>
	</div>
</div>
</div>
<!--account end-->
<?php }?>