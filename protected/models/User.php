<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $username
 * @property string $name
 * @property string $password
 * @property string $phone
 * @property string $mail
 * @property string $QQ
 *
 * The followings are the available model relations:
 * @property Address[] $addresses
 * @property Comment[] $comments
 * @property Userpic[] $userpics
 */
class User extends CActiveRecord
{
	public $verifyCode;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password, phone, mail', 'required','message'=>'必填哦'),
			array('username, name', 'length', 'max'=>45,'message'=>'用户名不能大于45个字符！'),
			array('password', 'length', 'max'=>32),
			array('phone', 'length', 'max'=>11),
			array('mail', 'length', 'max'=>40),
			array('QQ', 'length', 'max'=>20),
			array('verifyCode', 'captcha', 'allowEmpty'=>!CCaptcha::checkRequirements(),'on'=>'captchaRequired'),
        	array('verifyCode', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, name, password, phone, mail, QQ', 'safe', 'on'=>'search'),
			array('picture', 'file', 'allowEmpty'=>true,
				'types'=>'jpg, jpeg, gif, png',
				'maxSize'=>1024 * 256 * 1, // 1MB
				'tooLarge'=>'上传文件超过 256KB，无法上传。',
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
			'addresses' => array(self::HAS_MANY, 'Address', 'userid'),
			'comments' => array(self::HAS_MANY, 'Comment', 'user_id'),
			'userpics' => array(self::HAS_MANY, 'Userpic', 'userid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'name' => 'Name',
			'password' => 'Password',
			'phone' => 'Phone',
			'mail' => 'Mail',
			'QQ' => 'Qq',
			'verifyCode' => 'Verification Code',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('QQ',$this->QQ,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public  function validatePassword($password)
	{
                return md5($password)===$this->password;
	}


	protected function beforeSave(){
		if (parent::beforeSave()) {
	        if($this->isNewRecord){
	        	//var_dump($this->password);die;
	        	$this->password=md5($this->password);
	        }
			return  true;
		}else{
			return false;
		}
	}

}
