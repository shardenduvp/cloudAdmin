<?php

/**
 * This is the model class for table "suppliers_has_portfolio".
 *
 * The followings are the available columns in table 'suppliers_has_portfolio':
 * @property integer $id
 * @property integer $suppliers_id
 * @property string $project_name
 * @property string $project_link
 * @property string $description
 * @property integer $industry_id
 * @property integer $service_id
 * @property string $client_name
 * @property string $year_done
 * @property string $estimate_price
 * @property string $start_date
 * @property string $estimate_timeline
 * @property string $language_used
 * @property string $cover
 * @property string $add_date
 * @property integer $status
 * @property integer $portfolio_type
 * @property string $one_line_pitch
 * @property string $who_can
 * @property string $markets
 * @property string $portfolio_status
 * @property string $no_of_customers
 * @property string $launched_in
 * @property string $no_of_users
 * @property string $deployment
 * @property integer $is_free_trial
 * @property string $project_size
 * @property string $per_hour_rate
 * @property string $platform
 * @property string $company_name
 * @property integer $is_discreet
 * @property integer $location
 * @property string $image
 *
 * The followings are the available model relations:
 * @property Suppliers $suppliers
 * @property SuppliersHasPortfolioHasServices[] $suppliersHasPortfolioHasServices
 * @property SuppliersHasPortfolioHasSkills[] $suppliersHasPortfolioHasSkills
 * @property SuppliersHasReferences[] $suppliersHasReferences
 * @property SuppliersPortfolioHasIndustries[] $suppliersPortfolioHasIndustries
 * @property SuppliersPortfolioHasTeam[] $suppliersPortfolioHasTeams
 * @property SuppliersPortfolioImages[] $suppliersPortfolioImages
 */
class SuppliersHasPortfolio extends CActiveRecord
{

	public $matched, $rank;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'suppliers_has_portfolio';
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
			array('suppliers_id, industry_id, service_id, status, portfolio_type, is_free_trial, is_discreet, location', 'numerical', 'integerOnly'=>true),
			array('project_name, language_used, one_line_pitch, who_can, markets, platform', 'length', 'max'=>250),
			array('project_link, company_name', 'length', 'max'=>50),
			array('client_name, estimate_price, estimate_timeline, project_size, image', 'length', 'max'=>100),
			array('year_done', 'length', 'max'=>45),
			array('cover', 'length', 'max'=>500),
			array('portfolio_status, no_of_customers, launched_in, no_of_users, deployment, per_hour_rate', 'length', 'max'=>20),
			array('description, start_date, add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, suppliers_id, project_name, project_link, description, industry_id, service_id, client_name, year_done, estimate_price, start_date, estimate_timeline, language_used, cover, add_date, status, portfolio_type, one_line_pitch, who_can, markets, portfolio_status, no_of_customers, launched_in, no_of_users, deployment, is_free_trial, project_size, per_hour_rate, platform, company_name, is_discreet, location, image', 'safe', 'on'=>'search'),
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
			'suppliers' => array(self::BELONGS_TO, 'Suppliers', 'suppliers_id'),
			'suppliersHasPortfolioHasServices' => array(self::HAS_MANY, 'SuppliersHasPortfolioHasServices', 'suppliers_has_portfolio_id'),
			'suppliersHasPortfolioHasSkills' => array(self::HAS_MANY, 'SuppliersHasPortfolioHasSkills', 'suppliers_has_portfolio_id'),
			'suppliersHasReferences' => array(self::HAS_MANY, 'SuppliersHasReferences', 'suppliers_has_portfolio_id'),
			'suppliersPortfolioHasIndustries' => array(self::HAS_MANY, 'SuppliersPortfolioHasIndustries', 'suppliers_has_portfolio_id'),
			'suppliersPortfolioHasTeams' => array(self::HAS_MANY, 'SuppliersPortfolioHasTeam', 'suppliers_has_portfolio_id'),
			'suppliersPortfolioImages' => array(self::HAS_MANY, 'SuppliersPortfolioImages', 'suppliers_has_portfolio_id'),
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
			'project_name' => 'Project Name',
			'project_link' => 'Project Link',
			'description' => 'Description',
			'industry_id' => 'Industry',
			'service_id' => 'Service',
			'client_name' => 'Client Name',
			'year_done' => 'Year Done',
			'estimate_price' => 'Estimate Price',
			'start_date' => 'Start Date',
			'estimate_timeline' => 'Estimate Timeline',
			'language_used' => 'Language Used',
			'cover' => 'Cover',
			'add_date' => 'Add Date',
			'status' => 'Status',
			'portfolio_type' => 'Portfolio Type',
			'one_line_pitch' => 'One Line Pitch',
			'who_can' => 'Who Can',
			'markets' => 'Markets',
			'portfolio_status' => 'Portfolio Status',
			'no_of_customers' => 'No Of Customers',
			'launched_in' => 'Launched In',
			'no_of_users' => 'No Of Users',
			'deployment' => 'Deployment',
			'is_free_trial' => 'Is Free Trial',
			'project_size' => 'Project Size',
			'per_hour_rate' => 'Per Hour Rate',
			'platform' => 'Platform',
			'company_name' => 'Company Name',
			'is_discreet' => 'Is Discreet',
			'location' => 'Location',
			'image' => 'Image',
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
		$criteria->compare('project_name',$this->project_name,true);
		$criteria->compare('project_link',$this->project_link,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('industry_id',$this->industry_id);
		$criteria->compare('service_id',$this->service_id);
		$criteria->compare('client_name',$this->client_name,true);
		$criteria->compare('year_done',$this->year_done,true);
		$criteria->compare('estimate_price',$this->estimate_price,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('estimate_timeline',$this->estimate_timeline,true);
		$criteria->compare('language_used',$this->language_used,true);
		$criteria->compare('cover',$this->cover,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('portfolio_type',$this->portfolio_type);
		$criteria->compare('one_line_pitch',$this->one_line_pitch,true);
		$criteria->compare('who_can',$this->who_can,true);
		$criteria->compare('markets',$this->markets,true);
		$criteria->compare('portfolio_status',$this->portfolio_status,true);
		$criteria->compare('no_of_customers',$this->no_of_customers,true);
		$criteria->compare('launched_in',$this->launched_in,true);
		$criteria->compare('no_of_users',$this->no_of_users,true);
		$criteria->compare('deployment',$this->deployment,true);
		$criteria->compare('is_free_trial',$this->is_free_trial);
		$criteria->compare('project_size',$this->project_size,true);
		$criteria->compare('per_hour_rate',$this->per_hour_rate,true);
		$criteria->compare('platform',$this->platform,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('is_discreet',$this->is_discreet);
		$criteria->compare('location',$this->location);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SuppliersHasPortfolio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
