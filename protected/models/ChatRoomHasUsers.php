<?php

/**
 * This is the model class for table "chat_room_has_users".
 *
 * The followings are the available columns in table 'chat_room_has_users':
 * @property integer $id
 * @property integer $chat_room_id
 * @property integer $users_id
 * @property string $added_by
 * @property string $add_date
 * @property string $note
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property ChatMessages[] $chatMessages
 * @property Users $users
 * @property ChatRoom $chatRoom
 */
class ChatRoomHasUsers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'chat_room_has_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('chat_room_id, users_id', 'required'),
			array('chat_room_id, users_id, status', 'numerical', 'integerOnly'=>true),
			array('added_by', 'length', 'max'=>45),
			array('note', 'length', 'max'=>245),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, chat_room_id, users_id, added_by, add_date, note, status', 'safe', 'on'=>'search'),
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
			'chatMessages' => array(self::HAS_MANY, 'ChatMessages', 'chat_message_has_user_id'),
			'users' => array(self::BELONGS_TO, 'Users', 'users_id'),
			'chatRoom' => array(self::BELONGS_TO, 'ChatRoom', 'chat_room_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'chat_room_id' => 'Chat Room',
			'users_id' => 'Users',
			'added_by' => 'Added By',
			'add_date' => 'Add Date',
			'note' => 'Note',
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
		$criteria->compare('chat_room_id',$this->chat_room_id);
		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('added_by',$this->added_by,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ChatRoomHasUsers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
