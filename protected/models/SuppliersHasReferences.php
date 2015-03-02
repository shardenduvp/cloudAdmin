<?php

/**
 * This is the model class for table "suppliers_has_references".
 *
 * The followings are the available columns in table 'suppliers_has_references':
 * @property integer $id
 * @property string $project_name
 * @property string $project_description
 * @property string $company_name
 * @property string $client_email
 * @property string $year_engagement
 * @property integer $communication_rating
 * @property integer $skill_rating
 * @property integer $timeline_rating
 * @property integer $independence_rating
 * @property string $provide_do_well
 * @property string $provider_improve
 * @property string $tag_line
 * @property string $add_date
 * @property string $modified
 * @property integer $suppliers_id
 * @property integer $client_profiles_id
 * @property integer $suppliers_has_portfolio_id
 * @property string $client_first_name
 * @property string $client_last_name
 * @property integer $follow_venturepact
 * @property integer $is_unattributed
 * @property integer $email_hide
 * @property integer $review_type
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property SuppliersHasCategoryRating[] $suppliersHasCategoryRatings
 * @property ClientProfiles $clientProfiles
 * @property Suppliers $suppliers
 * @property SuppliersHasPortfolio $suppliersHasPortfolio
 * @property SuppliersReferencesQuestions[] $suppliersReferencesQuestions
 */
class SuppliersHasReferences extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'suppliers_has_references';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('suppliers_id, client_profiles_id, suppliers_has_portfolio_id', 'required'),
			array('communication_rating, skill_rating, timeline_rating, independence_rating, suppliers_id, client_profiles_id, suppliers_has_portfolio_id, follow_venturepact, is_unattributed, email_hide, review_type, status', 'numerical', 'integerOnly'=>true),
			array('project_name', 'length', 'max'=>100),
			array('company_name, client_email, year_engagement, client_first_name, client_last_name', 'length', 'max'=>45),
			array('project_description, provide_do_well, provider_improve, tag_line, add_date, modified', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, project_name, project_description, company_name, client_email, year_engagement, communication_rating, skill_rating, timeline_rating, independence_rating, provide_do_well, provider_improve, tag_line, add_date, modified, suppliers_id, client_profiles_id, suppliers_has_portfolio_id, client_first_name, client_last_name, follow_venturepact, is_unattributed, email_hide, review_type, status', 'safe', 'on'=>'search'),
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
			'suppliersHasCategoryRatings' => array(self::HAS_MANY, 'SuppliersHasCategoryRating', 'suppliers_has_references_id'),
			'clientProfiles' => array(self::BELONGS_TO, 'ClientProfiles', 'client_profiles_id'),
			'suppliers' => array(self::BELONGS_TO, 'Suppliers', 'suppliers_id'),
			'suppliersHasPortfolio' => array(self::BELONGS_TO, 'SuppliersHasPortfolio', 'suppliers_has_portfolio_id'),
			'suppliersReferencesQuestions' => array(self::HAS_MANY, 'SuppliersReferencesQuestions', 'suppliers_has_references_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'project_name' => 'Project Name',
			'project_description' => 'Project Description',
			'company_name' => 'Company Name',
			'client_email' => 'Client Email',
			'year_engagement' => 'Year Engagement',
			'communication_rating' => 'Communication Rating',
			'skill_rating' => 'Skill Rating',
			'timeline_rating' => 'Timeline Rating',
			'independence_rating' => 'Independence Rating',
			'provide_do_well' => 'Provide Do Well',
			'provider_improve' => 'Provider Improve',
			'tag_line' => 'Tag Line',
			'add_date' => 'Add Date',
			'modified' => 'Modified',
			'suppliers_id' => 'Suppliers',
			'client_profiles_id' => 'Client Profiles',
			'suppliers_has_portfolio_id' => 'Suppliers Has Portfolio',
			'client_first_name' => 'Client First Name',
			'client_last_name' => 'Client Last Name',
			'follow_venturepact' => 'Follow Venturepact',
			'is_unattributed' => 'Is Unattributed',
			'email_hide' => 'Email Hide',
			'review_type' => 'Review Type',
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
		$criteria->compare('project_name',$this->project_name,true);
		$criteria->compare('project_description',$this->project_description,true);
		$criteria->compare('company_name',$this->company_name,true);
		$criteria->compare('client_email',$this->client_email,true);
		$criteria->compare('year_engagement',$this->year_engagement,true);
		$criteria->compare('communication_rating',$this->communication_rating);
		$criteria->compare('skill_rating',$this->skill_rating);
		$criteria->compare('timeline_rating',$this->timeline_rating);
		$criteria->compare('independence_rating',$this->independence_rating);
		$criteria->compare('provide_do_well',$this->provide_do_well,true);
		$criteria->compare('provider_improve',$this->provider_improve,true);
		$criteria->compare('tag_line',$this->tag_line,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('suppliers_id',$this->suppliers_id);
		$criteria->compare('client_profiles_id',$this->client_profiles_id);
		$criteria->compare('suppliers_has_portfolio_id',$this->suppliers_has_portfolio_id);
		$criteria->compare('client_first_name',$this->client_first_name,true);
		$criteria->compare('client_last_name',$this->client_last_name,true);
		$criteria->compare('follow_venturepact',$this->follow_venturepact);
		$criteria->compare('is_unattributed',$this->is_unattributed);
		$criteria->compare('email_hide',$this->email_hide);
		$criteria->compare('review_type',$this->review_type);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SuppliersHasReferences the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
