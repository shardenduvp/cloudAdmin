<?php

/**
 * This is the model class for table "suppliers_has_category_rating".
 *
 * The followings are the available columns in table 'suppliers_has_category_rating':
 * @property integer $id
 * @property integer $suppliers_has_references_id
 * @property integer $review_category_id
 * @property string $rating
 * @property string $add_date
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property ReviewCategory $reviewCategory
 * @property SuppliersHasReferences $suppliersHasReferences
 */
class SuppliersHasCategoryRating extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'suppliers_has_category_rating';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('suppliers_has_references_id, review_category_id', 'required'),
			array('suppliers_has_references_id, review_category_id, status', 'numerical', 'integerOnly'=>true),
			array('rating', 'length', 'max'=>45),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, suppliers_has_references_id, review_category_id, rating, add_date, status', 'safe', 'on'=>'search'),
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
			'suppliersHasReferences' => array(self::BELONGS_TO, 'SuppliersHasReferences', 'suppliers_has_references_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'suppliers_has_references_id' => 'Suppliers Has References',
			'review_category_id' => 'Review Category',
			'rating' => 'Rating',
			'add_date' => 'Add Date',
			'status' => 'Status',
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
		$criteria->compare('suppliers_has_references_id',$this->suppliers_has_references_id);
		$criteria->compare('review_category_id',$this->review_category_id);
		$criteria->compare('rating',$this->rating,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SuppliersHasCategoryRating the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
