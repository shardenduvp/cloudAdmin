<?php

/**
 * This is the model class for table "proposal_pitches".
 *
 * The followings are the available columns in table 'proposal_pitches':
 * @property integer $id
 * @property integer $billing_type
 * @property integer $tm_billing_schedule_type
 * @property string $tm_amount
 * @property string $fp_total_price
 * @property integer $fp_total_price_interval
 * @property string $duration
 * @property string $start_date
 * @property string $trial
 * @property string $add_date
 * @property integer $status
 * @property string $remarks
 * @property string $client_note
 * @property string $client_comment
 * @property string $notes
 * @property string $admin_note
 * @property integer $users_id
 * @property integer $suppliers_projects_id
 *
 * The followings are the available model relations:
 * @property PitchHasMilestones[] $pitchHasMilestones
 * @property SuppliersProjects $suppliersProjects
 * @property Users $users
 */
class ProposalPitches extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProposalPitches the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'proposal_pitches';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('users_id, suppliers_projects_id', 'required'),
			array('billing_type, tm_billing_schedule_type, fp_total_price_interval, status, users_id, suppliers_projects_id', 'numerical', 'integerOnly'=>true),
			array('tm_amount, fp_total_price, duration, trial', 'length', 'max'=>45),
			array('start_date, add_date, remarks, client_note, client_comment, notes, admin_note', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, billing_type, tm_billing_schedule_type, tm_amount, fp_total_price, fp_total_price_interval, duration, start_date, trial, add_date, status, remarks, client_note, client_comment, notes, admin_note, users_id, suppliers_projects_id', 'safe', 'on'=>'search'),
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
			'pitchHasMilestones' => array(self::HAS_MANY, 'PitchHasMilestones', 'proposal_pitches_id'),
			'suppliersProjects' => array(self::BELONGS_TO, 'SuppliersProjects', 'suppliers_projects_id'),
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
			'billing_type' => 'Billing Type',
			'tm_billing_schedule_type' => 'Tm Billing Schedule Type',
			'tm_amount' => 'Tm Amount',
			'fp_total_price' => 'Fp Total Price',
			'fp_total_price_interval' => 'Fp Total Price Interval',
			'duration' => 'Duration',
			'start_date' => 'Start Date',
			'trial' => 'Trial',
			'add_date' => 'Add Date',
			'status' => 'Status',
			'remarks' => 'Remarks',
			'client_note' => 'Client Note',
			'client_comment' => 'Client Comment',
			'notes' => 'Notes',
			'admin_note' => 'Admin Note',
			'users_id' => 'Users',
			'suppliers_projects_id' => 'Suppliers Projects',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('billing_type',$this->billing_type);
		$criteria->compare('tm_billing_schedule_type',$this->tm_billing_schedule_type);
		$criteria->compare('tm_amount',$this->tm_amount,true);
		$criteria->compare('fp_total_price',$this->fp_total_price,true);
		$criteria->compare('fp_total_price_interval',$this->fp_total_price_interval);
		$criteria->compare('duration',$this->duration,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('trial',$this->trial,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('client_note',$this->client_note,true);
		$criteria->compare('client_comment',$this->client_comment,true);
		$criteria->compare('notes',$this->notes,true);
		$criteria->compare('admin_note',$this->admin_note,true);
		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('suppliers_projects_id',$this->suppliers_projects_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}