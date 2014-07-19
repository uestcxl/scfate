<?php

/**
 * This is the model class for table "clothes".
 *
 * The followings are the available columns in table 'clothes':
 * @property integer $id
 * @property string $clothesname
 * @property integer $rent
 * @property integer $cash_pledge
 * @property integer $reserve
 * @property integer $sort_id
 * @property string $description
 * @property string $picture
 * @property integer $comment_count
 * @property integer $sale_count
 * @property string $size
 */
class Clothes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'clothes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('clothesname, rent, cash_pledge, reserve, sort_id, description, picture, size', 'required'),
			array('rent, cash_pledge, reserve, sort_id, comment_count, sale_count', 'numerical', 'integerOnly'=>true),
			array('clothesname', 'length', 'max'=>45),
			array('picture', 'length', 'max'=>100),
			array('size', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, clothesname, rent, cash_pledge, reserve, sort_id, description, picture, comment_count, sale_count, size', 'safe', 'on'=>'search'),
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
			'clothesname' => 'Clothesname',
			'rent' => 'Rent',
			'cash_pledge' => 'Cash Pledge',
			'reserve' => 'Reserve',
			'sort_id' => 'Sort',
			'description' => 'Description',
			'picture' => 'Piture',
			'comment_count' => 'Comment Count',
			'sale_count' => 'Sale Count',
			'size' => 'Size',
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
		$criteria->compare('clothesname',$this->clothesname,true);
		$criteria->compare('rent',$this->rent);
		$criteria->compare('cash_pledge',$this->cash_pledge);
		$criteria->compare('reserve',$this->reserve);
		$criteria->compare('sort_id',$this->sort_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('comment_count',$this->comment_count);
		$criteria->compare('sale_count',$this->sale_count);
		$criteria->compare('size',$this->size,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Clothes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
