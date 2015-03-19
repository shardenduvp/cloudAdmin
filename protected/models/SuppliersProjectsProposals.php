<?php

/**
 * This is the model class for table "suppliers_projects_proposals".
 *
 * The followings are the available columns in table 'suppliers_projects_proposals':
 * @property integer $id
 * @property integer $suppliers_id
 * @property integer $client_projects_id
 * @property string $pitch
 * @property string $estimated_cost
 * @property string $time_estimation
 * @property string $trial_period
 * @property string $chat_room_id
 * @property integer $status
 * @property string $add_date
 * @property string $comments
 * @property integer $min_price
 * @property integer $max_price
 * @property string $time_material
 * @property string $billing_schedule
 * @property string $start_date
 * @property string $default_q1_ans
 * @property string $default_q2_ans
 * @property string $default_q3_ans
 * @property string $default_q4_ans
 * @property string $default_q5_ans
 * @property string $default_q6_ans
 * @property string $others
 *
 * The followings are the available model relations:
 * @property SupplierDocuments[] $supplierDocuments
 * @property SuppliersProjectTeam[] $suppliersProjectTeams
 * @property ClientProjects $clientProjects
 * @property Suppliers $suppliers
 */
class SuppliersProjectsProposals extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'suppliers_projects_proposals';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('suppliers_id, client_projects_id', 'required'),
			array('suppliers_id, client_projects_id, status, min_price, max_price', 'numerical', 'integerOnly'=>true),
			array('estimated_cost, trial_period, others', 'length', 'max'=>45),
			array('time_estimation', 'length', 'max'=>250),
			array('chat_room_id, billing_schedule', 'length', 'max'=>100),
			array('time_material', 'length', 'max'=>50),
			array('pitch, add_date, comments, start_date, default_q1_ans,note, default_q2_ans, default_q3_ans, default_q4_ans, default_q5_ans, default_q6_ans', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, suppliers_id, client_projects_id, pitch, estimated_cost, time_estimation, trial_period, chat_room_id, status, add_date, comments, min_price, max_price, time_material, billing_schedule, start_date, default_q1_ans, default_q2_ans, default_q3_ans, default_q4_ans, default_q5_ans, default_q6_ans, others,note', 'safe', 'on'=>'search'),
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
			'supplierDocuments' => array(self::HAS_MANY, 'SupplierDocuments', 'suppliers_propsal_id'),
			'suppliersProjectTeams' => array(self::HAS_MANY, 'SuppliersProjectTeam', 'project_proposal_id'),
			'clientProjects' => array(self::BELONGS_TO, 'ClientProjects', 'client_projects_id'),
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
			'client_projects_id' => 'Client Projects',
			'pitch' => 'Pitch',
			'estimated_cost' => 'Estimated Cost',
			'time_estimation' => 'Time Estimation',
			'trial_period' => 'Trial Period',
			'chat_room_id' => 'Chat Room',
			'status' => 'Status',
			'add_date' => 'Add Date',
			'comments' => 'Comments',
			'min_price' => 'Min Price',
			'max_price' => 'Max Price',
			'time_material' => 'Time Material',
			'billing_schedule' => 'Billing Schedule',
			'start_date' => 'Start Date',
			'default_q1_ans' => 'Default Q1 Ans',
			'default_q2_ans' => 'Default Q2 Ans',
			'default_q3_ans' => 'Default Q3 Ans',
			'default_q4_ans' => 'Default Q4 Ans',
			'default_q5_ans' => 'Default Q5 Ans',
			'default_q6_ans' => 'Default Q6 Ans',
			'others' => 'Others',
			'note'=>'Note',
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
        
        $page_size = 50;
        if(isset($_REQUEST['pagesize']))
        {
            $page_size = $_REQUEST['pagesize'];   
        }
        
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('suppliers_id',$this->suppliers_id);
		$criteria->compare('client_projects_id',$this->client_projects_id);
		$criteria->compare('pitch',$this->pitch,true);
		$criteria->compare('estimated_cost',$this->estimated_cost,true);
		$criteria->compare('time_estimation',$this->time_estimation,true);
		$criteria->compare('trial_period',$this->trial_period,true);
		$criteria->compare('chat_room_id',$this->chat_room_id,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('min_price',$this->min_price);
		$criteria->compare('max_price',$this->max_price);
		$criteria->compare('time_material',$this->time_material,true);
		$criteria->compare('billing_schedule',$this->billing_schedule,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('note',$this->note,true);
		/*$criteria->compare('default_q1_ans',$this->default_q1_ans,true);
		$criteria->compare('default_q2_ans',$this->default_q2_ans,true);
		$criteria->compare('default_q3_ans',$this->default_q3_ans,true);
		$criteria->compare('default_q4_ans',$this->default_q4_ans,true);
		$criteria->compare('default_q5_ans',$this->default_q5_ans,true);
		$criteria->compare('default_q6_ans',$this->default_q6_ans,true);*/
		$criteria->compare('others',$this->others,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
				'defaultOrder'=>'client_projects_id DESC',
			),
			'pagination' => array('pageSize' => $page_size),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SuppliersProjectsProposals the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
