<?php

class SouvenirController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/souvenir';

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','sort'),
				'users'=>array('*'),
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
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$criteria=new CDbCriteria;
		$count=Souvenir::model()->count($criteria);

		$pager=new CPagination($count);
		$pager->pageSize=6;
		$pager->applyLimit($criteria);

		$souvenir=Souvenir::model()->findAll($criteria);
		$this->render('index',array('pages'=>$pager,'souvenir'=>$souvenir));
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

	public function actionSort($sort=null,$type=null){
		if ($type===0) {
			$criteria=new CDbCriteria;
			$criteria->addCondition("sort_id=:sort");
			$criteria->params[':sort']=$sort;
			$count=Souvenir::model()->count($criteria);
	
			$pager=new CPagination($count);
			$pager->pageSize=6;
			$pager->applyLimit($criteria);
	
			$souvenir=Souvenir::model()->findAll($criteria);
			$this->render('sort',array('pages'=>$pager,'souvenir'=>$souvenir));
		}
		elseif ($type===1) {
			$criteria=new CDbCriteria;
			$criteria->addCondition("school_id=:sort");
			$criteria->params[':sort']=$sort;
			$count=Souvenir::model()->count($criteria);
	
			$pager=new CPagination($count);
			$pager->pageSize=6;
			$pager->applyLimit($criteria);
	
			$souvenir=Souvenir::model()->findAll($criteria);
			$this->render('sort',array('pages'=>$pager,'souvenir'=>$souvenir));
		}
		else{
			$criteria=new CDbCriteria;
			$count=Souvenir::model()->count($criteria);
	
			$pager=new CPagination($count);
			$pager->pageSize=6;
			$pager->applyLimit($criteria);
	
			$souvenir=Souvenir::model()->findAll($criteria);
			$this->render('index',array('pages'=>$pager,'souvenir'=>$souvenir));
		}
	}
}
