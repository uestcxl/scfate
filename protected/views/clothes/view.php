<head>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/html/js/main.js"></script>
</head>
	<div class="product_detail_content">
			<div class="bg"></div>
			<div class="product_name"><h2>商品名称</h2></div>
			<div class="product_information">
				<img style="height: 297px;width: 297px" src="<?php echo Yii::app()->baseUrl.'/images/clothes/'.$model->picture?>" class="show_photo" />
				<div class="show_details">
					<ul>
						<li class="rental">租借价格:￥<?php echo $model->rent;?>/天</li>
						<li>已售：<?php echo $model->sale_count;?></li>
						
						<li>选择数量</li>
					</ul>
				</div>
				<div class="button">
					<a href=""class="shopping_cart"><img src="<?php echo Yii::app()->baseUrl?>/html/img/GWC.png" /></a>
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
							<ul class="attributes-list">
	    			    		<li >主图来源: 其他来源</li>
	    			    		<li >货号: Q3445</li>
	    			    		<li >风格: 街头</li>
	    			    		<li >街头: 欧美</li>
	    			    		<li >组合形式: 单件</li>
	    			    		<li >裙长: 短裙</li>
	    			    		<li >袖长: 短袖</li>
	    			    		<li >领型: 圆领</li>
	    			    		<li >袖型: 花瓣袖</li>
	    			    		<li >衣门襟: 套头</li>
	    			    		<li >裙型: 荷叶边裙</li>
	    			    		<li >图案: 人物</li>
	    			    		<li >流行元素/工艺: 印花</li>
	    			    		<li >面料: 其他</li>
	    			    		<li >成分含量: 51%(含)-70%(含)</li>
	    			    		<li >年份季节: 2014年夏季</li>
	    			    		<li >颜色分类: 白色</li>
	    			    		<li >尺码: S M L XL XXL</li>
	    			    </ul>
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
	