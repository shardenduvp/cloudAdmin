<?php

/**
 * This is the model class for table "supplier_documents".
 *
 * The followings are the available columns in table 'supplier_documents':
 * @property integer $id
 * @property integer $suppliers_propsal_id
 * @property string $name
 * @property string $path
 * @property string $extension
 * @property string $size
 * @property string $type
 * @property integer $status
 * @property string $add_date
 *
 * The followings are the available model relations:
 * @property SuppliersProjectsProposals $suppliersPropsal
 */
class SupplierDocuments extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'supplier_documents';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('suppliers_propsal_id', 'required'),
			array('suppliers_propsal_id, status', 'numerical', 'integerOnly'=>true),
			array('name, path', 'length', 'max'=>500),
			array('extension, size, type', 'length', 'max'=>45),
			array('add_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, suppliers_propsal_id, name, path, extension, size, type, status, add_date', 'safe', 'on'=>'search'),
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
			'suppliersPropsal' => array(self::BELONGS_TO, 'SuppliersProjectsProposals', 'suppliers_propsal_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'suppliers_propsal_id' => 'Suppliers Propsal',
			'name' => 'Name',
			'path' => 'Path',
			'extension' => 'Extension',
			'size' => 'Size',
			'type' => 'Type',
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
		$criteria->compare('suppliers_propsal_id',$this->suppliers_propsal_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('path',$this->path,true);
		$criteria->compare('extension',$this->extension,true);
		$criteria->compare('size',$this->size,true);
		$criteria->compare('type',$this->type,true);
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
	 * @return SupplierDocuments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
