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
				'actions'=>array('show','second','create','update','delete','createorder','success'),
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
	public function actionDelete()
	{	
		if (Yii::app()->user->isGuest) {
			echo 0;
			return;
		}
		else{
			if (isset($_POST['goods_delete'])) {
					$delete=$_POST['goods_delete'];
					// 若类别是衣服
					$delete['type']=intval($delete['type']);
					$delete['cid']=intval($delete['cid']);
					if ($delete['type']===0) {
						if (isset($delete['model'])) {
							$criteria=new CDbCriteria;
							$criteria->condition="user_id=".Yii::app()->user->id.' and type=0 and size="'.$delete['model'].'" and goods_id='.$delete['cid'];
							$model=Cart::model()->find($criteria);
							if (empty($model)) {
								echo 3;
								return;
							}						
							else{
								if ($model->delete()) {
									echo 1;
									return;
								}
							}
						}
						else{
							echo 2;
							return;
						}
					}
					// 若种类为纪念品
					elseif ($delete['type']===1) {
							if (isset($delete['cid'])) {
							$criteria=new CDbCriteria;
							$criteria->condition="user_id=".Yii::app()->user->id.' and type=1 and goods_id='.$delete['cid'];
							$model=Cart::model()->find($criteria);
							if (empty($model)) {
								echo 3;
								return;
							}						
							else{
								if ($model->delete()) {
									echo 1;
									return;
								}
							}
						}
						else{
							echo 2;
							return;
						}
					}
				}
			}
	}

	// 购物车，确认收货地址页面
	public function actionSecond(){
		$address=Address::model()->findAllByAttributes(array('userid'=>Yii::app()->user->id));
		$this->render('second',array(
				'address'=>$address
			));
	}

	//购买函数
	public function actionCreateorder(){
		//判断是否登录
		if (Yii::app()->user->isGuest) {
			echo 0;
			return;
		}
		else{
			if (isset($_POST['goods'])) {
				$goods=json_decode($_POST['goods']); //每一个值都是对象
				$infor=array_pop($goods);
				$address_id=$infor->address;
				$message=$infor->eidt_text;
				$length=count($goods);
				$count=0;				//用作计数，保证每件物品都已保存并从购物车中删除
				// print_r($goods);die;

				$user_name=Yii::app()->user->name;
				$user_id=Yii::app()->user->id;
				foreach ($goods as $onegoods) {
					//如果是衣服
					if ($onegoods->type==='0') {
						$clothes=Clothes::model()->findByPk($onegoods->cid);
						$oneorder=new Order;

						$oneorder->goods_id=$onegoods->cid;
						$oneorder->amount=$onegoods->num;
						$oneorder->size=$onegoods->model;

						$oneorder->goods_name=$clothes->clothesname;
						$oneorder->price=intval($clothes->rent)*intval($onegoods->num);

						$oneorder->user_id=$user_id;
						$oneorder->user_name=$user_name;
						$oneorder->message=$message;
						$oneorder->address_id=$address_id;
						$oneorder->goods_type=0;
						$oneorder->order_status=0;

						if ($oneorder->save()) {
							$criteria=new CDbCriteria;
							$criteria->condition="user_id=".Yii::app()->user->id.' and type=0 and size="'.$onegoods->model.'" and goods_id='.$onegoods->cid;
							$model=Cart::model()->find($criteria);
							if ($model->delete()) {
								++$count;
							}
/*							$sql="select amount from scfate.order where goods_id=".$clothes->id." and goods_type=0";
							$command=Yii::app()->db->createCommand($sql);
							$amounts=$command->queryAll();
							$total=0;
							foreach ($amounts as $key => $amount) {
								$total+=$amount[$key];
							}*/
							$clothes->sale_count+=$onegoods->num;
							$clothes->save();
						}
					}
					//如果是纪念品
					elseif ($onegoods->type==='1') {
						$souvenir=Souvenir::model()->findByPk($onegoods->cid);
						$oneorder=new Order;

						$oneorder->goods_id=$onegoods->cid;
						$oneorder->amount=$onegoods->num;
						$oneorder->size=$onegoods->model;

						$oneorder->goods_name=$souvenir->name;
						$oneorder->price=$souvenir->reduce_price*intval($onegoods->num);

						$oneorder->user_id=$user_id;
						$oneorder->user_name=$user_name;
						$oneorder->message=$message;
						$oneorder->address_id=$address_id;
						$oneorder->goods_type=1;
						$oneorder->order_status=0;
						if ($oneorder->save()) {
							$criteria=new CDbCriteria;
							$criteria->condition="user_id=".Yii::app()->user->id.' and type=1 and goods_id='.$onegoods->cid;
							$model=Cart::model()->find($criteria);
							if ($model->delete()) {
								++$count;
							}
							$souvenir->sale_count+=$onegoods->num;
							$souvenir->save();
						}
					}
				}
				//判断是否已经完全遍历
				if ($count===$length) {
					echo 2;
					return;
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
	}

	//订单成功页面
	public function actionSuccess(){
		$this->render('success');
	}
}
