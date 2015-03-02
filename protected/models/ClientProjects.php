<?php

/**
 * This is the model class for table "client_projects".
 *
 * The followings are the available columns in table 'client_projects':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $tag_line
 * @property string $business_problem
 * @property string $about_company
 * @property string $team_size
 * @property string $summary
 * @property string $unique_features
 * @property string $min_budget
 * @property string $max_budget
 * @property string $custom_budget_range
 * @property string $start_date
 * @property string $project_start_preference
 * @property string $preferences
 * @property string $regions
 * @property string $tier
 * @property string $absolute_necessary_language
 * @property string $good_know_language
 * @property string $which_one_is_inportant
 * @property string $questions_for_supplier
 * @property string $requirement_change_scale
 * @property string $add_date
 * @property string $modify_date
 * @property string $is_call_scheduled
 * @property string $other_status
 * @property string $current_status
 * @property integer $status
 * @property integer $client_profiles_id
 * @property integer $current_status_id
 * @property string $other_current_status
 * @property integer $state
 *
 * The followings are the available model relations:
 * @property CallSchedules[] $callSchedules
 * @property ClientProjectDocuments[] $clientProjectDocuments
 * @property ClientProjectFlows[] $clientProjectFlows
 * @property ClientProjectProgress[] $clientProjectProgresses
 * @property ClientProfiles $clientProfiles
 * @property CurrentStatus $currentStatus
 * @property ClientProjectsHasIndustries[] $clientProjectsHasIndustries
 * @property ClientProjectsHasServices[] $clientProjectsHasServices
 * @property ClientProjectsHasSkills[] $clientProjectsHasSkills
 * @property ClientProjectsQuestions[] $clientProjectsQuestions
 * @property ProjectReferences[] $projectReferences
 * @property SuppliersProjects[] $suppliersProjects
 */
class ClientProjects extends CActiveRecord
{

