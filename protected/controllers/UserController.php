<?php
class UserController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/user';
public $verifyCode;
/**
* @return array action filters
*/
public function filters()
{
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
public function accessRules()
{
return array(
/* array('allow', // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view'),
'users'=>array('*'),
),*/
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create',),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('index','changpassword','changeziliao','address','order','album','vieworder','createaddress'),
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
public function actionCreate()
{
$model=new User;
if(isset($_POST['User']))
{
if ($_POST['User']['password']==$_POST['User']['password_repeat']) {
$model->attributes=$_POST['User'];
$someone=User::model()->findByAttributes(array('username'=>$model->username));
if ($someone==null) {
if($model->save()){
echo "<script type='text/javascript'>
alert('注册成功! 确定并返回登陆页面。');
window.location.href = '../site/login';
</script>";
}
}
else{
echo "<script type='text/javascript'>
alert('用户名已被使用!');
window.location.href = '".$this->createUrl('user/create')."';
</script>";
}
}
else{
echo "<script type='text/javascript'>
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
* Lists all models.
*/
	public function actionIndex(){
		$model=$this->loadModel(Yii::app()->user->id);
		$this->render('index',array('model'=>$model));
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
					echo "修改密码成功";	
				}
			}else{
				echo "两次输入密码不同";
			}
		}else{
				
				echo "原密码不对";
		}
	}else{
		echo "密码不能为空";
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

		if (!empty($username) && !empty($mail)&&!empty($phone) && !empty($QQ)&&!empty($name)){
		
			$model->mail=$mail;
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
				
				echo "修改成功";
			}
	             }
             }
    }

    //user order page

    public function actionOrder(){
    	$model=$this->loadModel(Yii::app()->user->id);
    	$this->render('order',array('model'=>$model));
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
} 