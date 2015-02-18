<?php

/**
 * This is the model class for table "review_questions".
 *
 * The followings are the available columns in table 'review_questions':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $add_date
 * @property integer $status
 * @property integer $review_category_id
 *
 * The followings are the available model relations:
 * @property ReviewCategory $reviewCategory
 * @property SuppliersReferencesQuestions[] $suppliersReferencesQuestions
 */
class ReviewQuestions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'review_questions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('review_category_id', 'required'),
			array('status, review_category_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>450),
			array('description, add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, add_date, status, review_category_id', 'safe', 'on'=>'search'),
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
			'reviewCategory' => array(self::BELONGS_TO, 'ReviewCategory', 'review_category_id'),
			'suppliersReferencesQuestions' => array(self::HAS_MANY, 'SuppliersReferencesQuestions', 'review_questions_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'add_date' => 'Add Date',
			'status' => 'Status',
			'review_category_id' => 'Review Category',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('review_category_id',$this->review_category_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReviewQuestions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
