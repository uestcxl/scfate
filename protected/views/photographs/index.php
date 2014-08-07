<div class="works_concent"> 
					<?php if(!empty($photographs)) {foreach ($photographs as $key => $photograph) {?>
						<div class="works_concent_part">
							<img src="<?php echo Yii::app()->baseUrl.'/images/photographs/'.$photograph->picture?>">
							<h2><?php echo $photograph->title;?></h2>
							<p><?php echo $photograph->description;?></p>
						</div>
					<?php }}?>
							<div class="pager">
								<?php
									$this->widget('CLinkPager',array(
											'header'=>'',
											'firstPageLabel'=>'第一页',
											'lastPageLabel' => '末页',
											'prevPageLabel' => '上一页',
											'nextPageLabel' => '下一页',
											'pages' => $pages, 
										)
									);
								?>
							</div>
	
</div>