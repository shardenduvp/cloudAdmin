<?php

/**
 * This is the model class for table "suppliers_has_cities".
 *
 * The followings are the available columns in table 'suppliers_has_cities':
 * @property integer $id
 * @property integer $suppliers_id
 * @property integer $cities_id
 * @property integer $is_main
 * @property string $add_date
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Cities $cities
 * @property Suppliers $suppliers
 */
class SuppliersHasCities extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'suppliers_has_cities';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('suppliers_id, cities_id', 'required'),
			array('suppliers_id, cities_id, is_main, status', 'numerical', 'integerOnly'=>true),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, suppliers_id, cities_id, is_main, add_date, status', 'safe', 'on'=>'search'),
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
			'cities' => array(self::BELONGS_TO, 'Cities', 'cities_id'),
			'suppliers' => array(self::BELONGS_TO, 'Suppliers', 'suppliers_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'suppliers_id' => 'Suppliers',
			'cities_id' => 'Cities',
			'is_main' => 'Is Main',
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
		$criteria->compare('suppliers_id',$this->suppliers_id);
		$criteria->compare('cities_id',$this->cities_id);
		$criteria->compare('is_main',$this->is_main);
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
	 * @return SuppliersHasCities the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
