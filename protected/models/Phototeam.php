<?php

/**
 * This is the model class for table "phototeam".
 *
 * The followings are the available columns in table 'phototeam':
 * @property integer $id
 * @property string $team_name
 * @property string $phone
 * @property string $QQ
 * @property string $email
 *
 * The followings are the available model relations:
 * @property Photographs[] $photographs
 */
class Phototeam extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'phototeam';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('team_name, phone', 'required'),
			array('team_name', 'length', 'max'=>120),
			array('phone', 'length', 'max'=>11),
			array('QQ', 'length', 'max'=>20),
			array('email', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, team_name, phone, QQ, email', 'safe', 'on'=>'search'),
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
			'photographs' => array(self::HAS_MANY, 'Photographs', 'phototeam_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'team_name' => 'Team Name',
			'phone' => 'Phone',
			'QQ' => 'Qq',
			'email' => 'Email',
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
		$criteria->compare('team_name',$this->team_name,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('QQ',$this->QQ,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Phototeam the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
