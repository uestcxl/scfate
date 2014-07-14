
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
					<th width="15%">所在地区</th>
					<th width="30%">详细地址</th>
					<th width="10%">邮政编码</th>
					<th width="10%" >联系电话</th>
					<th width="20%"></th>
				</tr>
				<tr>
					<td>张三丰</td>
					<td>四川省成都市</td>
					<td>高新西区西源大道2006号</td>
					<td>123456</td>
					<td>12345678901</td>
					<td class= "table_right_button">
						<input type="button" value="编辑">
						<input type="button" value="删除">
					</td>
				</tr>
			</table>
		</div>
		<div id="nav_newAddress_concent">
			<div>
				<form>
					<div class="form_part">
						<span>收货人姓名：</span>
						<input type="text">
						<span class="form_part_right">请填写您的真实姓名</span>		
					</div>
					
					<div class="form_part">
						<span>所在地区：</span>
						<select>
  							<option value ="none">请选择</option>
  							<option value ="sichuan">四川省</option>
						</select>
						<select>
  							<option value ="none">请选择</option>
  							<option value ="成都">成都市</option>
						</select>
					</div>
					<div class="form_part">
						<span>详细地址：</span>
						<input type="text">
						<span class="form_part_right">不必重复填写地区</span>
					</div>
					<div class="form_part">
						<span>邮政编码：</span>
						<input type="text">
					</div>
					<div class="form_part">
						<span>电话号码：</span>
						<input type="text">
						<span class="form_part_right">区号-电话号码-分号</span>
					</div>
					<div class="form_part">
						<span>手机号码：</span>
						<input type="text" >
					</div>
					<div class="form_btn">
						<input type="submit" class="btn" value="保存地址">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!--account end-->

