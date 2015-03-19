<?php

/**
 * This is the model class for table "log".
 *
 * The followings are the available columns in table 'log':
 * @property integer $id
 * @property integer $login_id
 * @property integer $proposal_id
 * @property integer $project_status
 * @property integer $is_checked
 * @property string $title
 * @property string $description
 * @property string $add_date
 * @property string $update_date
 * @property integer $status
 * @property integer $for_user
 * @property integer $notification
 * @property integer $is_read
 * @property integer $is_active
 *
 * The followings are the available model relations:
 * @property Users $login
 * @property Notifications[] $notifications
 */
class Log extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'log';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('login_id, for_user', 'required'),
			array('login_id, proposal_id, project_status, is_checked, status, for_user, notification, is_read, is_active', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>245),
			array('description', 'length', 'max'=>250),
			array('add_date, update_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, login_id, proposal_id, project_status, is_checked, title, description, add_date, update_date, status, for_user, notification, is_read, is_active', 'safe', 'on'=>'search'),
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
			'login' => array(self::BELONGS_TO, 'Users', 'login_id'),
			'notifications' => array(self::HAS_MANY, 'Notifications', 'log_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'login_id' => 'Login',
			'proposal_id' => 'Proposal',
			'project_status' => 'Project Status',
			'is_checked' => 'Is Checked',
			'title' => 'Title',
			'description' => 'Description',
			'add_date' => 'Add Date',
			'update_date' => 'Update Date',
			'status' => 'Status',
			'for_user' => 'For User',
			'notification' => 'Notification',
			'is_read' => 'Is Read',
			'is_active' => 'Is Active',
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
		$criteria->compare('login_id',$this->login_id);
		$criteria->compare('proposal_id',$this->proposal_id);
		$criteria->compare('project_status',$this->project_status);
		$criteria->compare('is_checked',$this->is_checked);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('for_user',$this->for_user);
		$criteria->compare('notification',$this->notification);
		$criteria->compare('is_read',$this->is_read);
		$criteria->compare('is_active',$this->is_active);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'id DESC',
			),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Log the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
