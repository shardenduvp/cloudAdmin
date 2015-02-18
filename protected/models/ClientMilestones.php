<?php

/**
 * This is the model class for table "client_milestones".
 *
 * The followings are the available columns in table 'client_milestones':
 * @property integer $id
 * @property integer $client_profiles_id
 * @property string $name
 * @property string $desc
 * @property string $payment
 * @property string $mod_date
 * @property string $payment_date
 * @property string $add_date
 * @property string $status
 *
 * The followings are the available model relations:
 * @property ClientProfiles $clientProfiles
 * @property ClientPayment[] $clientPayments
 */
class ClientMilestones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client_milestones';
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
			array('name, desc, payment, mod_date, payment_date, add_date, status', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, client_profiles_id, name, desc, payment, mod_date, payment_date, add_date, status', 'safe', 'on'=>'search'),
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
			'clientPayments' => array(self::HAS_MANY, 'ClientPayment', 'client_milestones_id'),
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
			'name' => 'Name',
			'desc' => 'Desc',
			'payment' => 'Payment',
			'mod_date' => 'Mod Date',
			'payment_date' => 'Payment Date',
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
		$criteria->compare('client_profiles_id',$this->client_profiles_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('payment',$this->payment,true);
		$criteria->compare('mod_date',$this->mod_date,true);
		$criteria->compare('payment_date',$this->payment_date,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClientMilestones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
