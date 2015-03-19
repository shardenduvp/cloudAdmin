<?php

/**
 * This is the model class for table "zones".
 *
 * The followings are the available columns in table 'zones':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $gmt
 * @property string $save_hour
 * @property string $zonescol
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property ClientProjectsHasZones[] $clientProjectsHasZones
 * @property ZonesHasDeveloperPrice[] $zonesHasDeveloperPrices
 */
class Zones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'zones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('name, gmt, zonescol', 'length', 'max'=>45),
			array('description', 'length', 'max'=>245),
			array('save_hour', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, gmt, save_hour, zonescol, status', 'safe', 'on'=>'search'),
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
			'clientProjectsHasZones' => array(self::HAS_MANY, 'ClientProjectsHasZones', 'zones_id'),
			'zonesHasDeveloperPrices' => array(self::HAS_MANY, 'ZonesHasDeveloperPrice', 'zones_id'),
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
			'gmt' => 'Gmt',
			'save_hour' => 'Save Hour',
			'zonescol' => 'Zonescol',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('gmt',$this->gmt,true);
		$criteria->compare('save_hour',$this->save_hour,true);
		$criteria->compare('zonescol',$this->zonescol,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Zones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
