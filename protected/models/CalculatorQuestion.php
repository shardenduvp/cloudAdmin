<?php

/**
 * This is the model class for table "calculator_question".
 *
 * The followings are the available columns in table 'calculator_question':
 * @property integer $id
 * @property integer $parent
 * @property integer $category_id
 * @property string $question
 * @property string $description
 * @property integer $multi
 * @property string $created
 * @property string $modified
 * @property integer $is_deleted
 *
 * The followings are the available model relations:
 * @property CalculatorOptions[] $calculatorOptions
 * @property CalculatorCategory $category
 * @property CalculatorResult[] $calculatorResults
 */
class CalculatorQuestion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'calculator_question';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, question, multi', 'required'),
			array('parent, category_id, multi, is_deleted', 'numerical', 'integerOnly'=>true),
			array('question', 'length', 'max'=>500),
			array('description, created, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, parent, category_id, question, description, multi, created, modified, is_deleted', 'safe', 'on'=>'search'),
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
			'calculatorOptions' => array(self::HAS_MANY, 'CalculatorOptions', 'question_id'),
			'category' => array(self::BELONGS_TO, 'CalculatorCategory', 'category_id'),
			'calculatorResults' => array(self::HAS_MANY, 'CalculatorResult', 'question_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent' => 'Parent',
			'category_id' => 'Category',
			'question' => 'Question',
			'description' => 'Description',
			'multi' => 'Multi',
			'created' => 'Created',
			'modified' => 'Modified',
			'is_deleted' => 'Is Deleted',
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
		$criteria->compare('parent',$this->parent);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('question',$this->question,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('multi',$this->multi);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('is_deleted',$this->is_deleted);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CalculatorQuestion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
