<?php

/**
 * This is the model class for table "email_logs".
 *
 * The followings are the available columns in table 'email_logs':
 * @property integer $id
 * @property string $reciver
 * @property integer $user_id
 * @property string $templete
 * @property string $esubject
 * @property string $body
 * @property string $time
 * @property integer $status
 * @property string $other_info
 */
class EmailLogs extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'email_logs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('reciver, user_id, body, time', 'required'),
			array('user_id, status', 'numerical', 'integerOnly'=>true),
			array('reciver', 'length', 'max'=>80),
			array('templete', 'length', 'max'=>150),
			array('esubject, other_info', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, reciver, user_id, templete, esubject, body, time, status, other_info', 'safe', 'on'=>'search'),
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
			'reciver' => 'Reciver',
			'user_id' => 'User',
			'templete' => 'Templete',
			'esubject' => 'Esubject',
			'body' => 'Body',
			'time' => 'Time',
			'status' => 'Status',
			'other_info' => 'Other Info',
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
		$criteria->compare('reciver',$this->reciver,true);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('templete',$this->templete,true);
		$criteria->compare('esubject',$this->esubject,true);
		$criteria->compare('body',$this->body,true);
		$criteria->compare('time',$this->time,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('other_info',$this->other_info,true);

		return new CActiveDataProvider($this, array(
					'criteria'=>$criteria,
					'sort'=>array(
						'defaultOrder'=>'id DESC',
					),
                    'pagination' => array(
                        'pageSize' => $page_size,
                    ),
				));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EmailLogs the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
