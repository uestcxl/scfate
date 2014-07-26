<?php
	$souvenir=Souvenir::model()->findAll();
?>
<div class="works_concent"> 
				<div>
					<?php if(!empty($souvenir)) {foreach ($souvenir as $key => $onesouvenir) {?>
						<div class="works_concent_part">
							<a href="<?php echo $this->createUrl('view',array('id' =>$onesouvenir->id));?>"><img src="<?php echo Yii::app()->baseUrl.'/images/souvenir/'.$onesouvenir->picture?>"></a>
							<p>原价:<s><?php echo $onesouvenir->price;?>元</s></p>
							<p>现价:<?php echo $onesouvenir->reduce_price;?>元</p>
							<a href="<?php echo $this->createUrl('view',array('id' =>$onesouvenir->id));?>"><?php echo $onesouvenir->name;?></a>
						</div>
					<?php }}?>
				</div>
</div>
