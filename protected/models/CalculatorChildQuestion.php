<?php

/**
 * This is the model class for table "calculator_child_question".
 *
 * The followings are the available columns in table 'calculator_child_question':
 * @property integer $id
 * @property integer $parent_question_id
 * @property string $question
 * @property string $answer
 * @property string $options
 * @property string $hour
 * @property string $price
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property CalculatorQuestion $parentQuestion
 */
class CalculatorChildQuestion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'calculator_child_question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('parent_question_id, question, answer, options', 'required'),
			array('parent_question_id', 'numerical', 'integerOnly'=>true),
			array('question, answer', 'length', 'max'=>500),
			array('hour, price', 'length', 'max'=>100),
			array('created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, parent_question_id, question, answer, options, hour, price, created, modified', 'safe', 'on'=>'search'),
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
			'parentQuestion' => array(self::BELONGS_TO, 'CalculatorQuestion', 'parent_question_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_question_id' => 'Parent Question',
			'question' => 'Question',
			'answer' => 'Answer',
			'options' => 'Options',
			'hour' => 'Hour',
			'price' => 'Price',
			'created' => 'Created',
			'modified' => 'Modified',
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
		$criteria->compare('parent_question_id',$this->parent_question_id);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('answer',$this->answer,true);
		$criteria->compare('options',$this->options,true);
		$criteria->compare('hour',$this->hour,true);
		$criteria->compare('price',$this->price,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CalculatorChildQuestion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
