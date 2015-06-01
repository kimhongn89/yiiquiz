<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $username
 * @property string $fullname
 * @property string $email
 * @property string $password
 * @property string $address
 * @property string $DOB
 * @property integer $gender
 * @property integer $status
 * @property string $created_on
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, fullname, email, password, address, DOB, created_on', 'required'),
		    array('created_on', 'safe','on'=>'update'),
			array('gender, status', 'numerical', 'integerOnly'=>true),
			array('username, fullname, email, password, address', 'length', 'max'=>255),
		    array('email', 'unique','message'=>'This Email is already in use'),
		    array('email', 'email','message'=>"The email isn't correct"),
		    array('username', 'unique','message'=>'This username is already in use'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, fullname, email, password, address, DOB, gender, status, created_on', 'safe', 'on'=>'search'),
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
			'username' => 'Username',
			'fullname' => 'Fullname',
			'email' => 'Email',
			'password' => 'Password',
			'address' => 'Address',
			'DOB' => 'Dob',
			'gender' => 'Gender',
			'status' => 'Status',
			'created_on' => 'Created On',
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
		$criteria->compare('fullname',$this->fullname,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('DOB',$this->DOB,true);
		$criteria->compare('gender',$this->gender);
		$criteria->compare('status',$this->status);
		$criteria->compare('created_on',$this->created_on,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
