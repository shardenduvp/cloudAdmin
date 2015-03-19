<?php

/**
 * This is the model class for table "calculator_result".
 *
 * The followings are the available columns in table 'calculator_result':
 * @property integer $id
 * @property integer $users_id
 * @property integer $question_id
 * @property integer $option_id
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property CalculatorOptions $option
 * @property CalculatorQuestion $question
 * @property CalculatorUsers $users
 */
class CalculatorResult extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'calculator_result';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('users_id, question_id, option_id', 'required'),
			array('users_id, question_id, option_id', 'numerical', 'integerOnly'=>true),
			array('created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, users_id, question_id, option_id, created, modified', 'safe', 'on'=>'search'),
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
			'option' => array(self::BELONGS_TO, 'CalculatorOptions', 'option_id'),
			'question' => array(self::BELONGS_TO, 'CalculatorQuestion', 'question_id'),
			'users' => array(self::BELONGS_TO, 'CalculatorUsers', 'users_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'users_id' => 'Users',
			'question_id' => 'Question',
			'option_id' => 'Option',
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
		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('option_id',$this->option_id);
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
	 * @return CalculatorResult the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
