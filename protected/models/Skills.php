<?php

/**
 * This is the model class for table "skills".
 *
 * The followings are the available columns in table 'skills':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $skillcol
 * @property string $add_date
 * @property integer $parent_id
 *
 * The followings are the available model relations:
 * @property ClientProjectsHasSkills[] $clientProjectsHasSkills
 * @property SuppliersHasPortfolioHasSkills[] $suppliersHasPortfolioHasSkills
 * @property SuppliersHasSkills[] $suppliersHasSkills
 */
class Skills extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'skills';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('skillcol, parent_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('description', 'length', 'max'=>500),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, skillcol, add_date, parent_id', 'safe', 'on'=>'search'),
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
			'clientProjectsHasSkills' => array(self::HAS_MANY, 'ClientProjectsHasSkills', 'skills_id'),
			'suppliersHasPortfolioHasSkills' => array(self::HAS_MANY, 'SuppliersHasPortfolioHasSkills', 'skills_id'),
			'suppliersHasSkills' => array(self::HAS_MANY, 'SuppliersHasSkills', 'skills_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'skillcol' => 'Skillcol',
			'add_date' => 'Add Date',
			'parent_id' => 'Parent',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('skillcol',$this->skillcol);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('parent_id',$this->parent_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Skills the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
