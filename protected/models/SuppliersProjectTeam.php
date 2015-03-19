<?php

/**
 * This is the model class for table "suppliers_project_team".
 *
 * The followings are the available columns in table 'suppliers_project_team':
 * @property integer $id
 * @property integer $project_proposal_id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property SuppliersProjectsProposals $projectProposal
 */
class SuppliersProjectTeam extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'suppliers_project_team';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_proposal_id, name, description, image, created, modified', 'required'),
			array('project_proposal_id', 'numerical', 'integerOnly'=>true),
			array('name, description, image', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, project_proposal_id, name, description, image, created, modified', 'safe', 'on'=>'search'),
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
			'projectProposal' => array(self::BELONGS_TO, 'SuppliersProjectsProposals', 'project_proposal_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'project_proposal_id' => 'Project Proposal',
			'name' => 'Name',
			'description' => 'Description',
			'image' => 'Image',
			'created' => 'Created',
			'modified' => 'Modified',
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
		$criteria->compare('project_proposal_id',$this->project_proposal_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SuppliersProjectTeam the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
