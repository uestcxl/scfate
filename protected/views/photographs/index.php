<?php
	$photographs=Photographs::model()->findAll();
?>
<div class="works_concent"> 
				<div>
					<?php if(!empty($photographs)) {foreach ($photographs as $key => $photograph) {?>
						<div class="works_concent_part">
							<img src="<?php echo Yii::app()->baseUrl.'/images/photographs/'.$photograph->picture?>">
							<h2><?php echo $photograph->title;?></h2>
							<p><?php echo $photograph->description;?></p>
						</div>
					<?php }}?>
				</div>
</div>
