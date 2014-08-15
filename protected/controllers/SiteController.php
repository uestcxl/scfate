<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','error','about','search','login'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('logout'),
				'users'=>array('@'),
			),
			array('deny',
				'actions'=>array('login'),
				'users'=>array('@'),
				),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$criteria=new CDbCriteria;
		$criteria->limit=5;
		$criteria->order='create_time desc';
		$criteria->addCondition("view=1");

		$connection=Yii::app()->db;
		// $sql='select * from photographs as r1 join(select (rand()*(select max(id) from photographs)) as id) as r2 where r1.id>=r2.id order by r1.id asc limit 4;';
		$sql='select * from photographs order by rand() limit 4';
		$command=$connection->createCommand($sql);
		$works=$command->queryAll();

		$indexpics=Indexpic::model()->findAll($criteria);
		$this->render('index',array('indexpics'=>$indexpics,'works'=>$works));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}


	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{	
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect($this->createUrl('site/index'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionAbout(){
		$this->render('about');
	}

	public function actionSearch(){
		if (!empty($_POST['search_content'])) {
			$search_content=mysql_real_escape_string($_POST['search_content']);
			$sql="select id,clothesname as name,@type:='0' as type,picture from clothes where clothesname like '%".$search_content."%' union select id,name,@type:='1',picture from souvenir where name like '%".$search_content."%';";
			$command=Yii::app()->db->createCommand($sql);
			$results=$command->queryAll();
			$this->render('result',array('results'=>$results));
		}
		else{
			echo "<meta charset='utf8'/><script type='text/javascript' language='javascript'>
						alert('请填写您想搜索的内容！Orz');
						history.go(-1);
				</script>";
		}
	}
}


