<head>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/html/css/user.css">
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
					<a href="<?php echo $this->createUrl('index')?>"><div class="menu_list">回到首页</div></a>
					<a href="<?php echo $this->createUrl('photographs/index')?>"><div class="menu_list">摄影作品</div></a>
					<a href="<?php echo $this->createUrl('clothes/index');?>"><div class="menu_list">看看衣服</div></a>
					<a href="<?php echo $this->createUrl('souvenir/index')?>"><div class="menu_list">逛逛纪念品</div></a>
					<a href="<?php echo $this->createUrl('site/about');?>"><div class="menu_list">关于我们</div></a>
				</div>
			</div>
			<!--menu end-->
			<!--user_section begin-->
			<div class="all_lable">
				<!--lable begin-->
				<div  class="lable">
					<span>SEARCH_RESULT</span>
					<span class="lable_Ch">我的搜索结果</span>
				</div>
				<!--lable end-->
				<!--indents begin-->
				<div class="indents">

					<div>
						<?php if(!empty($results)) {foreach ($results as $key => $result) {
								if($result['type']==='0'){
									$clothes=Clothes::model()->findByPk($result['id']);
							?>
							<div class="indents_part">
								<div class="indents_part_head">
									<div class="indent_Nom"><span>服装:</span></div>
									<div class="indent_state"><span></span></div>
								</div>
								<div class="indents_part_section">
									<div class="indent_inf">
										<img src="<?php echo Yii::app()->baseUrl.'/images/clothes/'.$result['picture'];?>">
										<div class="indent_inf_all">
											<div class="indent_name">
												<h2>名称:<?php echo $result['name']?></h2>
											</div>
											<div class="indent_buy">
												<span>租金：￥<?php echo $clothes->rent?>/天</span>
												<span>押金：<?php echo $clothes->cash_pledge?></span>
											</div>
										</div>
									</div>
									<div class="indent_do">
										<div class="indent_do_left"></div>
										<div class="indent_do_right">
											<span></span>
											<a  target="_blank" href="<?php echo $this->createUrl('clothes/view',array('id'=>$result['id']))?>"><input type="button" class="btn" value="查看服装"></a>
										</div>
									</div>
								</div>
							</div>
						<?php } elseif ($result['type']==='1') {
								$souvenir=Souvenir::model()->findByPk($result['id']);
							?>
							<div class="indents_part">
								<div class="indents_part_head">
									<div class="indent_Nom"><span>纪念品:</span></div>
									<div class="indent_state"><span></span></div>
								</div>
								<div class="indents_part_section">
									<div class="indent_inf">
										<img src="<?php echo Yii::app()->baseUrl.'/images/souvenir/'.$result['picture'];?>">
										<div class="indent_inf_all">
											<div class="indent_name">
												<h2>名称:<?php echo $result['name']?></h2>
											</div>
											<div class="indent_buy">
												<span>价格：￥<?php echo $souvenir->price?></span>
											</div>
										</div>
									</div>
									<div class="indent_do">
										<div class="indent_do_left"></div>
										<div class="indent_do_right">
											<span></span>
											<a  target="_blank" href="<?php echo $this->createUrl('souvenir/view',array('id'=>$result['id']))?>"><input type="button" class="btn" value="查看纪念品"></a>
										</div>
									</div>
								</div>
							</div>
						<?php } }} else{?>
						<div class="indents_part">
							<div class="indents_part_head">
								<div class="indent_Nom"><span></span></div>
								<div class="indent_state"><span></span></div>
							</div>
							<div class="indents_part_section">
								<div class="indent_inf">
									<img src="<?php echo Yii::app()->baseUrl.'/html/img/avatar.png'?>">
									<div class="indent_inf_all">
										<div class="indent_name">
											<h2>暂时没有您想要的搜索结果！</h2>
										</div>
										<div class="indent_buy">
											<span></span>
											<span></span>
										</div>
									</div>
								</div>
								<div class="indent_do">
									<div class="indent_do_left"></div>
									<div class="indent_do_right">
									</div>
								</div>
							</div>
						</div>
						<?php }?>
					</div>
				</div>
				<!--account end-->
			</div>
			<!--user_section end-->
			<!--user end-->
		</div>
	</section>
	<!-- section  end -->