<?php

/**
 * This is the model class for table "linkedin_connections".
 *
 * The followings are the available columns in table 'linkedin_connections':
 * @property integer $id
 * @property string $linkedin_Id
 * @property string $first_name
 * @property string $last_name
 * @property string $headline
 * @property string $image
 * @property string $industry
 * @property string $location
 * @property string $url
 * @property string $add_date
 * @property integer $status
 * @property integer $cities_id
 * @property integer $users_id
 *
 * The followings are the available model relations:
 * @property Cities $cities
 * @property Users $users
 */
class LinkedinConnections extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'linkedin_connections';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('linkedin_Id, cities_id, users_id', 'required'),
			array('status, cities_id, users_id', 'numerical', 'integerOnly'=>true),
			array('linkedin_Id, location', 'length', 'max'=>100),
			array('first_name, last_name', 'length', 'max'=>45),
			array('headline, industry, url', 'length', 'max'=>245),
			array('image', 'length', 'max'=>255),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, linkedin_Id, first_name, last_name, headline, image, industry, location, url, add_date, status, cities_id, users_id', 'safe', 'on'=>'search'),
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
			'cities' => array(self::BELONGS_TO, 'Cities', 'cities_id'),
			'users' => array(self::BELONGS_TO, 'Users', 'users_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'linkedin_Id' => 'Linkedin',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'headline' => 'Headline',
			'image' => 'Image',
			'industry' => 'Industry',
			'location' => 'Location',
			'url' => 'Url',
			'add_date' => 'Add Date',
			'status' => 'Status',
			'cities_id' => 'Cities',
			'users_id' => 'Users',
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
		$criteria->compare('linkedin_Id',$this->linkedin_Id,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('headline',$this->headline,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('industry',$this->industry,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('cities_id',$this->cities_id);
		$criteria->compare('users_id',$this->users_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LinkedinConnections the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
