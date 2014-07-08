<?php

/**
 * This is the model class for table "indexpic".
 *
 * The followings are the available columns in table 'indexpic':
 * @property integer $id
 * @property string $name
 * @property string $picture
 * @property string $create_time
 * @property integer $view
 */
class Indexpic extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'indexpic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, picture', 'required'),
			array('id,view', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('picture', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, picture, create_time, view', 'safe', 'on'=>'search'),
			array('picture', 'file', 'allowEmpty'=>true,
				'types'=>'jpg, jpeg, gif, png',
				'maxSize'=>512 * 1024 * 1, // 512KB
				'tooLarge'=>'上传文件超过 512KB，无法上传。',),
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
			'name' => '图片名字',
			'picture' => 'Picture',
			'create_time' => '创建时间',
			'view' => '是否可见',
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
		$criteria->compare('picture',$this->picture,true);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('view',$this->view);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Indexpic the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function beforeSave(){
		if (parent::beforeSave()) {
			$this->create_time=date('Y-m-d H:i');
			$this->id=count(Indexpic::model()->findAll())+1;
			return true;
		}
		else
			return false;
	}
}
