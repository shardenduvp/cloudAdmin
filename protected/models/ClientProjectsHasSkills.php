<?php

/**
 * This is the model class for table "client_projects_has_skills".
 *
 * The followings are the available columns in table 'client_projects_has_skills':
 * @property integer $id
 * @property integer $client_projects_id
 * @property integer $skills_id
 * @property string $add_date
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property ClientProjects $clientProjects
 * @property Skills $skills
 */
class ClientProjectsHasSkills extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client_projects_has_skills';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('client_projects_id, skills_id, add_date, status', 'required'),
			array('client_projects_id, skills_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, client_projects_id, skills_id, add_date, status', 'safe', 'on'=>'search'),
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
			'skills' => array(self::BELONGS_TO, 'Skills', 'skills_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'client_projects_id' => 'Client Projects',
			'skills_id' => 'Skills',
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
		$criteria->compare('client_projects_id',$this->client_projects_id);
		$criteria->compare('skills_id',$this->skills_id);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClientProjectsHasSkills the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
