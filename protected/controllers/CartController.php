<?php

class CartController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/main';

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
				'actions'=>array('index','create','update','delete'),
				'users'=>array('@'),
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
		// 判断是否登陆
		if (Yii::app()->user->isGuest) {
			echo 0;
		}
		else{
			//获取post数据并解序列化
			$mycart=json_decode($_POST['goods']);
			//判断是否缺少参数
			if (empty($mycart['type']) || empty($mycart['cid']) || empty($mycart['num'])) {
				echo 2;
			}
			else{
				//判断参数是否为数字
				if (is_numeric($mycart['type']) && is_numeric($mycart['cid']) && is_numeric($mycart['num'])) {
				//若添加的是衣服
				if ($mycart['type']===0) {
					//若型号为空
					if (empty($mycart['model'])) {
						echo 2;
					}
					//存储数据
					else{
						$user=Yii::app()->user->id;
						$criteria=new CDbCriteria;
						$criteria->addCondition()='user_id=:user and $goods_id=:goods_id';
						$criteria->params[':user_id']=$user;
						$criteria->params['goods_id']=$mycart['cid'];
						$goods=Cart::model()->findAllByAttributes($criteria);
						//判断是否已经添加到购物车
						if (empty($goods)) {
							$onecart=new Cart;
							$onecart->user_id=$user;
							$onecart->size=$mycart['model'];
							$onecart->type=$mycart['type'];
							$onecart->amount=$mycart['num'];
							$onecart->goods_id=$mycart['goods_id'];
							if ($onecart->save()) {
								echo 1;
							}
						}
						//若已添加，则增加数据库中的数量
						else{
							$onecart->amount=$onecart->amount+$mycart['num'];
							if ($onecart->save()) {
								echo 1;
							}
						}
					}
				}
				//若为纪念品
				elseif ($mycart['type']===1) {
						$user=Yii::app()->user->id;
						$criteria=new CDbCriteria;
						$criteria->addCondition()='user_id=:user and $goods_id=:goods_id';
						$criteria->params[':user_id']=$user;
						$criteria->params['goods_id']=$mycart['cid'];
						$goods=Cart::model()->findAllByAttributes($criteria);
						if (empty($goods)) {
							$onecart=new Cart;
							$onecart->user_id=$user;
							$onecart->type=$mycart['type'];
							$onecart->amount=$mycart['num'];
							$onecart->goods_id=$mycart['goods_id'];
							if ($onecart->save()) {
								echo 1;
							}
						}
						else{
							$onecart->amount=$onecart->amount+$mycart['num'];
							if ($onecart->save()) {
								echo 1;
							}
						}
					}
				}
				else{
					echo 2;
				}
			}
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate()
	{

	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{	
		if (Yii::app()->user->isGuest) {
			echo 0;
		}
		else{
			$deleteinfo=json_decode($_POST['goods_delete']);
			if (empty($deleteinfo['cid'] || empty($deleteinfo['type']) )) {
				echo 2;
			}
		}
		$this->loadModel($id)->delete();

/*		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));*/
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$this->render('index');
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cart the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cart::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Cart $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cart-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
