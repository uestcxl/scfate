<head>
	<script src="<?php echo Yii::app()->baseUrl?>/html/js/jquery.js"></script>
	<script src="<?php echo Yii::app()->baseUrl?>/html/js/photo.js"></script>
</head>
<?php
	$criteria=new CDbCriteria;
	$criteria->limit=2;
	$criteria->order='create_time desc';
	$announcement=Announcement::model()->findAll($criteria);
?>
	<!-- section  begin -->
		<!-- slider  begin -->
		<div class="index_content">
		<div class="slider">
			
			<div class="banner">
				<div class="banner-btn">
					<a href="javascript:;" class="prevBtn"><i></i></a>
					<a href="javascript:;" class="nextBtn"><i></i></a>
				</div>
				<ul class="banner-img">
					<?php foreach ($indexpics as $key => $indexpic) {?>
						<li><a href="#"><img src="<?php echo Yii::app()->baseUrl.'/images/indexpic/'.$indexpic->picture?>"></a></li>
					<?php }?>
				</ul>
				<ul class="banner-circle"></ul>
			</div>
		</div>
		<!-- slider end -->
		<!-- announcement&promotion  begin -->
		<div>
			<!-- announcement  begin -->
			<div class="announcemnt">
				<h1>公告</h1>
				<?php foreach ($announcement as $key => $onelist) {?>
					<div>
						<h3><?php echo $onelist->title;?></h3>
						<?php if (mb_strlen($onelist->content,'utf-8')>48) {?>
							<p><?php echo mb_substr($onelist->content,0,48,'utf-8').'......';?></p>
						<?php } else{?>
							<p><?php echo mb_substr($onelist->content,0,48,'utf-8');?></p>
						<?php }?>
					</div>
				<?php }?>
			</div>
			<!-- announcement  end -->
			<!-- promotion  begin -->
			<div class="promotion">
				<h1>学校活动</h1>
			</div>
			<!-- promotion  end -->
		</div>
				</div>

	 <div class="works_show">
		<h1>作品展示</h1>
		<div class="works_show_content">
			<?php if(isset($works)) {foreach ($works as $key => $onework) {?>
				<div class="show_info">
					<div class="photo">
						<a href=""><img src="<?php echo Yii::app()->baseUrl.'/images/photographs/'.$onework['picture'];?>" /></a>
					</div>
					<h2><?php echo $onework['title']?></h2>
				</div>
			<?php }}?>
		</div> 
	</div> 
		<!-- announcement&promotion end -->
	<!-- section  end -->