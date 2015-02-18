<?php

/**
 * This is the model class for table "cities".
 *
 * The followings are the available columns in table 'cities':
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $description
 * @property string $others
 * @property string $geo_lat
 * @property string $geo_lng
 * @property integer $status
 * @property integer $countries_id
 *
 * The followings are the available model relations:
 * @property Countries $countries
 * @property ClientProfilesHasCities[] $clientProfilesHasCities
 * @property LinkedinConnections[] $linkedinConnections
 * @property SuppliersHasCities[] $suppliersHasCities
 * @property UsersHasCities[] $usersHasCities
 * @property UsersOffices[] $usersOffices
 */
class Cities extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cities';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('countries_id', 'required'),
			array('status, countries_id', 'numerical', 'integerOnly'=>true),
			array('name, code, others', 'length', 'max'=>45),
			array('description', 'length', 'max'=>245),
			array('geo_lat, geo_lng', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, code, description, others, geo_lat, geo_lng, status, countries_id', 'safe', 'on'=>'search'),
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
			'countries' => array(self::BELONGS_TO, 'Countries', 'countries_id'),
			'clientProfilesHasCities' => array(self::HAS_MANY, 'ClientProfilesHasCities', 'cities_id'),
			'linkedinConnections' => array(self::HAS_MANY, 'LinkedinConnections', 'cities_id'),
			'suppliersHasCities' => array(self::HAS_MANY, 'SuppliersHasCities', 'cities_id'),
			'usersHasCities' => array(self::HAS_MANY, 'UsersHasCities', 'cities_id'),
			'usersOffices' => array(self::HAS_MANY, 'UsersOffices', 'city_id'),
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
			'code' => 'Code',
			'description' => 'Description',
			'others' => 'Others',
			'geo_lat' => 'Geo Lat',
			'geo_lng' => 'Geo Lng',
			'status' => 'Status',
			'countries_id' => 'Countries',
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
		$criteria->compare('code',$this->code,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('others',$this->others,true);
		$criteria->compare('geo_lat',$this->geo_lat,true);
		$criteria->compare('geo_lng',$this->geo_lng,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('countries_id',$this->countries_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cities the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
