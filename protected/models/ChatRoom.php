<?php

/**
 * This is the model class for table "chat_room".
 *
 * The followings are the available columns in table 'chat_room':
 * @property integer $id
 * @property string $room_type
 * @property string $room_name
 * @property string $add_date
 * @property integer $status
 * @property string $remarks
 *
 * The followings are the available model relations:
 * @property ChatMessages[] $chatMessages
 * @property ChatRoomHasUsers[] $chatRoomHasUsers
 * @property SuppliersProjects[] $suppliersProjects
 */
class ChatRoom extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'chat_room';
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
			array('room_type, room_name', 'length', 'max'=>45),
			array('add_date, remarks', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, room_type, room_name, add_date, status, remarks', 'safe', 'on'=>'search'),
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
			'chatMessages' => array(self::HAS_MANY, 'ChatMessages', 'chat_room_id'),
			'chatRoomHasUsers' => array(self::HAS_MANY, 'ChatRoomHasUsers', 'chat_room_id'),
			'suppliersProjects' => array(self::HAS_MANY, 'SuppliersProjects', 'chat_room_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'room_type' => 'Room Type',
			'room_name' => 'Room Name',
			'add_date' => 'Add Date',
			'status' => 'Status',
			'remarks' => 'Remarks',
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
		$criteria->compare('room_type',$this->room_type,true);
		$criteria->compare('room_name',$this->room_name,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('remarks',$this->remarks,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ChatRoom the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
