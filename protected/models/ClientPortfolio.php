<?php

/**
 * This is the model class for table "client_portfolio".
 *
 * The followings are the available columns in table 'client_portfolio':
 * @property integer $id
 * @property string $client_id
 * @property string $project_id
 * @property string $type
 * @property string $service
 * @property string $skill
 * @property string $add_date
 * @property string $status
 *
 * The followings are the available model relations:
 * @property ClientProjectStatus[] $clientProjectStatuses
 * @property ClientTeam[] $clientTeams
 */
class ClientPortfolio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client_portfolio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id', 'numerical', 'integerOnly'=>true),
			array('client_id, project_id, type, service, skill, add_date, status', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, client_id, project_id, type, service, skill, add_date, status', 'safe', 'on'=>'search'),
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
			'clientProjectStatuses' => array(self::HAS_MANY, 'ClientProjectStatus', 'client_portfolio_id'),
			'clientTeams' => array(self::HAS_MANY, 'ClientTeam', 'client_portfolio_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'client_id' => 'Client',
			'project_id' => 'Project',
			'type' => 'Type',
			'service' => 'Service',
			'skill' => 'Skill',
			'add_date' => 'Add Date',
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
		$criteria->compare('client_id',$this->client_id,true);
		$criteria->compare('project_id',$this->project_id,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('service',$this->service,true);
		$criteria->compare('skill',$this->skill,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClientPortfolio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
