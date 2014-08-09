<head>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/html/css/shopping.css">
</head>
	<!-- section  begin -->
	<section>
		<div class="ad">
			<img src="<?php echo Yii::app()->baseUrl?>/html/img/AD.png">
		</div>
		<div class="shopping_state">
			<img src="<?php echo Yii::app()->baseUrl?>/html/img/shopping_stateOne.png">
		</div>
		<div class="shopping">
			<table>
				<tr class="table_head">
					<th width="25%">店铺服装</th>
					<th width="10%">型号</th>
					<th width="10%">租金</th>
					<th width="20%">数量</th>
					<th width="10%">小计</th>
					<th width="25%">操作</th>
				</tr>
				<?php if(!empty($clothes)){foreach ($clothes as $key => $onecart) {
						$oneclothes=Clothes::model()->findByPk($onecart->goods_id);
					?>
					<tr class="table_section">
						<td class="goods">
							<div>
								<div class="goods_photo">
									<img height="82" width="82" src="<?php echo Yii::app()->baseUrl.'/images/clothes/'.$oneclothes->picture;?>">
								</div>
								<span class="product_name" cid="<?php echo $onecart->goods_id?>" type="0"><a href="<?php echo $this->createUrl('clothes/view',array('id'=>$onecart->goods_id))?>"><?php echo $oneclothes->clothesname?></a></span>
							</div>
						</td>	
						<td class="model" modelname="<?php echo $onecart->size?>"><?php echo $onecart->size?></td>
						<td class="price_item"><?php echo $oneclothes->rent;?></td>
						<td>
							<input class="min" name="" type="button" value="-" /> 
							<input class="text_box" name="" type="text" value="<?php echo $onecart->amount?>" /> 
							<input class="add" name="" type="button" value="+" /> 
						</td>
						<td class="price _red"  id="total_item_1">0</td>
						<td class="goods_do">
							<span class="delete"><a href="javascript:;">删除</a></span>
						</td>
					</tr>
				<?php }}else{?>
					<tr>
						<td>
							<br>
							<h1><a href="<?php echo $this->createUrl('clothes/index');?>">还没有选择衣服哦</a></h1>
							<br>
						</td>
					</tr>
				<?php }?>
				<tr class="table_head">
					<th width="25%">我的纪念品</th>
					<th width="10%">所属学校</th>
					<th width="10%">金额</th>
					<th width="20%">数量</th>
					<th width="10%">小计</th>
					<th width="25%">操作</th>
				</tr>
				<?php if(!empty($souvenirs)) {foreach ($souvenirs as $key => $onecart) {
						$oneclothes=Souvenir::model()->findByPk($onecart->goods_id);
						$school=Area::model()->findByPk($oneclothes->school_id);
					?>
					<tr class="table_section">
						<td class="goods">
							<div>
								<div class="goods_photo">
									<img height="82" width="82" src="<?php echo Yii::app()->baseUrl.'/images/clothes/'.$oneclothes->picture;?>">
								</div>
								<span class="product_name" cid="<?php echo $onecart->goods_id?>" type="1"><a href="<?php echo $this->createUrl('souvenir/view',array('id'=>$onecart->goods_id))?>"><?php echo $oneclothes->name?></a></span>
							</div>
						</td>	
						<td class="model" modelname=""><?php echo $school->area_name?></td>
						<td class="price_item"><?php echo $oneclothes->reduce_price;?></td>
						<td>
							<input class="min" name="" type="button" value="-" /> 
							<input class="text_box" name="" type="text" value="<?php echo $onecart->amount?>" /> 
							<input class="add" name="" type="button" value="+" /> 
						</td>
						<td class="price _red"  id="total_item_1">0</td>
						<td class="goods_do">
							<span class="delete"><a href="javascript:;">删除</a></span>
						</td>
					</tr>
				<?php }}else{?>
				<tr>
					<td>
						<br>
						<h1><a href="<?php echo $this->createUrl('souvenir/index');?>">还没有选择纪念品哦</a></h1>
						<br>
					</td>
				</tr>
				<?php }?>
			</table>
		</div>
				<div class="next_button"><a href="javascript:;">下一步</a></div>
				<div class="total">服装总价：<span id="total">200.00</span></div>
	</section>
	<!-- section  end -->

