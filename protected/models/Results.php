<?php

/**
 * This is the model class for table "results".
 *
 * The followings are the available columns in table 'results':
 * @property integer $id
 * @property integer $id_user
 * @property integer $id_quiz
 * @property integer $score
 * @property string $start
 * @property integer $done
 * @property string $end
 */
class Results extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'results';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_user, id_quiz, start', 'required'),
			array('id_user, id_quiz, score, done', 'numerical', 'integerOnly'=>true),
			array('end', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_user, id_quiz, score, start, done, end', 'safe', 'on'=>'search'),
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
		    'quiz'  => array(self::HAS_ONE, 'Quizs',['id'=>'id_quiz']),
		    'user'  => array(self::HAS_ONE, 'Users',['id'=>'id_user']),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'id_user' => 'User',
			'id_quiz' => 'Quiz',
			'score' => 'Score',
			'start' => 'Start',
			'done' => 'Status',
			'end' => 'End',
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
		$criteria->together = true;
		$criteria->with= array('user','quiz');
		$criteria->compare('id',$this->id);
		$criteria->compare('user.fullname', $this->id_user, true);
		$criteria->compare('quiz.title', $this->id_quiz, true);
		$criteria->compare('score',$this->score);
		$criteria->compare('start',$this->start,true);
		$criteria->compare('done',$this->done);
		$criteria->compare('end',$this->end,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Results the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
