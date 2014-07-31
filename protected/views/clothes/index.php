<?php
	if (empty($type)) {
		$type=null;
	}
	if (empty($sort)) {
		$sort=null;
	}
?>
<div class="rent_show_content">
<div class="show"><h2>显示</h2></div>
<div class="condition">
	<span style="font-weight:bold">排序</span>
	<span><a href="<?php echo $this->createUrl('sort',array('type'=>'1','sort'=>$sort))?>">综合</a></span>
	<span><a href="<?php echo $this->createUrl('sort',array('type'=>'1','sort'=>$sort))?>">人气</a></span>
	<span><a href="<?php echo $this->createUrl('sort',array('type'=>'2','sort'=>$sort))?>">价格</a></span>
</div>

<div class="rent_show_list">
	<ul>
			<?php if(!empty($clothes)){foreach ($clothes as $key => $cloth) {?>
				<li class="dress_details">
					<a href="<?php echo $this->createUrl('view',array('id'=>$cloth->id))?>"><img src="<?php echo Yii::app()->baseUrl.'/images/clothes/'.$cloth->picture?>" /></a>
					<span class="product_name"><?php echo $cloth->clothesname?></span>
					<span class="rent">租金:<?php echo $cloth->rent?>/天</span>
				</li>
			<?php }}?>
	</ul>

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
</div>