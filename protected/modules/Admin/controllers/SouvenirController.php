<?php

class SouvenirController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='/layouts/column2';

	public $file;   	//upload files
	public $fileName;
	public $oldFile;

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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update','index','view'),
				'users'=>array(ADMIN),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Souvenir;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Souvenir']))
		{
			$model->attributes=$_POST['Souvenir'];
			//var_dump($_FILES);die;
			//判断是否上传，有上传则处理文件上传项目图标 调用父类中的上传文件方法
			($_FILES['Souvenir']['name']['picture'] != '') ? $this->UploadName($model, 'picture') : $i =1;
		
			if($model->save())
			{
				isset($i) ? $i='' : $this->moveFile();
				$this->redirect(array('view','id'=>$model->id));
				//$this->redirect(array('create'));
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
		$this->oldFile = $model->picture;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Souvenir']))
		{
			$model->attributes=$_POST['Souvenir'];
			//var_dump($_POST['Souvenir']);die;
			($_FILES['Souvenir']['name']['picture'] != '') ? $this->UploadName($model, 'picture') : $i =1;
	
				if (isset($this->oldFile)&& empty($_FILES['Food']['name']['picname'])) {
					$model->picname=$this->oldFile;
				}
	
			if($model->save()){
				//isset($i) ? $i='' : $this->moveFile();
				if(!isset($i)) 
				{
					$this->moveFile();
					$this->delFile($this->oldFile);
				}
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	/**
	* Deletes a particular model.
	* If deletion is successful, the browser will be redirected to the 'admin' page.
	* @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$model = $this->loadModel($id);
		$this->delFile($model->picture);
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}	

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Souvenir');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Souvenir('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Souvenir']))
			$model->attributes=$_GET['Souvenir'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Souvenir the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Souvenir::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Souvenir $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='souvenir-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
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
				$dir = Yii::app()->basePath."/../images/souvenir/".$this->fileName;
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
			$dir = Yii::app()->basePath."/../images/souvenir/".$file;
		else 
			$dir = $dir.$file;
		
		if(file_exists($dir)){
			unlink($dir);
		}
	}
}
