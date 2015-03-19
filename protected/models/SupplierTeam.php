<?php

/**
 * This is the model class for table "supplier_team".
 *
 * The followings are the available columns in table 'supplier_team':
 * @property integer $id
 * @property integer $suppliers_id
 * @property string $type
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
 *
 * The followings are the available model relations:
 * @property ClientProjectsHasSupplierTeam[] $clientProjectsHasSupplierTeams
 * @property Suppliers $suppliers
 */
class SupplierTeam extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'supplier_team';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('suppliers_id', 'required'),
			array('suppliers_id, status', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>30),
			array('first_name, last_name, email, image, address', 'length', 'max'=>45),
			array('about', 'length', 'max'=>255),
			array('expertise_skills, education', 'length', 'max'=>245),
			array('phone, skype', 'length', 'max'=>25),
			array('pincode', 'length', 'max'=>15),
			array('experiance, dob', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, suppliers_id, type, first_name, last_name, about, expertise_skills, education, experiance, dob, email, phone, skype, image, address, pincode, status', 'safe', 'on'=>'search'),
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
			'clientProjectsHasSupplierTeams' => array(self::HAS_MANY, 'ClientProjectsHasSupplierTeam', 'supplier_team_id'),
			'suppliers' => array(self::BELONGS_TO, 'Suppliers', 'suppliers_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'suppliers_id' => 'Suppliers',
			'type' => 'Type',
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
		$criteria->compare('suppliers_id',$this->suppliers_id);
		$criteria->compare('type',$this->type,true);
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SupplierTeam the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
