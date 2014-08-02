<head>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/html/js/jquery.1.4.2.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/html/js/main.js"></script>
</head>
	<div class="product_detail_content">
			<div class="bg"></div>
			<div class="product_name" cid="<?php echo $model->id?>" type="0"><h1><?php echo $model->clothesname?></h1></div>
			<div class="product_information">
				<img style="height: 297px;width: 297px" src="<?php echo Yii::app()->baseUrl.'/images/clothes/'.$model->picture?>" class="show_photo" />
				<div class="show_details">
					<ul>
						<li class="rental">租借价格:￥<?php echo $model->rent;?>/天</li>
						<li class="deposit">押金:￥<?php echo $model->cash_pledge?></li>
						<li>已售：<?php echo $model->sale_count;?></li>
						<li>库存：<?php echo $model->reserve?>件</li>
						<li>型号：
							<ul class="model">
								<li><a href="javascript:;">S</a></li>
								<li><a href="javascript:;">M</a></li>
								<li><a href="javascript:;">L</a></li>
								<li><a href="javascript:;">XL</a></li>
								<li><a href="javascript:;">XXL</a></li>
							</ul>
						</li>
						<li class="number_area"><span class="choose_number">选择数量</span>
							<div class="number">
							<input id="min" name="" type="button" value="-" />  
							<input id="text_box" name="" type="text" value="1" />  
							<input id="add" name="" type="button" value="+" />
							</div>
							</li>
					</ul>
				</div>
				<div class="button">
					<a href="javascript:;"class="shopping_cart"><img src="<?php echo Yii::app()->baseUrl?>/html/img/GWC.png" /></a>
					<a href=""class="collect"><img src="<?php echo Yii::app()->baseUrl?>/html/img/SCJ.png" /></a>
				</div>
			</div>

			<div class="nav_wrapper">
         		<div class="nav_bg"></div>
				<nav class="user_nav">
						
						<div id="nav_product_detail" class="select" onclick="showButton('product_detail','product_comment','sales_record','consultation')"></div>
						<div id="nav_product_comment" class="no" onclick="showButton('product_comment','product_detail','sales_record','consultation')"></div>
						<div id="nav_sales_record" class="no" onclick="showButton('sales_record','product_detail','product_comment','consultation')"></div>
						<div id="nav_consultation" class="no" onclick="showButton('consultation','product_detail','product_comment','sales_record')"></div>
				</nav>
			</div>
					<div id="nav_product_detail_content">
						<div class="attributes">
							<?php echo $model->description;?>
						</div>
					</div>
					<div id="nav_product_comment_content">

						<ul class="review_list">
							<li>
								<input type="radio" id="reviews_type_1"name="review_type" />
								<label for="reviews_type_1">
									<span class="reviews_title">全部</span>
								</label>
							</li>
							<li >
								<input type="radio" id="reviews_type_2"name="review_type" />
								<label for="reviews_type_2">
									<span class="reviews_title">好评</span>
									<span class="count_data">(1782)</span>
								</label>
							</li>
							<li >
								<input type="radio" id="reviews_type_3"name="review_type" />
								<label for="reviews_type_3">
									<span class="reviews_title">中评</span>
									<span class="count_data">(156)</span>
								</label>
							</li>
							<li >
								<input type="radio" id="reviews_type_4"name="review_type" />
								<label for="reviews_type_4">
									<span class="reviews_title">差评</span>
									<span class="count_data">(56)</span>
								</label>
							</li>
						</ul>
						<ul>
							<li class="comment_list"><div class="comment_content">
									<div class="buyer">
										<img src="<?php echo Yii::app()->baseUrl?>/html/img/avatar.png" /><br>
										<span>林杨</span><br>
										<img src="<?php echo Yii::app()->baseUrl?>/html/img/system.png" />
									</div>
									<p>没想到这个价格能买到这样的质量，感觉赚到了哈哈~板型很好，做工和料子更没话说，上里面有内衬，一点都不会透~上面的绣花很紧密，很小清新的感觉~想买的亲们可以下手啦
									</p>
								</div>
								<div class="comment_time"><span>2014年7月23日 23:20</span></div>
						
					       </li>
							<li class="comment_list">
								<div class="comment_content">
									<div class="buyer">
										<img src="<?php echo Yii::app()->baseUrl?>/html/img/avatar.png" /><br>
										<span>林杨</span><br>
										<img src="<?php echo Yii::app()->baseUrl?>/html/img/system.png" />
									</div>
									<p>	没想到这个价格能买到这样的质量，感觉赚到了哈哈~板型很好，做工和料子更没话说，上里面有内衬，一点都不会透~上面的绣花很紧密，很小清新的感觉~想买的亲们可以下手啦
									</p>
								</div>
								<div class="comment_time"><span>2014年7月23日 23:20</span></div>
					
							</li>
							<li class="comment_list">
								<div class="comment_content">
									<div class="buyer">
										<img src="<?php echo Yii::app()->baseUrl?>/html/img/avatar.png" /><br>
										<span>林杨</span><br>
										<img src="<?php echo Yii::app()->baseUrl?>/html/img/system.png" />
									</div>
									<p>没想到这个价格能买到这样的质量，感觉赚到了哈哈~板型很好，做工和料子更没话说，上里面有内衬，一点都不会透~上面的绣花很紧密，很小清新的感觉~想买的亲们可以下手啦
									</p>
								</div>
								<div class="comment_time"><span>2014年7月23日 23:20</span></div>
					
							</li>
					
						</ul>
						<div class="paging">		
							<a href="" class="next">>下一页</a>
							<a href=""><上一页</a>
						</div>

				</div>
					<div id="nav_sales_record_content">
						<table class="buyer_shows">
							<thead>
							<tr>
								<th>买家</th>
								<th>购买价</th>
								<th>购买数量</th>
								<th>购买时间</th>
								<th class="styles">款式和型号</th>
								</tr>
							</thead>
							<tbody>
							<tr>
								<td>林杨</td>
								<td>￥59</td>
								<td>3</td>
								<td>2012年06月23日</td>
								<td>颜色分类:白色 尺码:xxL</td>
							</tr>
							<tr>
								<td>林杨</td>
								<td>￥59</td>
								<td>3</td>
								<td>2012年06月23日</td>
								<td>颜色分类:白色 尺码:L</td>
							</tr>
							<tr>
								<td>林杨</td>
								<td>￥59</td>
								<td>3</td>
								<td>2012年06月23日</td>
								<td>颜色分类:白色 尺码:L</td>
								</tr>
								<tr>
								<td>林杨</td>
								<td>￥59</td>
								<td>3</td>
								<td>2012年06月23日</td>
								<td>颜色分类:白色 尺码:L</td>
							</tr>
							</tbody>
						</table>
						<div class="paging">		
							<a href="" class="next">>下一页</a>
							<a href="">上一页</a>
						</div>
					</div>
						
					<div id="nav_consultation_content"></div>
						
		</div>
	