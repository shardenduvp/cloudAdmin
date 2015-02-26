<?php

/**
 * This is the model class for table "suppliers".
 *
 * The followings are the available columns in table 'suppliers':
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $cover
 * @property string $name
 * @property string $image
 * @property string $email
 * @property string $skype_id
 * @property string $website
 * @property string $phone_number
 * @property string $tagline
 * @property string $about_company
 * @property string $foundation_year
 * @property string $short_description
 * @property string $details
 * @property string $location
 * @property string $pricing_details
 * @property string $min_price
 * @property string $number_of_employee
 * @property string $total_available_employee
 * @property string $consultation_description
 * @property string $standard_pitch
 * @property string $standard_service_agreement
 * @property integer $profile_status
 * @property string $add_date
 * @property string $modification_date
 * @property string $rough_estimate
 * @property string $linkedin
 * @property string $facebook
 * @property string $google
 * @property string $twitter
 * @property string $you_tube
 * @property string $per_hour_rate
 * @property string $project_size
 * @property string $web_references
 * @property string $development_location
 * @property string $sales_location
 * @property string $response_time
 * @property integer $is_faq_completed
 * @property integer $is_application_submit
 * @property integer $status
 * @property integer $users_id
 * @property string $logo
 * @property string $default_q3_ans
 * @property string $default_q2_ans
 * @property string $default_q1_ans
 * @property string $default_q4_ans
 * @property string $accept_new_project_date
 * @property integer $is_profile_complete
 * @property integer $price_tier_id
 * @property string $payoneer_payee
 * @property string $payoneer_token
 * @property integer $link_status
 * @property string $offers
 *
 * The followings are the available model relations:
 * @property AwardsCertifications[] $awardsCertifications
 * @property SupplierHasMilestones[] $supplierHasMilestones
 * @property Users $users
 * @property SuppliersFaqAnswers[] $suppliersFaqAnswers
 * @property SuppliersHasCities[] $suppliersHasCities
 * @property SuppliersHasIndustries[] $suppliersHasIndustries
 * @property SuppliersHasPortfolio[] $suppliersHasPortfolios
 * @property SuppliersHasReferences[] $suppliersHasReferences
 * @property SuppliersHasServices[] $suppliersHasServices
 * @property SuppliersHasSkills[] $suppliersHasSkills
 * @property SuppliersProjects[] $suppliersProjects
 */
