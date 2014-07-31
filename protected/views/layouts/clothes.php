<head>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/html/js/main.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/html/js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->baseUrl?>/html/js/jquery.1.4.2.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/html/css/dress_rent.css">
</head>
<?php 
	$sorts=Sort::model()->findAllByAttributes(array('sort_type'=>'0'));
	$this->beginContent('//layouts/main');
	if (empty($type)) {
		$type=null;
	}
	if (empty($sort)) {
		$sort=null;
	}
?>

	<!-- section  begin -->
	<section>
		<div class="ad">
			<img src="<?php echo Yii::app()->baseUrl?>/html/img/AD.png">
		</div>
		<div class="product_detail">
			<div class="menu">
				<div class="menu_part">
					<div class="menu_title"></div>
					<div class="body">
						<div class="menu_list"><a href="<?php echo $this->createUrl('index')?>">所有分类</a></div>
						<?php foreach ($sorts as $key => $onesort) {?>
							<div class="menu_list"><a href="<?php echo $this->createUrl('sort',array('sort'=>$onesort->id,'type'=>$type))?>"><?php echo $onesort->sort_name?></a></div>
						<?php }?>
					</div>
			   </div>
			</div>

			<?php echo $content;?>

		</div>
	</section>
	<!-- section  end -->

<?php $this->endContent();?>