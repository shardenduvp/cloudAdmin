<?php

/**
 * This is the model class for table "client_payment".
 *
 * The followings are the available columns in table 'client_payment':
 * @property integer $id
 * @property integer $client_milestones_id
 * @property string $title
 * @property string $desc
 * @property string $add_date
 * @property string $status
 * @property string $note
 * @property string $payment_status
 * @property string $transaction_id
 * @property string $transaction_status
 *
 * The followings are the available model relations:
 * @property ClientMilestones $clientMilestones
 */
class ClientPayment extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client_payment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, client_milestones_id', 'required'),
			array('id, client_milestones_id', 'numerical', 'integerOnly'=>true),
			array('title, desc, add_date, status, note, payment_status, transaction_id, transaction_status', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, client_milestones_id, title, desc, add_date, status, note, payment_status, transaction_id, transaction_status', 'safe', 'on'=>'search'),
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
			'clientMilestones' => array(self::BELONGS_TO, 'ClientMilestones', 'client_milestones_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'client_milestones_id' => 'Client Milestones',
			'title' => 'Title',
			'desc' => 'Desc',
			'add_date' => 'Add Date',
			'status' => 'Status',
			'note' => 'Note',
			'payment_status' => 'Payment Status',
			'transaction_id' => 'Transaction',
			'transaction_status' => 'Transaction Status',
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
		$criteria->compare('client_milestones_id',$this->client_milestones_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('desc',$this->desc,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('payment_status',$this->payment_status,true);
		$criteria->compare('transaction_id',$this->transaction_id,true);
		$criteria->compare('transaction_status',$this->transaction_status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClientPayment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
