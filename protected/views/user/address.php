<?php
	$myaddress=Address::model()->findAllByAttributes(array('userid'=>Yii::app()->user->id));
?>
<div  class="lable">
	<span>ADDRESS</span>
	<span class="lable_Ch">我的地址</span>
	<span class="lable_El lable_El_some"></span>
</div>
<!--lable end-->
<!--account begin-->
<div class="account">
	<nav class="user_nav">
		<div id="nav_address" class="select" onclick="showBox('address','newAddress')"></div>
		<div id="nav_newAddress" class="no" onclick="showBox('newAddress','address')"></div>
	</nav>
	<div>
		<div id="nav_address_concent">
			<table>
				<tr style="border:0;">
					<th width="15%">收货人姓名</th>
					<th width="20%">所在地区</th>
					<th width="30%">详细地址</th>
					<th width="10%">邮政编码</th>
					<th width="10%" >联系电话</th>
					<th width="20%"></th>
				</tr>
				<?php foreach ($myaddress as $key => $address) :?>
				<tr>
					<td><?php echo strip_tags($address->receipter);?></td>
					<td><?php echo strip_tags($address->province).'省'.strip_tags($address->city).strip_tags($address->county)?></td>
					<td><?php echo strip_tags($address->detail)?></td>
					<td><?php echo strip_tags($address->zipcode)?></td>
					<td><?php echo strip_tags($address->phone)?></td>
					<td class= "table_right_button">
						<input type="button" value="编辑">
						<input type="button" value="删除">
					</td>
				</tr>
			<?php endforeach;?>
			</table>
		</div>
                            <?php $form=$this->beginWidget('CActiveForm', array(
                                   'id'=>'createaddress',
                                   'action'=>array('user/createaddress'),
                                   'enableAjaxValidation'=>false,
            	            )); ?>
			
		<div id="nav_newAddress_concent">
			<div>
				<form>
					<div class="form_part">
						<span>收货人姓名：</span>
						<input type="text" name="Address[receipter]">
						<span class="form_part_right">请填写您的真实姓名</span>		
					</div>
					
					<div class="form_part">
						<span>所在地区：</span>
						<select  name="province">
  							<option value ="none" >请选择</option>
  							  <?php foreach ($newsdata1 as $news1) :?>
  							<option value ="<?php echo $news1['area_name'];?>"><?php echo $news1['area_name'];?></option>
  							 <?php endforeach;?>
						</select>
						<select  name="city">
  							<option value ="none">请选择</option>
  							  <?php foreach ($newsdata2 as $news2) :?>
  							<option value ="<?php echo $news2['area_name'];?>"><?php echo $news2['area_name'];?></option>
  							 <?php endforeach;?>
						</select>
						<select  name="county">
  							<option value ="none">请选择</option>
  							  <?php foreach ($newsdata3 as $news3) :?>
  							<option value ="<?php echo $news3['area_name'];?>" ><?php echo $news3['area_name'];?></option>
  							 <?php endforeach;?>
						</select>

					</div>
					<div class="form_part">
						<span>详细地址：</span>
						<input type="text" name="Address[detail]">
						<span class="form_part_right">不必重复填写地区</span>
					</div>
					<div class="form_part">
						<span>邮政编码：</span>
						<input type="text" name="Address[zipcode]">
					</div>
			
					<div class="form_part">
						<span>手机号码：</span>
						<input type="text"  name="Address[phone]">
					</div>
					<div class="form_btn">
						<input type="submit" class="btn" value="保存地址">
					</div>
				</form>
			</div>
		</div>
		<?php $this->endWidget(); ?>
	</div>
</div>
<!--account end-->

