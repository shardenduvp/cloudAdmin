<?php

/**
 * This is the model class for table "supplier_has_milestones".
 *
 * The followings are the available columns in table 'supplier_has_milestones':
 * @property integer $id
 * @property integer $supplier_project_proposal_id
 * @property string $module
 * @property string $start_date
 * @property string $end_date
 * @property double $amount
 * @property string $date
 * @property integer $status
 * @property string $transaction
 * @property string $note
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
			array('supplier_project_proposal_id, module, start_date, end_date, amount, date, status, transaction, note', 'required'),
			array('supplier_project_proposal_id, status', 'numerical', 'integerOnly'=>true),
			array('amount', 'numerical'),
			array('transaction', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, supplier_project_proposal_id, module, start_date, end_date, amount, date, status, transaction, note', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'supplier_project_proposal_id' => 'Supplier Project Proposal',
			'module' => 'Module',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'amount' => 'Amount',
			'date' => 'Date',
			'status' => 'Status',
			'transaction' => 'Transaction',
			'note' => 'Note',
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
		$criteria->compare('supplier_project_proposal_id',$this->supplier_project_proposal_id);
		$criteria->compare('module',$this->module,true);
		$criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('amount',$this->amount);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('transaction',$this->transaction,true);
		$criteria->compare('note',$this->note,true);

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
