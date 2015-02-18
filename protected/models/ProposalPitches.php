<?php

/**
 * This is the model class for table "proposal_pitches".
 *
 * The followings are the available columns in table 'proposal_pitches':
 * @property integer $id
 * @property string $trial_period
 * @property string $estimated_cost
 * @property string $estimated_time
 * @property string $min_price
 * @property string $max_price
 * @property string $time_material
 * @property string $billing_schedule
 * @property integer $status
 * @property string $add_date
 * @property string $remarks
 * @property string $added_by
 * @property integer $users_id
 * @property integer $suppliers_projects_id
 *
 * The followings are the available model relations:
 * @property SuppliersProjects $suppliersProjects
 * @property Users $users
 */
class ProposalPitches extends CActiveRecord
{
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
			array('status, users_id, suppliers_projects_id', 'numerical', 'integerOnly'=>true),
			array('trial_period', 'length', 'max'=>145),
			array('estimated_cost, estimated_time, min_price, max_price, time_material, billing_schedule, added_by', 'length', 'max'=>45),
			array('add_date, remarks', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, trial_period, estimated_cost, estimated_time, min_price, max_price, time_material, billing_schedule, status, add_date, remarks, added_by, users_id, suppliers_projects_id', 'safe', 'on'=>'search'),
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
			'trial_period' => 'Trial Period',
			'estimated_cost' => 'Estimated Cost',
			'estimated_time' => 'Estimated Time',
			'min_price' => 'Min Price',
			'max_price' => 'Max Price',
			'time_material' => 'Time Material',
			'billing_schedule' => 'Billing Schedule',
			'status' => 'Status',
			'add_date' => 'Add Date',
			'remarks' => 'Remarks',
			'added_by' => 'Added By',
			'users_id' => 'Users',
			'suppliers_projects_id' => 'Suppliers Projects',
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
		$criteria->compare('trial_period',$this->trial_period,true);
		$criteria->compare('estimated_cost',$this->estimated_cost,true);
		$criteria->compare('estimated_time',$this->estimated_time,true);
		$criteria->compare('min_price',$this->min_price,true);
		$criteria->compare('max_price',$this->max_price,true);
		$criteria->compare('time_material',$this->time_material,true);
		$criteria->compare('billing_schedule',$this->billing_schedule,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('remarks',$this->remarks,true);
		$criteria->compare('added_by',$this->added_by,true);
		$criteria->compare('users_id',$this->users_id);
		$criteria->compare('suppliers_projects_id',$this->suppliers_projects_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProposalPitches the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
