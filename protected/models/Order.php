<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $id
 * @property string $goods_name
 * @property integer $goods_id
 * @property double $price
 * @property integer $user_id
 * @property string $user_name
 * @property string $create_time
 * @property integer $goods_type
 * @property integer $order_status
 * @property string $message
 * @property string $express_id
 */
class Order extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('goods_name, goods_id, price, user_id, user_name, create_time, goods_type, order_status', 'required'),
			array('address_id,zgoods_id, user_id, goods_type, order_status', 'numerical', 'integerOnly'=>true),
			array('price', 'numerical'),
			array('goods_name, user_name', 'length', 'max'=>45),
			array('express_id', 'length', 'max'=>60),
			array('message', 'safe'),
			array('address_id'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, goods_name, goods_id, price, user_id, user_name, create_time, goods_type, order_status, message, express_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'goods_name' => 'Goods Name',
			'goods_id' => 'Goods',
			'price' => 'Price',
			'user_id' => 'User',
			'user_name' => 'User Name',
			'create_time' => 'Create Time',
			'goods_type' => 'Goods Type',
			'order_status' => 'Order Status',
			'message' => 'Message',
			'express_id' => 'Express',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('goods_name',$this->goods_name,true);
		$criteria->compare('goods_id',$this->goods_id);
		$criteria->compare('price',$this->price);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('goods_type',$this->goods_type);
		$criteria->compare('order_status',$this->order_status);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('express_id',$this->express_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
