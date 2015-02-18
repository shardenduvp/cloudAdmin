<?php

/**
 * This is the model class for table "client_services".
 *
 * The followings are the available columns in table 'client_services':
 * @property integer $id
 * @property integer $client_profiles_id
 * @property string $services_id
 * @property string $add_date
 * @property string $status
 * @property string $active
 *
 * The followings are the available model relations:
 * @property ClientProfiles $clientProfiles
 */
class ClientServices extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client_services';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, client_profiles_id', 'required'),
			array('id, client_profiles_id', 'numerical', 'integerOnly'=>true),
			array('services_id, add_date, status, active', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, client_profiles_id, services_id, add_date, status, active', 'safe', 'on'=>'search'),
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
			'clientProfiles' => array(self::BELONGS_TO, 'ClientProfiles', 'client_profiles_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'client_profiles_id' => 'Client Profiles',
			'services_id' => 'Services',
			'add_date' => 'Add Date',
			'status' => 'Status',
			'active' => 'Active',
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
		$criteria->compare('client_profiles_id',$this->client_profiles_id);
		$criteria->compare('services_id',$this->services_id,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('active',$this->active,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClientServices the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
