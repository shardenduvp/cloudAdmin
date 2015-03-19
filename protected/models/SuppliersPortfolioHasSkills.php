<?php

/**
 * This is the model class for table "suppliers_portfolio_has_skills".
 *
 * The followings are the available columns in table 'suppliers_portfolio_has_skills':
 * @property integer $id
 * @property integer $portfolio_id
 * @property integer $skills_id
 * @property integer $status
 * @property string $add_date
 *
 * The followings are the available model relations:
 * @property SuppliersHasPortfolio $portfolio
 * @property Skills $skills
 */
class SuppliersPortfolioHasSkills extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'suppliers_portfolio_has_skills';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('portfolio_id, skills_id, status, add_date', 'required'),
			array('portfolio_id, skills_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, portfolio_id, skills_id, status, add_date', 'safe', 'on'=>'search'),
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
			'portfolio' => array(self::BELONGS_TO, 'SuppliersHasPortfolio', 'portfolio_id'),
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
			'portfolio_id' => 'Portfolio',
			'skills_id' => 'Skills',
			'status' => 'Status',
			'add_date' => 'Add Date',
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
		$criteria->compare('portfolio_id',$this->portfolio_id);
		$criteria->compare('skills_id',$this->skills_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('add_date',$this->add_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SuppliersPortfolioHasSkills the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
