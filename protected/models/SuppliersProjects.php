<?php

/**
 * This is the model class for table "suppliers_projects".
 *
 * The followings are the available columns in table 'suppliers_projects':
 * @property integer $id
 * @property string $pitch
 * @property string $about_project
 * @property string $why_you
 * @property string $estimated_cost
 * @property string $estimated_time
 * @property string $trial_period
 * @property integer $chat_room_id
 * @property string $comments
 * @property integer $min_price
 * @property integer $max_price
 * @property string $time_material
 * @property string $billing_schedule
 * @property string $start_date
 * @property string $note
 * @property integer $is_escrow
 * @property string $others
 * @property string $add_date
 * @property integer $status
 * @property integer $client_projects_id
 * @property integer $suppliers_id
 * @property string $default_q1_ans
 * @property string $default_q2_ans
 * @property string $default_q3_ans
 * @property string $default_q4_ans
 * @property string $default_q5_ans
 * @property string $default_q6_ans
 *
 * The followings are the available model relations:
 * @property ProposalDocuments[] $proposalDocuments
 * @property ProposalPitches[] $proposalPitches
 * @property ClientProjects $clientProjects
 * @property Suppliers $suppliers
 */
class SuppliersProjects extends CActiveRecord
{
	public $supplier_search;
	public $client_search;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'suppliers_projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('chat_room_id, client_projects_id, suppliers_id', 'required'),
			array('chat_room_id, min_price, max_price, is_escrow, status, client_projects_id, suppliers_id', 'numerical', 'integerOnly'=>true),
			array('estimated_cost, estimated_time, trial_period, time_material, billing_schedule, others', 'length', 'max'=>45),
			array('pitch, about_project, why_you, comments, start_date, note, add_date, default_q1_ans, default_q2_ans, default_q3_ans, default_q4_ans, default_q5_ans, default_q6_ans', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pitch, about_project, why_you, estimated_cost, estimated_time, trial_period, chat_room_id, comments, min_price, max_price, time_material, billing_schedule, start_date, note, is_escrow, others, add_date, status, client_projects_id, suppliers_id, default_q1_ans, default_q2_ans, default_q3_ans, default_q4_ans, default_q5_ans, default_q6_ans, supplier_search, client_search', 'safe', 'on'=>'search'),
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
			'proposalDocuments' => array(self::HAS_MANY, 'ProposalDocuments', 'proposals_id'),
			'proposalPitches' => array(self::HAS_MANY, 'ProposalPitches', 'suppliers_projects_id'),
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
			'pitch' => 'Pitch',
			'about_project' => 'About Project',
			'why_you' => 'Why You',
			'estimated_cost' => 'Estimated Cost',
			'estimated_time' => 'Estimated Time',
			'trial_period' => 'Trial Period',
			'chat_room_id' => 'Chat Room',
			'comments' => 'Comments',
			'min_price' => 'Min Price',
			'max_price' => 'Max Price',
			'time_material' => 'Time Material',
			'billing_schedule' => 'Billing Schedule',
			'start_date' => 'Start Date',
			'note' => 'Note',
			'is_escrow' => 'Is Escrow',
			'others' => 'Others',
			'add_date' => 'Add Date',
			'status' => 'Status',
			'client_projects_id' => 'Client Projects',
			'suppliers_id' => 'Suppliers',
			'default_q1_ans' => 'Default Q1 Ans',
			'default_q2_ans' => 'Default Q2 Ans',
			'default_q3_ans' => 'Default Q3 Ans',
			'default_q4_ans' => 'Default Q4 Ans',
			'default_q5_ans' => 'Default Q5 Ans',
			'default_q6_ans' => 'Default Q6 Ans',
			'supplier_search' => 'Suppliers',
			'client_search' => 'clientProjects',
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
		$criteria->with = array('suppliers');
		$criteria->with = array('clientProjects');

		$criteria->compare('id',$this->id);
		$criteria->compare('pitch',$this->pitch,true);
		$criteria->compare('about_project',$this->about_project,true);
		$criteria->compare('why_you',$this->why_you,true);
		$criteria->compare('estimated_cost',$this->estimated_cost,true);
		$criteria->compare('estimated_time',$this->estimated_time,true);
		$criteria->compare('trial_period',$this->trial_period,true);
		$criteria->compare('chat_room_id',$this->chat_room_id);
		$criteria->compare('comments',$this->comments,true);
		$criteria->compare('min_price',$this->min_price);
		$criteria->compare('max_price',$this->max_price);
		$criteria->compare('time_material',$this->time_material,true);
		$criteria->compare('billing_schedule',$this->billing_schedule,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('is_escrow',$this->is_escrow);
		$criteria->compare('others',$this->others,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('clientProjects.name',$this->client_search,true);
		$criteria->compare('suppliers.name',$this->supplier_search,true);
		$criteria->compare('default_q1_ans',$this->default_q1_ans,true);
		$criteria->compare('default_q2_ans',$this->default_q2_ans,true);
		$criteria->compare('default_q3_ans',$this->default_q3_ans,true);
		$criteria->compare('default_q4_ans',$this->default_q4_ans,true);
		$criteria->compare('default_q5_ans',$this->default_q5_ans,true);
		$criteria->compare('default_q6_ans',$this->default_q6_ans,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>array(
		        'attributes'=>array(
		            'supplier_search'=>array(
		                'asc'=>'suppliers.name',
		                'desc'=>'suppliers.name DESC',
		            ),
		            '*',
		        ),
		    ),
		));
		return new CActiveDataProvider($this, array(
		'criteria'=>$criteria,
		'sort'=>array(
		        'attributes'=>array(
		            'client_search'=>array(
		                'asc'=>'clientProjects.name',
		                'desc'=>'clientProjects.name DESC',
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
	 * @return SuppliersProjects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
