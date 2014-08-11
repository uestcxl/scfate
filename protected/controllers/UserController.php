<?php
	class UserController extends Controller
		{
		/**
		* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
		* using two-column layout. See 'protected/views/layouts/column2.php'.
		*/
		public $layout='//layouts/user';
		public $verifyCode;
		
		public $file;   	//upload files
		public $fileName;
		public $oldFile;
		/**
		* @return array action filters
		*/
		public function filters(){
			return array(
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete', // we only allow deletion via POST request
			);
		}
		/**
		* Specifies the access control rules.
		* This method is used by the 'accessControl' filter.
		* @return array access control rules
		*/
		public function accessRules(){
			return array(
			/* array('allow', // allow all users to perform 'index' and 'view' actions
			'actions'=>array('index','view'),
			'users'=>array('*'),
			),*/
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','createcollect'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','changpassword','changeziliao','address','order','album','vieworder','createaddress','changepic','collect','orderdetail'),
				'users'=>array('@'),
			),
			array('allow',
				'actions'=>array('captcha'),
				'users'=>array('*'),
			),
			array('deny', // deny all users
				'users'=>array('*'),
			),
			);
		}
		
		/**
		* Creates a new model.
		* If creation is successful, the browser will be redirected to the 'view' page.
		*/
		public function actionCreate(){
			$this->layout='//layouts/column1';
			$model=new User;
			if(isset($_POST['User']))
			{
				if ($_POST['User']['password']==$_POST['User']['password_repeat']) {
					$model->attributes=$_POST['User'];
					$someone=User::model()->findByAttributes(array('username'=>$model->username));
						if ($someone==null) {
							if($model->save()){
							echo "<meta charset='utf8'/><script type='text/javascript'>
								alert('注册成功! 确定并返回登陆页面。');
								window.location.href = '".$this->createUrl('site/login')."';
								</script>";
								}
						}
				else{
					echo "<meta charset='utf8'/><script type='text/javascript'>
							alert('用户名已被使用!');
							window.location.href = '".$this->createUrl('user/create')."';
							</script>";
					}
				}
			else{
				echo "<meta charset='utf8'/><script type='text/javascript'>
						alert('两次输入的密码不相同!');
						window.location.href = '".$this->createUrl('user/create')."';
					</script>";
			}
		}
		$this->render('create',array(
			'model'=>$model,
		));
		}
		/**
		* Updates a particular model.
		* If update is successful, the browser will be redirected to the 'view' page.
		* @param integer $id the ID of the model to be updated
		*/
		public function actionUpdate($id)
		{
		$model=$this->loadModel($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
			}
			$this->render('update',array(
				'model'=>$model,
			));
		}
		
		
		/**
		* 个人中心首页
		*/
			public function actionIndex(){
				$model=$this->loadModel(Yii::app()->user->id);
				$me=User::model()->findByPk(Yii::app()->user->id);
				$this->render('index',array('model'=>$model,'me'=>$me));
			}
		
		
		/**
		* Returns the data model based on the primary key given in the GET variable.
		* If the data model is not found, an HTTP exception will be raised.
		* @param integer $id the ID of the model to be loaded
		* @return User the loaded model
		* @throws CHttpException
		*/
	public function loadModel($id)
		{
			$model=User::model()->findByPk($id);
			if($model===null)
				throw new CHttpException(404,'The requested page does not exist.');
			return $model;
		}
		/**
		* Performs the AJAX validation.
		* @param User $model the model to be validated
		*/
		protected function performAjaxValidation($model)
		{
			if(isset($_POST['ajax']) && $_POST['ajax']==='user-form')
			{
				echo CActiveForm::validate($model);
				Yii::app()->end();
			}
		}

	public function actions(){
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
				'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
				'maxLength'=>'4', // 最多生成几个字符
				'minLength'=>'4', // 最少生成几个字符
				'height'=>'40',
				'width'=>'100',
				),
			);
		}
		public function actionchangpassword(){
		             
			$id=Yii::app()->user->id;
		
			$model=User::model()->findByPk($id);
		
			if (isset($_POST['User'])) {
				$password=$_POST['User']['password'];
				$password1=$_POST['User']['password1'];
				$password2=$_POST['User']['password2'];
				if (!empty($password) && !empty($password1)&&!empty($password2) ){
					# code...
				
				if (md5($password)==$model->password) {
					if ($password1==$password2) {
						$model->password=md5($password1);
						if ($model->save()) {
							echo "<meta charset='utf8'/><script type='text/javascript'>
									alert('修改密码成功!');
									window.location.href = '".$this->createUrl('user/index')."';
								</script>";	
						}
					}else{
								echo "<meta charset='utf8'/><script type='text/javascript'>
									alert('两次输入密码不同!');
									window.location.href = '".$this->createUrl('user/index')."';
								</script>";	
					}
				}else{
						echo "<meta charset='utf8'/><script type='text/javascript'>
									alert('两次输入密码不同!');
									window.location.href = '".$this->createUrl('user/index')."';
								</script>";	
				}
			}else{
				echo "<meta charset='utf8'/><script type='text/javascript'>
									alert('密码不能为空!');
									window.location.href = '".$this->createUrl('user/index')."';
								</script>";	
			}
		}
		}
		
		 public function actionchangeziliao(){
		             
			$id=Yii::app()->user->id;
		
		
			$model=User::model()->findByPk($id);
		
			if (isset($_POST['User'])) {
				
				$mail=$_POST['User']['mail'];
				$name=$_POST['User']['name'];
				$QQ=$_POST['User']['QQ'];
				$phone=$_POST['User']['phone'];
		
		
				if (!empty($mail)&&!empty($phone) && !empty($QQ)&&!empty($name)){
				
					$model->mail=$mail;
					
					$model->username=$model->username;
					
					$model->password=$model->password;
					$model->name=$name;
					$model->QQ=$QQ;
					$model->phone=$phone;
					if ($model->save()) {
						echo "修改成功";
						
					}
			             }
		             }
		    }
		
		
		    // user address page
		
		public function actionAddress(){
		    	$model=$this->loadModel(Yii::app()->user->id);	
		    	
		    	$newsdata1=Area::model()->findAllByAttributes(array('parent_id'=>1));
		    	
		    	$newsdata2=Area::model()->findAllByAttributes(array('parent_id'=>2));
		    	$newsdata3=Area::model()->findAllByAttributes(array('parent_id'=>3));
		    	$this->render('address',array(
		    		'model'=>$model,
		    	                'newsdata1'=>$newsdata1,
		                                'newsdata2'=>$newsdata2,
		                                'newsdata3'=>$newsdata3,
		                                )
		                        
		    	);
		    }
		
		public function actionCreateaddress(){
			$id=Yii::app()->user->id;
			$model=new  Address;
		
			if (isset($_POST['Address'])) {
				
				
				$receipter=$_POST['Address']['receipter'];
				$province=$_POST['province'];
				$city=$_POST['city'];
				$detail=$_POST['Address']['detail'];
				$zipcode=$_POST['Address']['zipcode'];
				$county=$_POST['county'];
				
				$phone=$_POST['Address']['phone'];
				if (!empty($receipter) && !empty($province)&&!empty($phone) && !empty($city)&&!empty($detail)&&!empty($zipcode)&&!empty($county)){
				
					$model->receipter=$receipter;
					$model->province=$province;
					$model->detail=$detail;
					$model->city=$city;
					$model->zipcode=$zipcode;
					$model->phone=$phone;
					$model->county=$county;
					$model->userid=$id;
		
					if ($model->save()){
						$this->redirect(array('address'));
					}
			             }
		             }
		    }
		
		    //user order page
		
		public function actionOrder(){
			$criteria=new CDbCriteria;
			$criteria->condition='user_id='.Yii::app()->user->id;
			$count=Order::model()->count($criteria);

			$pager=new CPagination($count);
			$pager->pageSize=5;
			$pager->applyLimit($criteria);
			$orders=Order::model()->findAll($criteria);

			$this->render('order',array('orders'=>$orders,'pages'=>$pager));
		}
		
		//user ablum page
		
		public function actionAlbum(){
			$model=$this->loadModel(Yii::app()->user->id);
			$this->render('album',array('model'=>$model));
		}
		
		//view detail order
		
		public function actionVieworder(){
			$this->render('vieworder');
		}
		
		//change the user picture
		public function actionChangepic(){
			$model=$this->loadModel(Yii::app()->user->id);
			if (!empty($model->picture)) {
				$this->oldFile = $model->picture;
				// Uncomment the following line if AJAX validation is needed
				// $this->performAjaxValidation($model);
				if(isset($_POST['User']))
				{
					$model->attributes=$_POST['User'];
					//var_dump($_POST['User']);die;
					($_FILES['User']['name']['picture'] != '') ? $this->UploadName($model, 'picture') : $i =1;
						/*if (isset($this->oldFile)&& empty($_FILES['Food']['name']['picture'])) {
							$model->picture=$this->oldFile;
						}*/
					if($model->save()){
						//isset($i) ? $i='' : $this->moveFile();
						if(!isset($i)) 
						{
							$this->moveFile();
							$this->delFile($this->oldFile);
							echo "<script type='text/javascript'>
									alert('uploaded~');
									window.location.href = '".$this->createUrl('user/index')."';
								</script>";
						}
					}
				}
			}
			else{
				if(isset($_POST['User']))
					{
						$model->attributes=$_POST['User'];
						//var_dump($_FILES);die;
						//判断是否上传，有上传则处理文件上传项目图标 调用父类中的上传文件方法
						($_FILES['User']['name']['picture'] != '') ? $this->UploadName($model, 'picture') : $i =1;
					
						if($model->save())
						{
							isset($i) ? $i='' : $this->moveFile();
							echo "<script type='text/javascript'>
									alert('update ok');
									window.location.href = '".$this->createUrl('user/index')."';
								</script>";
						}
					}
			}
		}

	public function actionCollect(){
		$clothes=Collect::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->id,'good_type'=>0));
		$souvenirs=Collect::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->id,'good_type'=>1));
		$this->render('collect');
	}

	/**
	* 为上传文件命名
	* @param $myAttribute 上传文件的字段名
	 */
	public function UploadName(&$model, $myAttribute)
	{
		$this->file = CUploadedFile::getInstance($model, $myAttribute);
		$suffix = $this->file->getExtensionName();		//获取文件后缀名
		//var_dump($suffix);die;
		$this->fileName = time().'.'.$suffix;            //$this->fileName 在下面moveFile方法中要用
		$model->$myAttribute = $this->fileName;
	}
	
	/**
	* 移动上传文件至指定路径
	* $dir 格式示例：  movefile('/var/www/file/')
	* 不传参数默认为 images目录
	 */
	public function moveFile($dir='')
	{
		if(is_object($this->file) && get_class($this->file)==='CUploadedFile'){
			if($dir=='') 
				$dir = Yii::app()->basePath."/../images/user/".$this->fileName;
			else 
				$dir .= $this->fileName;
			
			$this->file->saveAs($dir);
			chmod($dir, 0776);
		}
	}
	
	/**
	* 删除文件
	* $file 文件名
	* $dir 文件所在路径名
	 */
	public function delFile($file,$dir='')
	{
		if($dir == '')
			$dir = Yii::app()->basePath."/../images/user/".$file;
		else 
			$dir = $dir.$file;
		
		if(file_exists($dir)){
			unlink($dir);
		}
	}

	// 添加收藏夹
	public function actionCreatecollect(){
		// 判断是否登陆
		if (Yii::app()->user->isGuest) {
			echo 0;
			return;
		}
		else{
			if (isset($_POST['collect'])) {
				$collects=$_POST['collect'];
				//判断参数是否都为数字
				if (is_numeric($collects['type']) && is_numeric($collects['cid'])) {
					$model=Collect::model()->findByAttributes(array('user_id'=>Yii::app()->user->id,'good_type'=>$collects['type'],'good_id'=>$collects['cid']));
					if (empty($model)) {
						$goods=new Collect;
						$goods->user_id=Yii::app()->user->id;
						$goods->good_id=$collects['cid'];
						$goods->good_type=$collects['type'];
						$goods->create_time=date('Y-m-d H:i');
						if ($goods->save()) {
							echo 2;
							return;
						}
						else{
							echo 1;
							return;
						}
					}	
					else{
						echo 3;
						return;
					}			
				}
				else{
					echo 1;
					return;
				}
			}
			else{
				echo 1;
				return;
			}
		}
	}

	protected function getOrderStatus($type,$status){
		//如果是衣服
		if ($type=='0') {
			switch ($status) {
				case '0':
					return '订单成功正在配送~~Orz';
					break;

				case '1':
					return '衣服配送成功！等待您的归还~';
					break;			

				case '2':
					return '衣服返回成功！交易完成！';
					break;

				default:
					return '出了一点小问题!';
					break;
			}
		}
		//如果是纪念品
		elseif ($type=='1') {
			switch ($status) {
				case '0':
					return '订单成功！等待发货~请耐心等待';
					break;
				
				case '1':
					return '快递小哥正在送货中';
					break;

				case '2':
					# code...
					return '交易完成！';
					break;
				default:
					return '出了一点小问题!';
					break;
			}
		}
	}


	//订单详细页面
	public function actionOrderdetail($id)	{
		$order=Order::model()->findByPk($id);
		if (empty($order)) {
			$this->redirect(array('site/about'));
		}
		else{
			if ($order->user_id===Yii::app()->user->id) {
				$this->render('orderdetail',array('order'=>$order));
			}
			else{
				throw new CHttpException(403,'The requested page does not exist.');
			}
		}
	}
} 