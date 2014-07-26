<?php

class ClothesController extends Controller
{

	public $layout='//layouts/clothes';

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
		$count=Clothes::model()->count($criteria);

		$pager=new CPagination($count);
		$pager->pageSize=15;
		$pager->applyLimit($criteria);

		$clothes=Clothes::model()->findAll($criteria);
		$this->render('index',array('pages'=>$pager,'clothes'=>$clothes));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Clothes the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Clothes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Clothes $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='clothes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	public function actionSort($sort=null,$type=null){
		$layout='//layouts/clothes';
		if (empty($type)) {
			$criteria=new CDbCriteria;
			$criteria->addCondition("sort_id=:sort");
			$criteria->params[':sort']=$sort;
			$count=Clothes::model()->count($criteria);
	
			$pager=new CPagination($count);
			$pager->pageSize=15;
			$pager->applyLimit($criteria);
	
			$clothes=Clothes::model()->findAll($criteria);
			$this->render('sort',array('clothes'=>$clothes,'pages'=>$pager,'sort'=>$sort));
		}
		else{
			switch ($type) {
				case '0':
					$sorttype='rent';
					break;

				case '1':
					$sorttype='sale_count';
					break;
				
				default:
					$sorttype='sale_count';
					break;
			}
			if (empty($sort)) {
				$criteria=new CDbCriteria;
				$criteria->order=$sorttype;
				$count=Clothes::model()->count($criteria);
		
				$pager=new CPagination($count);
				$pager->pageSize=15;
				$pager->applyLimit($criteria);
		
				$clothes=Clothes::model()->findAll($criteria);
				$this->render('sort',array('clothes'=>$clothes,'pages'=>$pager,'type'=>$type));
			}
			else{
				$criteria=new CDbCriteria;
				$criteria->order=$sorttype;
				$count=Clothes::model()->count($criteria);
				$criteria->addCondition("sort_id=:sort");
				$criteria->params[':sort']=$sort;
		
				$pager=new CPagination($count);
				$pager->pageSize=15;
				$pager->applyLimit($criteria);
		
				$clothes=Clothes::model()->findAll($criteria);
				$this->render('sort',array('clothes'=>$clothes,'pages'=>$pager,'type'=>$type,'sort'=>$sort));
			}
		}
	}
}
