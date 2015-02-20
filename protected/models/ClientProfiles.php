<?php

/**
 * This is the model class for table "client_profiles".
 *
 * The followings are the available columns in table 'client_profiles':
 * @property integer $id
 * @property integer $users_id
 * @property string $first_name
 * @property string $last_name
 * @property string $company_name
 * @property string $company_link
 * @property string $skype_id
 * @property string $email
 * @property string $phone_number
 * @property string $address1
 * @property string $team_size
 * @property string $category
 * @property string $foundation_year
 * @property string $image
 * @property string $description
 * @property string $add_date
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property ClientMilestones[] $clientMilestones
 * @property Users $users
 * @property ClientProfilesHasCities[] $clientProfilesHasCities
 * @property ClientProjects[] $clientProjects
 * @property ClientServices[] $clientServices
 * @property SuppliersHasReferences[] $suppliersHasReferences
 */
class ClientProfiles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client_profiles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('users_id', 'required'),
			array('users_id, status', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name, company_name, email, phone_number, team_size', 'length', 'max'=>45),
			array('company_link', 'length', 'max'=>245),
			array('skype_id', 'length', 'max'=>100),
			array('address1', 'length', 'max'=>250),
			array('category', 'length', 'max'=>50),
			array('foundation_year', 'length', 'max'=>5),
			array('image', 'length', 'max'=>500),
			array('description, add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, users_id, first_name, last_name, company_name, company_link, skype_id, email, phone_number, address1, team_size, category, foundation_year, image, description, add_date, status', 'safe', 'on'=>'search'),
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
			'clientMilestones' => array(self::HAS_MANY, 'ClientMilestones', 'client_profiles_id'),
			'users' => array(self::BELONGS_TO, 'Users', 'users_id'),
			'clientProfilesHasCities' => array(self::HAS_MANY, 'ClientProfilesHasCities', 'client_profiles_id'),
			'clientProjects' => array(self::HAS_MANY, 'ClientProjects', 'client_profiles_id'),
			'clientServices' => array(self::HAS_MANY, 'ClientServices', 'client_profiles_id'),
			'suppliersHasReferences' => array(self::HAS_MANY, 'SuppliersHasReferences', 'client_profiles_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'users_id' => 'Users',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'company_name' => 'Company Name',
			'company_link' => 'Company Link',
			'skype_id' => 'Skype',
			'email' => 'Email',
			'phone_number' => 'Phone Number',
			'address1' => 'Address1',
			'team_size' => 'Team Size',
			'category' => 'Category',
			'foundation_year' => 'Foundation Year',
			'image' => 'Image',
			'description' => 'Description',
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
		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('company_link',$this->company_link,true);
		$criteria->compare('skype_id',$this->skype_id,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('address1',$this->address1,true);
		$criteria->compare('team_size',$this->team_size,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('foundation_year',$this->foundation_year,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('description',$this->description,true);
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
	 * @return ClientProfiles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
