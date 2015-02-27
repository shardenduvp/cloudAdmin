<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property integer $id
 * @property string $last_name
 * @property string $first_name
 * @property string $image
 * @property string $company_name
 * @property string $display_name
 * @property string $username
 * @property string $phone_number
 * @property string $password
 * @property string $linkedin
 * @property string $role
 * @property string $add_date
 * @property string $last_login
 * @property integer $status
 * @property integer $role_id
 *
 * The followings are the available model relations:
 * @property ChatRoom[] $chatRooms
 * @property ChatRoomHasUsers[] $chatRoomHasUsers
 * @property ClientProfiles[] $clientProfiles
 * @property LinkedinConnections[] $linkedinConnections
 * @property Log[] $logs
 * @property Notifications[] $notifications
 * @property ProposalPitches[] $proposalPitches
 * @property Suppliers[] $suppliers
 * @property Team[] $teams
 * @property Role $role0
 * @property UsersHasCities[] $usersHasCities
 * @property UsersHasTeam[] $usersHasTeams
 * @property UsersOffices[] $usersOffices
 * @property UsersTeamMembers[] $usersTeamMembers
 */
class Users extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('role_id', 'required'),
			array('status, role_id', 'numerical', 'integerOnly'=>true),
			array('last_name, first_name, role', 'length', 'max'=>45),
			array('image, linkedin', 'length', 'max'=>200),
			array('company_name, display_name', 'length', 'max'=>100),
			array('username, password', 'length', 'max'=>30),
			array('phone_number', 'length', 'max'=>25),
			array('add_date, last_login', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, last_name, first_name, image, company_name, display_name, username, phone_number, password, linkedin, role, add_date, last_login, status, role_id', 'safe', 'on'=>'search'),
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
			'chatRooms' => array(self::HAS_MANY, 'ChatRoom', 'users_id'),
			'chatRoomHasUsers' => array(self::HAS_MANY, 'ChatRoomHasUsers', 'users_id'),
			'clientProfiles' => array(self::HAS_MANY, 'ClientProfiles', 'users_id'),
			'linkedinConnections' => array(self::HAS_MANY, 'LinkedinConnections', 'users_id'),
			'logs' => array(self::HAS_MANY, 'Log', 'login_id'),
			'notifications' => array(self::HAS_MANY, 'Notifications', 'users_id'),
			'proposalPitches' => array(self::HAS_MANY, 'ProposalPitches', 'users_id'),
			'suppliers' => array(self::HAS_MANY, 'Suppliers', 'users_id'),
			'teams' => array(self::HAS_MANY, 'Team', 'users_id'),
			'role0' => array(self::BELONGS_TO, 'Role', 'role_id'),
			'usersHasCities' => array(self::HAS_MANY, 'UsersHasCities', 'users_id'),
			'usersHasTeams' => array(self::HAS_MANY, 'UsersHasTeam', 'users_id'),
			'usersOffices' => array(self::HAS_MANY, 'UsersOffices', 'user_id'),
			'usersTeamMembers' => array(self::HAS_MANY, 'UsersTeamMembers', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'last_name' => 'Last Name',
			'first_name' => 'First Name',
			'image' => 'Image',
			'company_name' => 'Company Name',
			'display_name' => 'Display Name',
			'username' => 'Username',
			'phone_number' => 'Phone Number',
			'password' => 'Password',
			'linkedin' => 'Linkedin',
			'role' => 'Role',
			'add_date' => 'Add Date',
			'last_login' => 'Last Login',
			'status' => 'Status',
			'role_id' => 'Select Role',
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
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('display_name',$this->display_name,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('linkedin',$this->linkedin,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('last_login',$this->last_login,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('role_id',$this->role_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
