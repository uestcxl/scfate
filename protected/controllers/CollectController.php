<?php

class CollectController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('create'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('update','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
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

		if(isset($_POST['Collect']))
		{
			$model->attributes=$_POST['Collect'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Collect the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Collect::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Collect $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='collect-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
