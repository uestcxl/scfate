<!--lable begin-->
<div  class="lable">
	<span>MY ALBUM</span>
	<span class="lable_Ch">我的相册</span>
	<span class="lable_El lable_El_some"></span>
</div>
<!--lable end-->
<!--address begin-->
<div class="photo">
	<nav class="user_nav">
		<div id="nav_myPhoto" class="select" onclick="showBox('myPhoto','newPhoto')"></div>
		<div id="nav_newPhoto" class="no" onclick="showBox('newPhoto','myPhoto')"></div>
	</nav>
	<div>
		<div id="nav_myPhoto_concent">
			<div class="all_album_part">
				<div class="sigle_part">
					<div class="sigle_part_photo">
						<a><img src=""></a>
					</div>
					<p>相册名字</p>
					<p><span><a>编辑</a></span><span><a>上传</a></span></p>
				</div>
				<div class="sigle_part">
					<div class="sigle_part_photo">
						<a><img src=""></a>
					</div>
					<p>相册名字</p>
					<p><span><a>编辑</a></span><span><a>上传</a></span></p>
				</div>
				<div class="sigle_part">
					<div class="sigle_part_photo">
						<a><img src=""></a>
					</div>
					<p>相册名字</p>
					<p><span><a>编辑</a></span><span><a>上传</a></span></p>
				</div>
				<div class="sigle_part">
					<div class="sigle_part_photo">
						<a><img src=""></a>
					</div>
					<p>相册名字</p>
					<p><span><a>编辑</a></span><span><a>上传</a></span></p>
				</div>
				<div class="sigle_part">
					<div class="sigle_part_photo">
						<a><img src=""></a>
					</div>
					<p>相册名字</p>
					<p><span><a>编辑</a></span><span><a>上传</a></span></p>
				</div>
			</div>
			<div class="all_album_part">
				<div class="sigle_part">
					<div class="sigle_part_photo">
						<a><img src=""></a>
					</div>
					<p>相册名字</p>
					<p><span><a>编辑</a></span><span><a>上传</a></span></p>
				</div>
				<div class="sigle_part">
					<div class="sigle_part_photo">
						<a><img src=""></a>
					</div>
					<p>相册名字</p>
					<p><span><a>编辑</a></span><span><a>上传</a></span></p>
				</div>
				<div class="sigle_part">
					<div class="sigle_part_photo">
						<a><img src=""></a>
					</div>
					<p>相册名字</p>
					<p><span><a>编辑</a></span><span><a>上传</a></span></p>
				</div>
				<div class="sigle_part">
					<div class="sigle_part_photo">
						<a><img src=""></a>
					</div>
					<p>相册名字</p>
					<p><span><a>编辑</a></span><span><a>上传</a></span></p>
				</div>
				<div class="sigle_part">
					<div class="sigle_part_photo">
						<a><img src=""></a>
					</div>
					<p>相册名字</p>
					<p><span><a>编辑</a></span><span><a>上传</a></span></p>
				</div>
			</div>
			<div class="all_album_part">
				<div class="sigle_part">
					<div class="sigle_part_photo">
						<a><img src=""></a>
					</div>
					<p>相册名字</p>
					<p><span><a>编辑</a></span><span><a>上传</a></span></p>
				</div>
				<div class="sigle_part">
					<div class="sigle_part_photo">
						<a><img src=""></a>
					</div>
					<p>相册名字</p>
					<p><span><a>编辑</a></span><span><a>上传</a></span></p>
				</div>
				<div class="sigle_part">
					<div class="sigle_part_photo">
						<a><img src=""></a>
					</div>
					<p>相册名字</p>
					<p><span><a>编辑</a></span><span><a>上传</a></span></p>
				</div>
				<div class="sigle_part">
					<div class="sigle_part_photo">
						<a><img src=""></a>
					</div>
					<p>相册名字</p>
					<p><span><a>编辑</a></span><span><a>上传</a></span></p>
				</div>
				<div class="sigle_part">
					<div class="sigle_part_photo">
						<a><img src=""></a>
					</div>
					<p>相册名字</p>
					<p><span><a>编辑</a></span><span><a>上传</a></span></p>
				</div>
			</div>
			
			<div class="pag">
				<input type="button" class="Last">
				<span class="select">1</span>
				<span class="normal">2</span>
				<span class="normal">3</span>
				<span class="select">…</span>
				<span class="normal">5</span>
				<input type="button" class="Next">
			</div>
		</div>
		<div id="nav_newPhoto_concent">
			<form>
				<div class="choose_photo">
					<h2>1.选择图片</h2>
					<p>从电脑中选择你要上传的图片</p>
					<p>提示，选择图片后，您可以继续选择图片，这样就可以一次上传多张了</p>
					<form>
					<iframe src="<?php echo Yii::app()->baseUrl?>/html/html/choose_photo.html"></iframe>
						<div>
							<input type="submit" value="选择文件上传" class="Photo_btn">
						</div>
					</form>
				</div>
				<div class="choose_album">
					<h2>2.选择相册</h2>
					<div>
						<input type="radio" name="album_choose" id="nav_chooseAlbum" onclick="showBox(	'chooseAlbum','newAlbum')">添加到现有相册
						<input type="radio" name="album_choose" id="nav_newAlbum" onclick="showBox('newAlbum','chooseAlbum')">创建新相册
					</div>
					<div id="nav_chooseAlbum_concent">
						<div>
							<span>选择相册</span>
							<select>
								<option>其他相册</option>
								<option>我的相册</option>
							</select>
						</div>
					</div>
					<div id="nav_newAlbum_concent">
					
						<div>
							<span>相册名</span>
							<input type="text">
						</div>
						<div>
							<span>相册描述</span>
							<textarea></textarea>
						</div>
						<div>
							<span>隐私设置</span>
							<select>
								<option>所有人可见</option>
								<option>仅自己可见</option>
							</select>
						</div>
					</div>
					<div>
						<input type="submit" value="开始上传" class="Photo_btn">
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!--account end-->