class Suppliers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */

	public function tableName()
	{
		return 'suppliers';
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
			array('profile_status, is_faq_completed, is_application_submit, status, users_id, is_profile_complete, price_tier_id, link_status', 'numerical', 'integerOnly'=>true),
			array('first_name, last_name', 'length', 'max'=>250),
			array('cover, image, pricing_details', 'length', 'max'=>500),
			array('name, standard_pitch, standard_service_agreement', 'length', 'max'=>255),
			array('email, skype_id, website, phone_number, tagline, location, project_size', 'length', 'max'=>45),
			array('foundation_year', 'length', 'max'=>10),
			array('short_description, offers', 'length', 'max'=>300),
			array('min_price, you_tube, logo', 'length', 'max'=>100),
			array('number_of_employee, total_available_employee, per_hour_rate, response_time', 'length', 'max'=>20),
			array('linkedin, facebook, google, twitter', 'length', 'max'=>200),
			array('web_references, development_location, sales_location', 'length', 'max'=>490),
			array('payoneer_payee, payoneer_token', 'length', 'max'=>145),
			array('about_company, details, consultation_description, add_date, modification_date, rough_estimate, default_q3_ans, default_q2_ans, default_q1_ans, default_q4_ans, accept_new_project_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, first_name, last_name, cover, name, image, email, skype_id, website, phone_number, tagline, about_company, foundation_year, short_description, details, location, pricing_details, min_price, number_of_employee, total_available_employee, consultation_description, standard_pitch, standard_service_agreement, profile_status, add_date, modification_date, rough_estimate, linkedin, facebook, google, twitter, you_tube, per_hour_rate, project_size, web_references, development_location, sales_location, response_time, is_faq_completed, is_application_submit, status, users_id, logo, default_q3_ans, default_q2_ans, default_q1_ans, default_q4_ans, accept_new_project_date, is_profile_complete, price_tier_id, payoneer_payee, payoneer_token, link_status, offers', 'safe', 'on'=>'search'),
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
			'awardsCertifications' => array(self::HAS_MANY, 'AwardsCertifications', 'suppliers_id'),
			'supplierHasMilestones' => array(self::HAS_MANY, 'SupplierHasMilestones', 'suppliers_id'),
			'users' => array(self::BELONGS_TO, 'Users', 'users_id'),
			'suppliersFaqAnswers' => array(self::HAS_MANY, 'SuppliersFaqAnswers', 'suppliers_id'),
			'suppliersHasCities' => array(self::HAS_MANY, 'SuppliersHasCities', 'suppliers_id'),
			'suppliersHasIndustries' => array(self::HAS_MANY, 'SuppliersHasIndustries', 'suppliers_id'),
			'suppliersHasPortfolios' => array(self::HAS_MANY, 'SuppliersHasPortfolio', 'suppliers_id'),
			'suppliersHasReferences' => array(self::HAS_MANY, 'SuppliersHasReferences', 'suppliers_id'),
			'suppliersHasServices' => array(self::HAS_MANY, 'SuppliersHasServices', 'suppliers_id'),
			'suppliersHasSkills' => array(self::HAS_MANY, 'SuppliersHasSkills', 'suppliers_id'),
			'suppliersProjects' => array(self::HAS_MANY, 'SuppliersProjects', 'suppliers_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Supplier ID *',
			'first_name' => 'First Name',
			'last_name' => 'Last Name',
			'cover' => 'Cover',
			'name' => 'Name',
			'image' => 'Image',
			'email' => 'Email',
			'skype_id' => 'Skype',
			'website' => 'Website',
			'phone_number' => 'Phone Number',
			'tagline' => 'Tagline',
			'about_company' => 'About Company',
			'foundation_year' => 'Foundation Year',
			'short_description' => 'Short Description',
			'details' => 'Details',
			'location' => 'Location',
			'pricing_details' => 'Pricing Details',
			'min_price' => 'Min Price',
			'number_of_employee' => 'Number Of Employee',
			'total_available_employee' => 'Total Available Employee',
			'consultation_description' => 'Consultation Description',
			'standard_pitch' => 'Standard Pitch',
			'standard_service_agreement' => 'Standard Service Agreement',
			'profile_status' => 'Profile Status',
			'add_date' => 'Add Date',
			'modification_date' => 'Modification Date',
			'rough_estimate' => 'Rough Estimate',
			'linkedin' => 'Linkedin',
			'facebook' => 'Facebook',
			'google' => 'Google',
			'twitter' => 'Twitter',
			'you_tube' => 'You Tube',
			'per_hour_rate' => 'Per Hour Rate',
			'project_size' => 'Project Size',
			'web_references' => 'Web References',
			'development_location' => 'Development Location',
			'sales_location' => 'Sales Location',
			'response_time' => 'Response Time',
			'is_faq_completed' => 'Is Faq Completed',
			'is_application_submit' => 'Is Application Submit',
			'status' => 'Status',
			'users_id' => 'Users ID',
			'logo' => 'Logo',
			'default_q3_ans' => 'Default Q3 Ans',
			'default_q2_ans' => 'Default Q2 Ans',
			'default_q1_ans' => 'Default Q1 Ans',
			'default_q4_ans' => 'Default Q4 Ans',
			'accept_new_project_date' => 'Accept New Project Date',
			'is_profile_complete' => 'Is Profile Complete',
			'price_tier_id' => 'Price Tier',
			'payoneer_payee' => 'Payoneer Payee',
			'payoneer_token' => 'Payoneer Token',
			'link_status' => 'Link Status',
			'offers' => 'Offers',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('cover',$this->cover,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('skype_id',$this->skype_id,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('phone_number',$this->phone_number,true);
		$criteria->compare('tagline',$this->tagline,true);
		$criteria->compare('about_company',$this->about_company,true);
		$criteria->compare('foundation_year',$this->foundation_year,true);
		$criteria->compare('short_description',$this->short_description,true);
		$criteria->compare('details',$this->details,true);
		$criteria->compare('location',$this->location,true);
		$criteria->compare('pricing_details',$this->pricing_details,true);
		$criteria->compare('min_price',$this->min_price,true);
		$criteria->compare('number_of_employee',$this->number_of_employee,true);
		$criteria->compare('total_available_employee',$this->total_available_employee,true);
		$criteria->compare('consultation_description',$this->consultation_description,true);
		$criteria->compare('standard_pitch',$this->standard_pitch,true);
		$criteria->compare('standard_service_agreement',$this->standard_service_agreement,true);
		$criteria->compare('profile_status',$this->profile_status);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('modification_date',$this->modification_date,true);
		$criteria->compare('rough_estimate',$this->rough_estimate,true);
		$criteria->compare('linkedin',$this->linkedin,true);
		$criteria->compare('facebook',$this->facebook,true);
		$criteria->compare('google',$this->google,true);
		$criteria->compare('twitter',$this->twitter,true);
		$criteria->compare('you_tube',$this->you_tube,true);
		$criteria->compare('per_hour_rate',$this->per_hour_rate,true);
		$criteria->compare('project_size',$this->project_size,true);
		$criteria->compare('web_references',$this->web_references,true);
		$criteria->compare('development_location',$this->development_location,true);
		$criteria->compare('sales_location',$this->sales_location,true);
		$criteria->compare('response_time',$this->response_time,true);
		$criteria->compare('is_faq_completed',$this->is_faq_completed);
		$criteria->compare('is_application_submit',$this->is_application_submit);
		$criteria->compare('status',$this->status);
		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('logo',$this->logo,true);
		$criteria->compare('default_q3_ans',$this->default_q3_ans,true);
		$criteria->compare('default_q2_ans',$this->default_q2_ans,true);
		$criteria->compare('default_q1_ans',$this->default_q1_ans,true);
		$criteria->compare('default_q4_ans',$this->default_q4_ans,true);
		$criteria->compare('accept_new_project_date',$this->accept_new_project_date,true);
		$criteria->compare('is_profile_complete',$this->is_profile_complete);
		$criteria->compare('price_tier_id',$this->price_tier_id);
		$criteria->compare('payoneer_payee',$this->payoneer_payee,true);
		$criteria->compare('payoneer_token',$this->payoneer_token,true);
		$criteria->compare('link_status',$this->link_status);
		$criteria->compare('offers',$this->offers,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Suppliers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
