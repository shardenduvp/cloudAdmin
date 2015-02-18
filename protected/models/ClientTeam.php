<?php

/**
 * This is the model class for table "client_team".
 *
 * The followings are the available columns in table 'client_team':
 * @property integer $id
 * @property integer $client_portfolio_id
 * @property string $team_id
 * @property string $add_date
 * @property string $status
 * @property string $active
 *
 * The followings are the available model relations:
 * @property ClientPortfolio $clientPortfolio
 */
class ClientTeam extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'client_team';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, client_portfolio_id', 'required'),
			array('id, client_portfolio_id', 'numerical', 'integerOnly'=>true),
			array('team_id, add_date, status, active', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, client_portfolio_id, team_id, add_date, status, active', 'safe', 'on'=>'search'),
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
			'clientPortfolio' => array(self::BELONGS_TO, 'ClientPortfolio', 'client_portfolio_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'client_portfolio_id' => 'Client Portfolio',
			'team_id' => 'Team',
			'add_date' => 'Add Date',
			'status' => 'Status',
			'active' => 'Active',
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
		$criteria->compare('client_portfolio_id',$this->client_portfolio_id);
		$criteria->compare('team_id',$this->team_id,true);
		$criteria->compare('add_date',$this->add_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('active',$this->active,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ClientTeam the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
