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
				'actions'=>array('create'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('show','create','update','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionShow(){
		$clothes=Cart::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->id,'type'=>'0'));
		$souvenirs=Cart::model()->findAllByAttributes(array('user_id'=>Yii::app()->user->id,'type'=>'1'));
		$this->render('index',array(
			'clothes'=>$clothes,
			'souvenirs'=>$souvenirs,
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
			return;
		}
		else{
			//获取post数据并解序列化
			if (isset($_POST['goods'])) {
				//echo 'cid='.$_POST['goods']['cid'].';type='.$_POST['goods']['type'],';num='.$_POST['goods']['num'].';model='.$_POST['goods']['model'];die;
				$mycart['type']=$_POST['goods']['type'];
				$mycart['cid']=intval($_POST['goods']['cid']);
				$mycart['num']=intval($_POST['goods']['num']);
				$mycart['model']=$_POST['goods']['model'];
				//echo 'cid='.$mycart['cid'],';type='.$mycart['type'],';num='.$mycart['num'].';model='.$mycart['model'];die;
			//判断是否缺少参数
			if (isset($mycart['type']) && isset($mycart['cid']) && isset($mycart['num'])) {
				//判断参数是否为数字
				if (is_numeric($mycart['type']) && is_numeric($mycart['cid']) && is_numeric($mycart['num'])) {
				//若添加的是衣服
				if ($mycart['type']==='0') {
					//若衣服型号为空
					if (isset($mycart['model'])) {
						$user=Yii::app()->user->id;
						$criteria=new CDbCriteria;
						$criteria->condition='user_id='.$user.' and goods_id='.$mycart['cid'].' and size="'.$mycart['model'].'" and type=0';
						$goods=Cart::model()->findAll($criteria);
						//判断是否已经添加到购物车
						if (empty($goods)) {
							$onecart=new Cart;
							$onecart->user_id=$user;
							$onecart->size=$mycart['model'];
							$onecart->type=$mycart['type'];
							$onecart->amount=$mycart['num'];
							$onecart->goods_id=$mycart['cid'];
							if ($onecart->save()) {
								echo 1;
								return;
							}
							else{
								echo 4;
								return;
							}
						}
						//若已添加，则增加数据库中的数量
						else{
							// var_dump($goods[0]);die;
							$goods[0]->amount=$goods[0]->amount+$mycart['num'];
							if ($goods[0]->save()) {
								echo 1;
								return;
							}
							else{
								echo 4;
								return;
							}
						}
					}
					//返回错误信息
					else{
						echo 2;
						return;
					}
				}
				//若为纪念品
				if ($mycart['type']==='1') {
						$user=Yii::app()->user->id;
						$criteria=new CDbCriteria;
						$criteria->condition='user_id='.$user.' and goods_id='.$mycart['cid'].' and type=1';
						$goods=Cart::model()->findAll($criteria);
						//判断是否已经添加到购物车
						if (empty($goods)) {
							$onecart=new Cart;
							$onecart->user_id=$user;
							$onecart->type=$mycart['type'];
							$onecart->amount=$mycart['num'];
							$onecart->goods_id=$mycart['cid'];
							if ($onecart->save()) {
								echo 1;
								return;
							}
							else{
								echo 4;
								return;
							}
						}
						//若已添加，则增加数据库中的数量
						else{
							// var_dump($goods[0]);die;
							$goods[0]->amount=$goods[0]->amount+$mycart['num'];
							if ($goods[0]->save()) {
								echo 1;
								return;
							}
							else{
								echo 4;
								return;
							}
						}
					}
				}
				//参数不为数字
				else{
					echo 2;
					return;
				}
			}
			else{
				echo 2;
				return;
			}
		}
		else{
			echo 2;
			return;
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
			return;
		}
		else{
			$deleteinfo=json_decode($_POST['goods_delete']);
			if (empty($deleteinfo['cid']) || empty($deleteinfo['type']) ) {
				echo 2;
				return;
			}
		}
		$this->loadModel($id)->delete();
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
