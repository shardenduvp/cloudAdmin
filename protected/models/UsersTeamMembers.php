<?php

/**
 * This is the model class for table "users_team_members".
 *
 * The followings are the available columns in table 'users_team_members':
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $designation
 * @property string $dep
 * @property string $image
 * @property string $linkedin
 * @property string $facebook
 * @property string $twitter
 * @property string $add_date
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Users $user
 */
class UsersTeamMembers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users_team_members';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id', 'required'),
			array('user_id, status', 'numerical', 'integerOnly'=>true),
			array('name, designation, dep, facebook', 'length', 'max'=>250),
			array('image, twitter', 'length', 'max'=>100),
			array('linkedin', 'length', 'max'=>500),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, name, designation, dep, image, linkedin, facebook, twitter, add_date, status', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Users', 'user_id'),
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
			'name' => 'Name',
			'designation' => 'Designation',
			'dep' => 'Dep',
			'image' => 'Image',
			'linkedin' => 'Linkedin',
			'facebook' => 'Facebook',
			'twitter' => 'Twitter',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('designation',$this->designation,true);
		$criteria->compare('dep',$this->dep,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('linkedin',$this->linkedin,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('twitter',$this->twitter,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return UsersTeamMembers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
