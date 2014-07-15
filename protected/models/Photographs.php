<?php

/**
 * This is the model class for table "photographs".
 *
 * The followings are the available columns in table 'photographs':
 * @property integer $id
 * @property string $title
 * @property string $picture
 * @property integer $sort_id
 * @property integer $phototeam_id
 * @property string $create_time
 * @property string $description
 * @property integer $school_id
 * @property string $school
 *
 * The followings are the available model relations:
 * @property Area $school0
 * @property Phototeam $phototeam
 */
class Photographs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'photographs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, picture, sort_id, phototeam_id, description, school_id, school', 'required'),
			array('sort_id, phototeam_id, school_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>50),
			array('picture', 'length', 'max'=>100),
			array('school', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, picture, sort_id, phototeam_id, create_time, description, school_id, school', 'safe', 'on'=>'search'),
			array('picture', 'file', 'allowEmpty'=>true,
				'types'=>'jpg, jpeg, gif, png',
				'maxSize'=>1024 * 512, // 512KB
				'tooLarge'=>'上传文件超过 512KB，无法上传。',
		),
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
			'school0' => array(self::BELONGS_TO, 'Area', 'school_id'),
			'phototeam' => array(self::BELONGS_TO, 'Phototeam', 'phototeam_id'),
			'sort'=>array(self::BELONGS_TO,'Sort','sort_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'picture' => 'picture',
			'sort_id' => 'Sort',
			'phototeam_id' => 'Phototeam',
			'create_time' => 'Create Time',
			'description' => 'Description',
			'school_id' => 'School',
			'school' => 'School',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('sort_id',$this->sort_id);
		$criteria->compare('phototeam_id',$this->phototeam_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('school_id',$this->school_id);
		$criteria->compare('school',$this->school,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Photographs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave(){
		if (parent::beforeSave()) {
			$this->create_time=date('Y-m-d H:i');
			return true;
		}
		else
			return false;
	}
}
