<?php

/**
 * This is the model class for table "supplier_has_milestones".
 *
 * The followings are the available columns in table 'supplier_has_milestones':
 * @property integer $id
 * @property string $module
 * @property string $start_date
 * @property string $end_date
 * @property double $amount
 * @property string $date
 * @property integer $status
 * @property string $transaction
 * @property string $note
 * @property string $reminder_date
 * @property string $milestone_title
 * @property string $overview
 * @property string $due_date
 * @property integer $is_schedule_payment
 * @property integer $suppliers_id
 * @property integer $supplier_proposal_id
 *
 * The followings are the available model relations:
 * @property MilestonesHasOrderStatus[] $milestonesHasOrderStatuses
 * @property Suppliers $suppliers
 */
class SupplierHasMilestones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'supplier_has_milestones';
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
			array('status, is_schedule_payment, suppliers_id, supplier_proposal_id', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('transaction, milestone_title', 'length', 'max'=>100),
			array('module, start_date, end_date, date, note, reminder_date, overview, due_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, module, start_date, end_date, amount, date, status, transaction, note, reminder_date, milestone_title, overview, due_date, is_schedule_payment, suppliers_id, supplier_proposal_id', 'safe', 'on'=>'search'),
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
			'milestonesHasOrderStatuses' => array(self::HAS_MANY, 'MilestonesHasOrderStatus', 'supplier_milestones_id'),
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
			'module' => 'Module',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'amount' => 'Amount',
			'date' => 'Date',
			'status' => 'Status',
			'transaction' => 'Transaction',
			'note' => 'Note',
			'reminder_date' => 'Reminder Date',
			'milestone_title' => 'Milestone Title',
			'overview' => 'Overview',
			'due_date' => 'Due Date',
			'is_schedule_payment' => 'Is Schedule Payment',
			'suppliers_id' => 'Suppliers',
			'supplier_proposal_id' => 'Supplier Proposal',
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
		$criteria->compare('module',$this->module,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('transaction',$this->transaction,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('reminder_date',$this->reminder_date,true);
		$criteria->compare('milestone_title',$this->milestone_title,true);
		$criteria->compare('overview',$this->overview,true);
		$criteria->compare('due_date',$this->due_date,true);
		$criteria->compare('is_schedule_payment',$this->is_schedule_payment);
		$criteria->compare('suppliers_id',$this->suppliers_id);
		$criteria->compare('supplier_proposal_id',$this->supplier_proposal_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SupplierHasMilestones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
