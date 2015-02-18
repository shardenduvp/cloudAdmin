<?php

/**
 * This is the model class for table "client_project_progress".
 *
 * The followings are the available columns in table 'client_project_progress':
 * @property integer $id
 * @property string $name
 * @property string $details
 * @property integer $status
 * @property integer $client_projects_id
 *
 * The followings are the available model relations:
 * @property ClientProjects $clientProjects
 */
class ClientProjectProgress extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client_project_progress';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_projects_id', 'required'),
			array('status, client_projects_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>45),
			array('details', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, details, status, client_projects_id', 'safe', 'on'=>'search'),
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
			'clientProjects' => array(self::BELONGS_TO, 'ClientProjects', 'client_projects_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'details' => 'Details',
			'status' => 'Status',
			'client_projects_id' => 'Client Projects',
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
		$criteria->compare('details',$this->details,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('client_projects_id',$this->client_projects_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClientProjectProgress the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
