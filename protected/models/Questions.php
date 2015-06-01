<?php

/**
 * This is the model class for table "questions".
 *
 * The followings are the available columns in table 'questions':
 * @property integer $id
 * @property string $content
 * @property integer $type
 * @property integer $id_category
 * @property integer $status
 * @property integer $sort
 * @property string $created_on
 * @property integer $id_level
 * @property string $short_answer
 */
class Questions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'questions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('content, id_category, created_on, id_level', 'required'),
		    array('content, id_category, created_on, id_level,short_answer', 'required','on'=>'short_answer'),
			array('type, id_category, status, sort, id_level', 'numerical', 'integerOnly'=>true),
			array('short_answer', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, content, type, id_category, status, sort, created_on, id_level, short_answer', 'safe', 'on'=>'search'),
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
		    'answers'=> array(self::HAS_MANY,'Answers','id_question',
            'condition'=>'answers.status = 1'),
		    'category'  => array(self::HAS_ONE, 'Categories',['id'=>'id_category']),
		    'level'  => array(self::HAS_ONE, 'Levels',['id'=>'id_level']),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'content' => 'Content',
			'type' => 'Type',
			'id_category' => 'Category',
			'status' => 'Status',
			'sort' => 'Sort',
			'created_on' => 'Created On',
			'id_level' => 'Level',
			'short_answer' => 'Short Answer',
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
		$criteria->compare('content',$this->content,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('id_category',$this->id_category);
		$criteria->compare('status',$this->status);
		$criteria->compare('sort',$this->sort);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('id_level',$this->id_level);
		$criteria->compare('short_answer',$this->short_answer,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Questions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
