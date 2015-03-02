<?php

/**
 * This is the model class for table "team".
 *
 * The followings are the available columns in table 'team':
 * @property integer $id
 * @property integer $add_by
 * @property integer $users_id
 * @property string $first_name
 * @property string $last_name
 * @property string $about
 * @property string $expertise_skills
 * @property string $education
 * @property string $experiance
 * @property string $dob
 * @property string $email
 * @property string $phone
 * @property string $skype
 * @property string $image
 * @property string $address
 * @property string $pincode
 * @property integer $status
 * @property string $type
 * @property string $position
 * @property string $linkedin
 * @property string $google
 * @property string $twitter
 * @property string $facebook
 *
 * The followings are the available model relations:
 * @property Users $users
 * @property UsersHasTeam[] $usersHasTeams
 */
class Team extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'team';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('add_by, users_id', 'required'),
			array('add_by, users_id, status', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, email, position', 'length', 'max'=>45),
			array('about, expertise_skills, education', 'length', 'max'=>245),
			array('phone, skype', 'length', 'max'=>25),
			array('image, linkedin, google, twitter, facebook', 'length', 'max'=>100),
			array('address', 'length', 'max'=>250),
			array('pincode', 'length', 'max'=>15),
			array('type', 'length', 'max'=>30),
			array('experiance, dob', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, add_by, users_id, first_name, last_name, about, expertise_skills, education, experiance, dob, email, phone, skype, image, address, pincode, status, type, position, linkedin, google, twitter, facebook', 'safe', 'on'=>'search'),
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
			'users' => array(self::BELONGS_TO, 'Users', 'users_id'),
			'usersHasTeams' => array(self::HAS_MANY, 'UsersHasTeam', 'team_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'add_by' => 'Add By',
			'users_id' => 'Users',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'about' => 'About',
			'expertise_skills' => 'Expertise Skills',
			'education' => 'Education',
			'experiance' => 'Experiance',
			'dob' => 'Dob',
			'email' => 'Email',
			'phone' => 'Phone',
			'skype' => 'Skype',
			'image' => 'Image',
			'address' => 'Address',
			'pincode' => 'Pincode',
			'status' => 'Status',
			'type' => 'Type',
			'position' => 'Position',
			'linkedin' => 'Linkedin',
			'google' => 'Google',
			'twitter' => 'Twitter',
			'facebook' => 'Facebook',
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
		$criteria->compare('add_by',$this->add_by);
		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('about',$this->about,true);
		$criteria->compare('expertise_skills',$this->expertise_skills,true);
		$criteria->compare('education',$this->education,true);
		$criteria->compare('experiance',$this->experiance,true);
		$criteria->compare('dob',$this->dob,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone',$this->phone,true);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('pincode',$this->pincode,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('linkedin',$this->linkedin,true);
		$criteria->compare('google',$this->google,true);
		$criteria->compare('twitter',$this->twitter,true);
		$criteria->compare('facebook',$this->facebook,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Team the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
