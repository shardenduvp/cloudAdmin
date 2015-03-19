<?php

/**
 * This is the model class for table "states".
 *
 * The followings are the available columns in table 'states':
 * @property integer $id
 * @property integer $countries_id
 * @property string $name
 * @property string $description
 * @property string $code
 * @property string $code2
 * @property integer $status
 * @property integer $price_zone_id
 *
 * The followings are the available model relations:
 * @property Cities[] $cities
 * @property Countries $countries
 */
class States extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'states';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('countries_id, name, price_zone_id', 'required'),
			array('countries_id, status, price_zone_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('description', 'length', 'max'=>255),
			array('code, code2', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, countries_id, name, description, code, code2, status, price_zone_id', 'safe', 'on'=>'search'),
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
			'cities' => array(self::HAS_MANY, 'Cities', 'states_id'),

			'priceZone' => array(self::BELONGS_TO, 'PriceZone', 'price_zone_id'),
			'countries' => array(self::BELONGS_TO, 'Countries', 'countries_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'countries_id' => 'Countries',
			'name' => 'Name',
			'description' => 'Description',
			'code' => 'Code',
			'code2' => 'Code2',
			'status' => 'Status',
			'price_zone_id' => 'Price Zone',
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
		$criteria->compare('countries_id',$this->countries_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('code',$this->code,true);
		$criteria->compare('code2',$this->code2,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('price_zone_id',$this->price_zone_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return States the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
