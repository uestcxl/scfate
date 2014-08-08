<?php

/**
 * This is the model class for table "souvenir".
 *
 * The followings are the available columns in table 'souvenir':
 * @property integer $id
 * @property string $name
 * @property double $price
 * @property double $reduce_price
 * @property integer $is_reduce
 * @property integer $area_id
 * @property integer $school_id
 * @property string $school
 * @property string $description
 * @property integer $sort_id
 * @property string $picture
 * @property integer $sale_count
 * @property integer $comment_count
 *
 * The followings are the available model relations:
 * @property Area $area
 */
class Souvenir extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'souvenir';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, price, reduce_price, area_id, school_id, description, sort_id, picture', 'required'),
			array('is_reduce, area_id, school_id, sort_id, sale_count, comment_count', 'numerical', 'integerOnly'=>true),
			array('price, reduce_price', 'numerical'),
			array('name', 'length', 'max'=>45),
			array('picture', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, price, reduce_price, is_reduce, area_id, school_id, description, sort_id, picture, sale_count, comment_count', 'safe', 'on'=>'search'),
			array('picture', 'file', 'allowEmpty'=>true,
				'types'=>'jpg, jpeg, gif, png',
				'maxSize'=>1024 * 512 * 1, // 512kb
				'tooLarge'=>'上传文件超过 512kb，无法上传。',)
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
			'area' => array(self::BELONGS_TO, 'Area', 'area_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'price' => 'Price',
			'reduce_price' => 'Reduce Price',
			'is_reduce' => 'Is Reduce',
			'area_id' => '地区',
			'school_id' => '学校',
			
			'description' => '具体描述',
			'sort_id' => '种类',
			'picture' => '图片',
			'sale_count' => '销售数量',
			'comment_count' => '评论数量',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('reduce_price',$this->reduce_price);
		$criteria->compare('is_reduce',$this->is_reduce);
		$criteria->compare('area_id',$this->area_id);
		$criteria->compare('school_id',$this->school_id);
		
		$criteria->compare('description',$this->description,true);
		$criteria->compare('sort_id',$this->sort_id);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('sale_count',$this->sale_count);
		$criteria->compare('comment_count',$this->comment_count);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Souvenir the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
