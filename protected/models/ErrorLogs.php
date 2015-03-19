<?php

/**
 * This is the model class for table "error_logs".
 *
 * The followings are the available columns in table 'error_logs':
 * @property integer $id
 * @property string $user_type
 * @property integer $user_id
 * @property string $user_name
 * @property integer $error_code
 * @property string $message
 * @property string $request_url
 * @property string $query_string
 * @property string $file_name
 * @property integer $line_number
 * @property string $error_type
 * @property string $time
 * @property string $reference_url
 * @property string $ipaddress
 * @property string $browser
 */
class ErrorLogs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'error_logs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_type, user_id, user_name, error_code, message, request_url, query_string, file_name, line_number, error_type, time, reference_url, ipaddress, browser', 'required'),
			array('user_id, error_code, line_number', 'numerical', 'integerOnly'=>true),
			array('user_type', 'length', 'max'=>10),
			array('error_type, ipaddress', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_type, user_id, user_name, error_code, message, request_url, query_string, file_name, line_number, error_type, time, reference_url, ipaddress, browser', 'safe', 'on'=>'search'),
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
			'user_type' => 'User Type',
			'user_id' => 'User',
			'user_name' => 'User Name',
			'error_code' => 'Error Code',
			'message' => 'Message',
			'request_url' => 'Request Url',
			'query_string' => 'Query String',
			'file_name' => 'File Name',
			'line_number' => 'Line Number',
			'error_type' => 'Error Type',
			'time' => 'Time',
			'reference_url' => 'Reference Url',
			'ipaddress' => 'Ipaddress',
			'browser' => 'Browser',
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
			$page_size = 50;
		if(isset($_REQUEST['pagesize']))
		{
			$page_size = $_REQUEST['pagesize'];   
		}

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_type',$this->user_type,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('error_code',$this->error_code);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('request_url',$this->request_url,true);
		$criteria->compare('query_string',$this->query_string,true);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('line_number',$this->line_number);
		$criteria->compare('error_type',$this->error_type,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('reference_url',$this->reference_url,true);
		$criteria->compare('ipaddress',$this->ipaddress,true);
		$criteria->compare('browser',$this->browser,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
						'defaultOrder'=>'id DESC'),
			'pagination' => array(
                        'pageSize' => $page_size,
                    ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ErrorLogs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
