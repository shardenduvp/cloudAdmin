<?php

/**
 * This is the model class for table "chat_messages".
 *
 * The followings are the available columns in table 'chat_messages':
 * @property integer $id
 * @property integer $chat_template_id
 * @property integer $chat_room_has_users_id
 * @property string $type
 * @property string $message
 * @property string $ip_address
 * @property integer $sender_type
 * @property integer $status
 * @property string $add_date
 * @property integer $client_projects_id
 * @property integer $suppliers_id
 * @property integer $is_sent_from_supplier
 *
 * The followings are the available model relations:
 * @property ChatRoomHasUsers $chatRoomHasUsers
 * @property ChatTemplate $chatTemplate
 */
class ChatMessages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'chat_messages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('chat_template_id, chat_room_has_users_id', 'required'),
			array('chat_template_id, chat_room_has_users_id, sender_type, status, client_projects_id, suppliers_id, is_sent_from_supplier', 'numerical', 'integerOnly'=>true),
			array('type, ip_address', 'length', 'max'=>45),
			array('message, add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, chat_template_id, chat_room_has_users_id, type, message, ip_address, sender_type, status, add_date, client_projects_id, suppliers_id, is_sent_from_supplier', 'safe', 'on'=>'search'),
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
			'chatRoomHasUsers' => array(self::BELONGS_TO, 'ChatRoomHasUsers', 'chat_room_has_users_id'),
			'chatTemplate' => array(self::BELONGS_TO, 'ChatTemplate', 'chat_template_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'chat_template_id' => 'Chat Template',
			'chat_room_has_users_id' => 'Chat Room Has Users',
			'type' => 'Type',
			'message' => 'Message',
			'ip_address' => 'Ip Address',
			'sender_type' => 'Sender Type',
			'status' => 'Status',
			'add_date' => 'Add Date',
			'client_projects_id' => 'Client Projects',
			'suppliers_id' => 'Suppliers',
			'is_sent_from_supplier' => 'Is Sent From Supplier',
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
		$criteria->compare('chat_template_id',$this->chat_template_id);
		$criteria->compare('chat_room_has_users_id',$this->chat_room_has_users_id);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('ip_address',$this->ip_address,true);
		$criteria->compare('sender_type',$this->sender_type);
		$criteria->compare('status',$this->status);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('client_projects_id',$this->client_projects_id);
		$criteria->compare('suppliers_id',$this->suppliers_id);
		$criteria->compare('is_sent_from_supplier',$this->is_sent_from_supplier);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ChatMessages the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
