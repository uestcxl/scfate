
<div class="works_concent"> 
				<div>
					<?php if(!empty($souvenir)) {foreach ($souvenir as $key => $onesouvenir) {?>
						<div class="works_concent_part">
							<img src="<?php echo Yii::app()->baseUrl.'/images/souvenir/'.$onesouvenir->picture?>">
							<p>原价:<s><?php echo $onesouvenir->price;?>元</s></p>
							<p>现价:<?php echo $onesouvenir->reduce_price;?>元</p>
							<h2><?php echo $onesouvenir->name;?></h2>
						</div>
					<?php }}?>
				</div>
</div>