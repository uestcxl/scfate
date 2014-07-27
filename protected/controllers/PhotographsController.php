<?php

class PhotographsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/photographs';

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
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
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
		$count=Photographs::model()->count($criteria);

		$pager=new CPagination($count);
		$pager->pageSize=6;
		$pager->applyLimit($criteria);

		$photographs=Photographs::model()->findAll($criteria);
		$this->render('index',array('pages'=>$pager,'photographs'=>$photographs));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Photographs the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Photographs::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Photographs $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='photographs-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionSort($sort=null){
		if (is_numeric($sort)) {
			$criteria=new CDbCriteria;
			$criteria->addCondition('sort_id=:sort');
			$criteria->params[':sort']=$sort;
			$count=Photographs::model()->count($criteria);
	
			$pager=new CPagination($count);
			$pager->pageSize=6;
			$pager->applyLimit($criteria);
	
			$photographs=Photographs::model()->findAll($criteria);
			$this->render('sort',array('pages'=>$pager,'photographs'=>$photographs));
		}
		else{
			$this->redirect('index');
		}
	}
}
