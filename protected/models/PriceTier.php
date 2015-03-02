<?php

/**
 * This is the model class for table "price_tier".
 *
 * The followings are the available columns in table 'price_tier':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $min_price
 * @property string $max_price
 * @property string $d_min_price
 * @property string $d_max_price
 * @property string $d_description
 * @property integer $price_zone
 * @property integer $status
 * @property integer $price_zone_id
 *
 * The followings are the available model relations:
 * @property PriceZone $priceZone
 */
class PriceTier extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'price_tier';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('price_zone_id', 'required'),
			array('price_zone, status, price_zone_id', 'numerical', 'integerOnly'=>true),
			array('title, min_price, max_price, d_min_price, d_max_price', 'length', 'max'=>45),
			array('description, d_description', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, title, description, min_price, max_price, d_min_price, d_max_price, d_description, price_zone, status, price_zone_id', 'safe', 'on'=>'search'),
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
			'priceZone' => array(self::BELONGS_TO, 'PriceZone', 'price_zone_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'description' => 'Description',
			'min_price' => 'Min Price',
			'max_price' => 'Max Price',
			'd_min_price' => 'D Min Price',
			'd_max_price' => 'D Max Price',
			'd_description' => 'D Description',
			'price_zone' => 'Price Zone',
			'status' => 'Status',
			'price_zone_id' => 'Price Zone',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('min_price',$this->min_price,true);
		$criteria->compare('max_price',$this->max_price,true);
		$criteria->compare('d_min_price',$this->d_min_price,true);
		$criteria->compare('d_max_price',$this->d_max_price,true);
		$criteria->compare('d_description',$this->d_description,true);
		$criteria->compare('price_zone',$this->price_zone);
		$criteria->compare('status',$this->status);
		$criteria->compare('price_zone_id',$this->price_zone_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PriceTier the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