	public $client_name;
	public $client_company_name;
	public $suppliers_name;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client_projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_profiles_id, current_status_id', 'required'),
			array('status, client_profiles_id, current_status_id, state', 'numerical', 'integerOnly'=>true),
			array('name, team_size, custom_budget_range, preferences, regions, tier, absolute_necessary_language, good_know_language, which_one_is_inportant, requirement_change_scale, is_call_scheduled, other_status, current_status', 'length', 'max'=>45),
			array('tag_line, project_start_preference, other_current_status', 'length', 'max'=>100),
			array('min_budget, max_budget', 'length', 'max'=>25),
			array('description, business_problem, about_company, summary, unique_features, start_date, questions_for_supplier, add_date, modify_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, tag_line, business_problem, about_company, team_size, summary, unique_features, min_budget, max_budget, custom_budget_range, start_date, project_start_preference, preferences, regions, tier, absolute_necessary_language, good_know_language, which_one_is_inportant, questions_for_supplier, requirement_change_scale, add_date, modify_date, is_call_scheduled, other_status, current_status, status, client_profiles_id, current_status_id, other_current_status, state', 'safe', 'on'=>'search'),
			array('id, name, description, tag_line, business_problem, about_company, team_size, summary, unique_features, min_budget, max_budget, custom_budget_range, start_date, project_start_preference, preferences, regions, tier, absolute_necessary_language, good_know_language, which_one_is_inportant, questions_for_supplier, requirement_change_scale, add_date, modify_date, is_call_scheduled, other_status, current_status, status, client_profiles_id, current_status_id, other_current_status, state, client_name, client_company_name, suppliers_name', 'safe', 'on'=>'leadSearch'),
			array('id, name, description, tag_line, business_problem, about_company, team_size, summary, unique_features, min_budget, max_budget, custom_budget_range, start_date, project_start_preference, preferences, regions, tier, absolute_necessary_language, good_know_language, which_one_is_inportant, questions_for_supplier, requirement_change_scale, add_date, modify_date, is_call_scheduled, other_status, current_status, status, client_profiles_id, current_status_id, other_current_status, state, client_name, client_company_name, suppliers_name', 'safe', 'on'=>'projectSearch'),
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
			'callSchedules' => array(self::HAS_MANY, 'CallSchedules', 'client_projects_id'),
			'clientProjectDocuments' => array(self::HAS_MANY, 'ClientProjectDocuments', 'client_projects_id'),
			'clientProjectFlows' => array(self::HAS_MANY, 'ClientProjectFlows', 'client_projects_id'),
			'clientProjectProgresses' => array(self::HAS_MANY, 'ClientProjectProgress', 'client_projects_id'),
			'clientProfiles' => array(self::BELONGS_TO, 'ClientProfiles', 'client_profiles_id'),
			'currentStatus' => array(self::BELONGS_TO, 'CurrentStatus', 'current_status_id'),
			'clientProjectsHasIndustries' => array(self::HAS_MANY, 'ClientProjectsHasIndustries', 'client_projects_id'),
			'clientProjectsHasServices' => array(self::HAS_MANY, 'ClientProjectsHasServices', 'client_projects_id'),
			'clientProjectsHasSkills' => array(self::HAS_MANY, 'ClientProjectsHasSkills', 'client_projects_id'),
			'clientProjectsQuestions' => array(self::HAS_MANY, 'ClientProjectsQuestions', 'client_projects_id'),
			'projectReferences' => array(self::HAS_MANY, 'ProjectReferences', 'client_projects_id'),
			'suppliersProjects' => array(self::HAS_MANY, 'SuppliersProjects', 'client_projects_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Project Name',
			'description' => 'Description',
			'tag_line' => 'Tag Line',
			'business_problem' => 'Business Problem',
			'about_company' => 'About Company',
			'team_size' => 'Team Size',
			'summary' => 'Summary',
			'unique_features' => 'Unique Features',
			'min_budget' => 'Min Budget',
			'max_budget' => 'Max Budget',
			'custom_budget_range' => 'Custom Budget Range',
			'start_date' => 'Submitted On',
			'project_start_preference' => 'Project Start Preference',
			'preferences' => 'Preferences',
			'regions' => 'Regions',
			'tier' => 'Tier',
			'absolute_necessary_language' => 'Absolute Necessary Language',
			'good_know_language' => 'Good Know Language',
			'which_one_is_important' => 'Which One Is Important',
			'questions_for_supplier' => 'Questions For Supplier',
			'requirement_change_scale' => 'Requirement Change Scale',
			'add_date' => 'Add Date',
			'modify_date' => 'Modify Date',
			'is_call_scheduled' => 'Is Call Scheduled',
			'other_status' => 'Other Status',
			'current_status' => 'Current Status',
			'status' => 'Status',
			'client_profiles_id' => 'Client Profiles',
			'current_status_id' => 'Current Status',
			'other_current_status' => 'Other Current Status',
			'state' => 'State',
			'client_name' => 'Client Name',
			'suppliers_name' => 'Suppliers Name',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('tag_line',$this->tag_line,true);
		$criteria->compare('business_problem',$this->business_problem,true);
		$criteria->compare('about_company',$this->about_company,true);
		$criteria->compare('team_size',$this->team_size,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('unique_features',$this->unique_features,true);
		$criteria->compare('min_budget',$this->min_budget,true);
		$criteria->compare('max_budget',$this->max_budget,true);
		$criteria->compare('custom_budget_range',$this->custom_budget_range,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('project_start_preference',$this->project_start_preference,true);
		$criteria->compare('preferences',$this->preferences,true);
		$criteria->compare('regions',$this->regions,true);
		$criteria->compare('tier',$this->tier,true);
		$criteria->compare('absolute_necessary_language',$this->absolute_necessary_language,true);
		$criteria->compare('good_know_language',$this->good_know_language,true);
		$criteria->compare('which_one_is_inportant',$this->which_one_is_inportant,true);
		$criteria->compare('questions_for_supplier',$this->questions_for_supplier,true);
		$criteria->compare('requirement_change_scale',$this->requirement_change_scale,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('modify_date',$this->modify_date,true);
		$criteria->compare('is_call_scheduled',$this->is_call_scheduled,true);
		$criteria->compare('other_status',$this->other_status,true);
		$criteria->compare('current_status',$this->current_status,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('current_status_id',$this->current_status_id);
		$criteria->compare('other_current_status',$this->other_current_status,true);
		$criteria->compare('state',$this->state);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}


	/**
	 * DataProvider for Clients Project
	 * Models Used:
	 * - ClientProjects (this)
	 * - ClientProfiles
	 * - Users
	 * - SuppliersProjects
	 * - Suppliers
	 * 
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function leadSearch()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;
		$criteria->addCondition('t.status <= 3');

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.description',$this->description,true);
		$criteria->compare('t.unique_features',$this->unique_features,true);
		$criteria->compare('t.min_budget',$this->min_budget,true);
		$criteria->compare('t.max_budget',$this->max_budget,true);
		$criteria->compare('t.custom_budget_range',$this->custom_budget_range,true);
		$criteria->compare('t.start_date',$this->start_date,true);
		$criteria->compare('t.project_start_preference',$this->project_start_preference,true);
		$criteria->compare('t.preferences',$this->preferences,true);
		$criteria->compare('t.regions',$this->regions,true);
		$criteria->compare('t.tier',$this->tier,true);
		$criteria->compare('t.absolute_necessary_language',$this->absolute_necessary_language,true);
		$criteria->compare('t.good_know_language',$this->good_know_language,true);
		$criteria->compare('t.which_one_is_inportant',$this->which_one_is_inportant,true);
		$criteria->compare('t.questions_for_supplier',$this->questions_for_supplier,true);
		$criteria->compare('t.requirement_change_scale',$this->requirement_change_scale,true);
		$criteria->compare('t.add_date',$this->add_date,true);
		$criteria->compare('t.modify_date',$this->modify_date,true);
		$criteria->compare('t.is_call_scheduled',$this->is_call_scheduled,true);
		$criteria->compare('t.other_status',$this->other_status,true);
		$criteria->compare('t.current_status',$this->current_status,true);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.current_status_id',$this->current_status_id);
		$criteria->compare('t.other_current_status',$this->other_current_status,true);
		$criteria->compare('t.state',$this->state);

		$criteria->compare('users.company_name', $this->client_company_name, true);
		$criteria->compare('CONCAT(users.first_name, \' \', users.last_name)', $this->client_name, true);

		$criteria->compare('supplier.company_name', $this->suppliers_name, true);
		$criteria->with = array(
		    'clientProfiles.users'=>array('select'=>'users.company_name, users.first_name, users.last_name'),
		    'suppliersProjects.suppliers.users'=>array('alias'=>'supplier', 'select'=>'supplier.company_name, supplier.id'),
		);
		$criteria->together = true;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
		        'attributes'=>array(
		            'client_name'=>array(
		                'asc'=>'users.first_name',
		                'desc'=>'users.first_name DESC',
		            ),
		            'client_company_name'=>array(
		                'asc'=>'users.company_name',
		                'desc'=>'users.company_name DESC',
		            ),
		            'suppliers_name'=>array(
		                'asc'=>'supplier.company_name',
		                'desc'=>'supplier.company_name DESC',
		            ),
		            '*',
		        ),
		    ),
		));
	}

	/**
	 * DataProvider for New Leads
	 * Models Used:
	 * - ClientProjects (this)
	 * - ClientProfiles
	 * - Users
	 * - SuppliersProjects
	 * - Suppliers
	 * 
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function projectSearch()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('t.id',$this->id);
		$criteria->compare('t.name',$this->name,true);
		$criteria->compare('t.description',$this->description,true);
		$criteria->compare('t.unique_features',$this->unique_features,true);
		$criteria->compare('t.min_budget',$this->min_budget,true);
		$criteria->compare('t.max_budget',$this->max_budget,true);
		$criteria->compare('t.custom_budget_range',$this->custom_budget_range,true);
		$criteria->compare('t.start_date',$this->start_date,true);
		$criteria->compare('t.project_start_preference',$this->project_start_preference,true);
		$criteria->compare('t.preferences',$this->preferences,true);
		$criteria->compare('t.regions',$this->regions,true);
		$criteria->compare('t.tier',$this->tier,true);
		$criteria->compare('t.absolute_necessary_language',$this->absolute_necessary_language,true);
		$criteria->compare('t.good_know_language',$this->good_know_language,true);
		$criteria->compare('t.which_one_is_inportant',$this->which_one_is_inportant,true);
		$criteria->compare('t.questions_for_supplier',$this->questions_for_supplier,true);
		$criteria->compare('t.requirement_change_scale',$this->requirement_change_scale,true);
		$criteria->compare('t.add_date',$this->add_date,true);
		$criteria->compare('t.modify_date',$this->modify_date,true);
		$criteria->compare('t.is_call_scheduled',$this->is_call_scheduled,true);
		$criteria->compare('t.other_status',$this->other_status,true);
		$criteria->compare('t.current_status',$this->current_status,true);
		$criteria->compare('t.status',$this->status);
		$criteria->compare('t.current_status_id',$this->current_status_id);
		$criteria->compare('t.other_current_status',$this->other_current_status,true);
		$criteria->compare('t.state',$this->state);

		$criteria->compare('users.company_name', $this->client_company_name, true);
		$criteria->compare('CONCAT(users.first_name, \' \', users.last_name)', $this->client_name, true);

		$criteria->compare('supplier.company_name', $this->suppliers_name, true);
		$criteria->with = array(
		    'clientProfiles.users'=>array('select'=>'users.company_name, users.first_name, users.last_name'),
		    'suppliersProjects.suppliers.users'=>array('alias'=>'supplier', 'select'=>'supplier.company_name, supplier.id'),
		);
		$criteria->together = true;

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
		        'attributes'=>array(
		            'client_name'=>array(
		                'asc'=>'users.first_name',
		                'desc'=>'users.first_name DESC',
		            ),
		            'client_company_name'=>array(
		                'asc'=>'users.company_name',
		                'desc'=>'users.company_name DESC',
		            ),
		            'suppliers_name'=>array(
		                'asc'=>'supplier.company_name',
		                'desc'=>'supplier.company_name DESC',
		            ),
		            '*',
		        ),
		    ),
		));
	}


	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClientProjects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	/**
     * Custom methods for cell value in CGridView 
     * @param $data and $row for which the method is called 
     */
    public function getSuppliers($data)
    {
        $suppliers_projects = $data->suppliersProjects;
        if(empty($suppliers_projects)) return "None";

        $value = "";
        $suppliers = array();
        foreach ($suppliers_projects as $suppliers_project) {
            array_push($suppliers, $suppliers_project->suppliers);
        }
        foreach($suppliers as $supplier) {
            $value .= CHtml::link(ucwords($supplier->users->company_name), array("/admin/users/view", "id"=>$supplier->users->id), array(
                                  'class'=>'label label-primary',
                            )) . "  ";
        }
        return rtrim($value, ", ");
    }
}
