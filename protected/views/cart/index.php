<head>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/html/css/shopping.css">
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/html/js/jquery.1.4.2-min.js"></script>
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
	<script type="text/javascript" src="../js/payfor.js"></script>
		<table>
			<tr class="table_head">
				<th width="40%">店铺服装</th>
				<th width="10%">租金</th>
				<th width="10%">数量</th>
				<th width="10%">小计</th>
				<th width="30%">操作</th>
			</tr>
			<tr class="table_section">
				<td class="goods">
					<div>
						<div class="goods_photo">
							<img src="">
						</div>
						<span><a href="">这里是名字这里是名字</a></span>
					</div>
				</td>	
				<td id="price_item_1">￥200.00</td>
				<td>
					<div class="f_l add_chose">
						<a class="reduce" onClick="setAmount.reduce('#qty_item_1')" href="javascript:void(0)">-</a>
						<input type="text" name="qty_item_1" value="1" id="qty_item_1" onKeyUp="setAmount.modify('#qty_item_1')" class="text" />
						<a class="add" onClick="setAmount.add('#qty_item_1')" href="javascript:void(0)">+</a>
					</div>
				</td>
				<td class="_red"  id="total_item_1">$200.00</td>
				<td class="goods_do">
					<span><a href="">加入收藏夹</a></span>
					<span><a href="">删除</a></span>
				</td>
			</tr>
			<tr class="table_section">
				<td class="goods">
					<div>
						<div class="goods_photo">
							<img src="">
						</div>
						<span><a href="">这里是名字这里是名字</a></span>
					</div>
				</td>	
				<td id="price_item_2">￥200.00</td>
				<td>
					<div class="f_l add_chose">
						<a class="reduce" onClick="setAmount.reduce('#qty_item_2')" href="javascript:void(0)">-</a>
						<input type="text" name="qty_item_2" value="1" id="qty_item_2" onKeyUp="setAmount.modify('#qty_item_2')" class="text" />
						<a class="add" onClick="setAmount.add('#qty_item_2')" href="javascript:void(0)">+</a>
					</div>
				</td>
				<td class="_red"   id="total_item_2">$200.00</td>
				<td class="goods_do">
					<span><a href="">加入收藏夹</a></span>
					<span><a href="">删除</a></span>
				</td>
			</tr>
		</table>
	</div>
	<div class="total">服装总价：<span class="_red"   id="total_item">$200.00</span></div>
</section>
<!-- section  end -->