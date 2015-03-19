<?php

/**
 * This is the model class for table "calculator_users".
 *
 * The followings are the available columns in table 'calculator_users':
 * @property integer $id
 * @property string $username
 * @property string $total_price
 * @property string $total_hour
 * @property integer $status
 * @property string $created
 * @property string $modified
 *
 * The followings are the available model relations:
 * @property CalculatorResult[] $calculatorResults
 */
class CalculatorUsers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'calculator_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status', 'numerical', 'integerOnly'=>true),
			array('username', 'length', 'max'=>200),
			array('total_price, total_hour', 'length', 'max'=>100),
			array('created, modified', 'safe'),
            array('phone_number', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, username, total_price, total_hour, status, created, modified', 'safe', 'on'=>'search'),
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
			'calculatorResults' => array(self::HAS_MANY, 'CalculatorResult', 'users_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'username' => 'Username',
			'total_price' => 'Total Price',
			'total_hour' => 'Total Hour',
			'status' => 'Status',
			'created' => 'Created',
			'modified' => 'Modified',
            'phone_number' => 'Phone No',
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
		$criteria->compare('username',$this->username,true);
		$criteria->compare('total_price',$this->total_price,true);
		$criteria->compare('total_hour',$this->total_hour,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
        $criteria->compare('phone_number',$this->phone_number,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CalculatorUsers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
