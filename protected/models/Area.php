<?php

/**
 * This is the model class for table "area".
 *
 * The followings are the available columns in table 'area':
 * @property integer $id
 * @property integer $parent_id
 * @property string $area_name
 * @property integer $area_type
 *
 * The followings are the available model relations:
 * @property Photographs[] $photographs
 * @property SentSpot $sentSpot
 * @property Souvenir[] $souvenirs
 */
class Area extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'area';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_id, area_name, area_type', 'required'),
			array('parent_id, area_type', 'numerical', 'integerOnly'=>true),
			array('area_name', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, parent_id, area_name, area_type', 'safe', 'on'=>'search'),
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
			'photographs' => array(self::HAS_MANY, 'Photographs', 'school_id'),
			'sentSpot' => array(self::HAS_ONE, 'SentSpot', 'id'),
			'souvenirs' => array(self::HAS_MANY, 'Souvenir', 'area_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_id' => 'Parent',
			'area_name' => 'Area Name',
			'area_type' => 'Area Type',
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
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('area_name',$this->area_name,true);
		$criteria->compare('area_type',$this->area_type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Area the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function getarealist()
	{
		$arealist=Area::model()->findAllByAttributes(array('parent_id'=>2));
		 return  CHtml::listData($arealist,'id','area_name');
	}
	public function getschoollist()
	{
		$arealist=Area::model()->findAllByAttributes(array('area_type'=>4));
		 return  CHtml::listData($arealist,'id','area_name');
	}
}
