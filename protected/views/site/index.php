<head>
	<script src="<?php echo Yii::app()->baseUrl?>/html/js/jquery.js"></script>
	<script src="<?php echo Yii::app()->baseUrl?>/html/js/photo.js"></script>
</head>
<?php
	$criteria=new CDbCriteria;
	$criteria->limit=3;
	$criteria->order='create_time desc';
	$announcement=Announcement::model()->findAll($criteria);
?>
	<!-- section  begin -->
		<!-- slider  begin -->
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
						<p><?php echo $onelist->content;?></p>
					</div>
				<?php }?>
			</div>
			<!-- announcement  end -->
			<!-- promotion  begin -->
			<div class="promotion">
				<h1>促销活动</h1>
			</div>
			<!-- promotion  end -->
		</div>
		<!-- announcement&promotion end -->
	<!-- section  end -->