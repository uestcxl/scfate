<?php

/**
 * This is the model class for table "cart".
 *
 * The followings are the available columns in table 'cart':
 * @property integer $id
 * @property integer $user_id
 * @property integer $goods_id
 * @property integer $type
 * @property string $size
 * @property integer $amount
 * @property string $create_time
 */
class Cart extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cart';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, goods_id, type, amount', 'numerical', 'integerOnly'=>true),
			array('size', 'length', 'max'=>40),
			array('create_time', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, goods_id, type, size, amount, create_time', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'goods_id' => 'Goods',
			'type' => 'Type',
			'size' => 'Size',
			'amount' => 'Amount',
			'create_time' => 'Create Time',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('goods_id',$this->goods_id);
		$criteria->compare('type',$this->type);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('create_time',$this->create_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cart the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave(){
		if (parent::beforeSave()) {
			if (isset($this->create_time)) {
				return true;
			}
			else{
				$this->create_time=date('Y-m-d H:i');
				return true;
			}
		}
		else{
			return false;
		}
	}
}
