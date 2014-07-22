<?php
	$sorts=Sort::model()->findAllByAttributes(array('sort_type'=>'1'));
	$schools=Area::model()->findAllByAttributes(array('area_type'=>'4'));
?>
<head>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl?>/html/css/works.css">
</head>
<?php $this->beginContent('//layouts/main')?>
	<!-- section  begin -->
	<section>
		<div class="ad">
			<img src="<?php echo Yii::app()->baseUrl?>/html/img/AD.png">
		</div>
		<div class="works">
			<div class="menu">
				<div class="menu_part">
					<div class="head"><h1>按品种分类</h1></div>
					<div class="body">
						<div><a href="<?php echo $this->createUrl('index');?>">所有作品</a></div>
						<?php if(!empty($sorts)) {foreach ($sorts as $key => $sort) {?>
							<div><a href="<?php echo $this->createUrl('sort',array('sort'=>$sort->id,'type'=>'0'))?>"><?php echo $sort->sort_name;?></a></div>
						<?php }}?>
					</div>
				</div>

				<div class="menu_part">
					<div class="head"><h1>按学校分类</h1></div>
					<div class="body">
						<?php if (!empty($schools)) { foreach ($schools as $key => $school) {?>
							<div><a href="<?php echo $this->createUrl('sort',array('sort'=>$school->id,'type'=>'1'))?>"><?php echo $school->area_name?></a></div>
						<?php }
						}?>
					</div>
				</div>

			</div>

			<?php echo $content;?>

		</div>
	</section>
	<!-- section  end -->
<?php $this->endContent();?>