<?php

/**
 * This is the model class for table "call_schedules".
 *
 * The followings are the available columns in table 'call_schedules':
 * @property integer $id
 * @property integer $client_projects_id
 * @property string $client_phone
 * @property string $call_time
 * @property string $add_date
 *
 * The followings are the available model relations:
 * @property ClientProjects $clientProjects
 */
class CallSchedules extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'call_schedules';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_projects_id', 'required'),
			array('client_projects_id', 'numerical', 'integerOnly'=>true),
			array('client_phone', 'length', 'max'=>25),
			array('call_time, add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, client_projects_id, client_phone, call_time, add_date', 'safe', 'on'=>'search'),
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
			'clientProjects' => array(self::BELONGS_TO, 'ClientProjects', 'client_projects_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'client_projects_id' => 'Client Projects',
			'client_phone' => 'Client Phone',
			'call_time' => 'Call Time',
			'add_date' => 'Add Date',
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
		$criteria->compare('client_projects_id',$this->client_projects_id);
		$criteria->compare('client_phone',$this->client_phone,true);
		$criteria->compare('call_time',$this->call_time,true);
		$criteria->compare('add_date',$this->add_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CallSchedules the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
