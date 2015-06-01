<?php

/**
 * This is the model class for table "quiz_cate_level".
 *
 * The followings are the available columns in table 'quiz_cate_level':
 * @property integer $id
 * @property integer $id_quiz
 * @property integer $id_category
 * @property integer $id_level
 * @property integer $no_of_question
 */
class QuizCateLevel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'quiz_cate_level';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_quiz, id_category, id_level, no_of_question', 'required'),
			array('id_quiz, id_category, id_level', 'numerical', 'integerOnly'=>true),
		    array('no_of_question','numerical',
		        'integerOnly'=>true,
		        'min'=>1,
		        'tooSmall'=>'You must set no of question at least 1(s)'),
		    array('no_of_question','max_question'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, id_quiz, id_category, id_level, no_of_question', 'safe', 'on'=>'search'),
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
			'id_quiz' => 'Quiz',
			'id_category' => 'Category',
			'id_level' => 'Level',
			'no_of_question' => 'No Of Question',
		);
	}
	
	public function beforeValidate()
	{
	    if (parent::beforeValidate()) {
	
	        $validator = CValidator::createValidator('unique', $this, 'id_quiz', array(
	            'criteria' => array(
	               'condition'=>'`id_category`=:id_category AND `id_level`=:id_level ',
    		        'params'=>array(
    		            ':id_category'=>$this->id_category,
    		            ':id_level'=>$this->id_level
    		        )
	            )
	        ));
	        $this->getValidatorList()->insertAt(0, $validator);
	        return true;
	    }
	    return false;
	}
     
	public function max_question($attribute)
	{
        $total_question = Yii::app()->db->createCommand()
            ->select('count(*) as total')
            ->from('questions')
            ->where('id_category=:id_category AND id_level=:id_level', array(
            ':id_category' => $this->id_category,
            ':id_level' => $this->id_level,
        ))
            ->queryRow();
        if ($total_question['total'] < $this->$attribute) {
            $this->addError($attribute, 'Max of question can enter is ' . $total_question['total']);
        }
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
		$criteria->compare('id_quiz',$this->id_quiz);
		$criteria->compare('id_category',$this->id_category);
		$criteria->compare('id_level',$this->id_level);
		$criteria->compare('no_of_question',$this->no_of_question);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QuizCateLevel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
