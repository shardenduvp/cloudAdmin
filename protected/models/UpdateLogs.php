<?php

/**
 * This is the model class for table "update_logs".
 *
 * The followings are the available columns in table 'update_logs':
 * @property integer $id
 * @property integer $user_id
 * @property string $username
 * @property string $action
 * @property string $controller
 * @property string $description
 * @property string $user_ip
 * @property string $date_time
 */
class UpdateLogs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'update_logs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, username, action, controller, description, user_ip', 'required'),
			array('user_id', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>100),
			array('action, user_ip', 'length', 'max'=>30),
			array('controller', 'length', 'max'=>40),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, username, action, controller, description, user_ip, date_time', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'username' => 'Username',
			'action' => 'Action',
			'controller' => 'Controller',
			'description' => 'Description',
			'user_ip' => 'User Ip',
			'date_time' => 'Date Time',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('action',$this->action,true);
		$criteria->compare('controller',$this->controller,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('user_ip',$this->user_ip,true);
		$criteria->compare('date_time',$this->date_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UpdateLogs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
