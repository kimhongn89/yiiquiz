<?php

/**
 * This is the model class for table "result_detail".
 *
 * The followings are the available columns in table 'result_detail':
 * @property integer $id
 * @property integer $id_result
 * @property integer $id_question
 * @property string $id_answer
 * @property string $text_answer
 * @property integer $result
 */
class ResultDetail extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'result_detail';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_result, id_question', 'required'),
			array('id_result, id_question, result', 'numerical', 'integerOnly'=>true),
			array('id_answer', 'length', 'max'=>50),
			array('text_answer', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_result, id_question, id_answer, text_answer, result', 'safe', 'on'=>'search'),
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
		    'question'  => array(self::HAS_ONE, 'Questions',['id'=>'id_question']),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_result' => 'Id Result',
			'id_question' => 'Id Question',
			'id_answer' => 'Id Answer',
			'text_answer' => 'Text Answer',
			'result' => 'Result',
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
		$criteria->compare('id_result',$this->id_result);
		$criteria->compare('id_question',$this->id_question);
		$criteria->compare('id_answer',$this->id_answer,true);
		$criteria->compare('text_answer',$this->text_answer,true);
		$criteria->compare('result',$this->result);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ResultDetail the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
