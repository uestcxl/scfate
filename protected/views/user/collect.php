<!--lable begin-->
<div  class="lable">
	<span>COLLETIONS</span>
	<span class="lable_Ch">我的收藏夹</span>
</div>
<!--lable end-->

<?php if(isset($collects)){?>

<!--indents begin-->
<div class="indents">
	<nav class="user_nav">
	</nav>

	<div>
		<?php foreach ($collects as $key => $collect) { 
			if($collect->good_type=='0'){
				$clothes=Clothes::model()->findByPk($collect->good_id);
		?>
		<div class="indents_part">
			<div class="indents_part_head">
				<div class="indent_Nom">
					服装：
					<span></span>
				</div>
			</div>
			<div class="indents_part_section">
				<div class="indent_inf">
					<img src="<?php echo Yii::app()->baseUrl.'/images/clothes/'.$clothes->picture;?>">
					<div class="indent_inf_all">
						<div class="indent_name" >
							<h2>名称:<?php echo $clothes->clothesname?></h2>
						</div>
						<div class="indent_buy">
							<span>租金：￥<?php echo $clothes->rent;?>/天</span>
							<span>押金：￥<?php echo $clothes->cash_pledge;?></span>
						</div>
					</div>
				</div>
				<div class="indent_do">
					<div class="indent_do_left">收藏时间:<?php echo $collect->create_time?></div>
					<div class="indent_do_right">
						<span>库存剩余：<?php echo $clothes->reserve?>件</span>
						<span>已售：<?php echo $clothes->sale_count?>件</span>
						<a  target="_blank" href="<?php echo $this->createUrl('clothes/view',array('id'=>$clothes->id))?>"><input type="button" class="btn" value="查看服装"></a>
						<a href="javascript:;" cid="<?php echo $collect->id?>" class="deletecollect"><input type="button" class="btn" value="删除"></a>
					</div>
				</div>
			</div>
		</div>
		<?php } elseif ($collect->good_type=='1') {
			$souvenir=Souvenir::model()->findByPk($collect->good_id);
		?>
		<div class="indents_part">
			<div class="indents_part_head" >
				<div class="indent_Nom">
					纪念品：
					<span></span>
				</div>
			</div>
			<div class="indents_part_section">
				<div class="indent_inf">
					<img src="<?php echo Yii::app()->baseUrl.'/images/souvenir/'.$souvenir->picture;?>">
					<div class="indent_inf_all">
						<div class="indent_name">
							<h2>名称:<?php echo $souvenir->name?></h2>
						</div>
						<div class="indent_buy">
							<span>价格：￥<?php echo $souvenir->price;?></span>
						</div>
					</div>
				</div>
				<div class="indent_do">
					<div class="indent_do_left">收藏时间:<?php echo date($collect->create_time)?></div>
					<div class="indent_do_right">
						<span>已售：<?php echo $souvenir->sale_count?>件</span>
						<a target="_blank" href="<?php echo $this->createUrl('souvenir/view',array('id'=>$souvenir->id))?>"><input type="button" class="btn" value="查看服装"></a>
						<a href="javascript:;" cid="<?php echo $collect->id?>" class="deletecollect"><input type="button" class="btn" value="删除"></a>
					</div>
				</div>
			</div>
		</div>			
		<?php }}?>

		<div class="pager" style="margin-left: 325px">
			<?php
			$this->
			widget('CLinkPager',array(
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
<!--account end-->
<?php }else{?>

<?php }?>