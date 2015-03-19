<?php

/**
 * This is the model class for table "suppliers_faq_answers".
 *
 * The followings are the available columns in table 'suppliers_faq_answers':
 * @property integer $id
 * @property integer $suppliers_id
 * @property integer $faq_id
 * @property string $answers
 * @property integer $status
 * @property integer $publish
 *
 * The followings are the available model relations:
 * @property Faq $faq
 * @property Suppliers $suppliers
 */
class SuppliersFaqAnswers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'suppliers_faq_answers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('suppliers_id, faq_id', 'required'),
			array('suppliers_id, faq_id, status, publish', 'numerical', 'integerOnly'=>true),
			array('answers', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, suppliers_id, faq_id, answers, status, publish', 'safe', 'on'=>'search'),
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
			'faq' => array(self::BELONGS_TO, 'Faq', 'faq_id'),
			'suppliers' => array(self::BELONGS_TO, 'Suppliers', 'suppliers_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'suppliers_id' => 'Suppliers',
			'faq_id' => 'Faq',
			'answers' => 'Answers',
			'status' => 'Status',
			'publish' => 'Publish',
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
		$criteria->compare('suppliers_id',$this->suppliers_id);
		$criteria->compare('faq_id',$this->faq_id);
		$criteria->compare('answers',$this->answers,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('publish',$this->publish);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
    
    //Search for admin filter
    public function customSearch()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
        $page_size = 50;
        if(isset($_REQUEST['pagesize']))
        {
            $page_size = $_REQUEST['pagesize'];   
        }
        
		$criteria=new CDbCriteria;
        
    	if(isset($this->suppliers_id) && ($this->suppliers_id != ""))
		{
			$result 		=		Suppliers::model()->findAll('name LIKE "%'.$this->suppliers_id.'%"');
			$supplierSearch		=		array();
			foreach($result as $supRes)
				$supplierSearch[]=$supRes->id;
	 
		 	if(count($supplierSearch)>0)
					$criteria->compare('suppliers_id',$supplierSearch,true);
			else
				$criteria->compare('suppliers_id',$this->suppliers_id);
	
		}
		else
		{
				$criteria->compare('suppliers_id',$this->suppliers_id);
		}
        
      
        
        
        
		$criteria->compare('id',$this->id);
		//$criteria->compare('suppliers_id',$this->suppliers_id);
		$criteria->compare('faq_id',$this->faq_id);
		$criteria->compare('answers',$this->answers,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('publish',$this->publish);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => array('pageSize' => $page_size),
		));
	}
    

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SuppliersFaqAnswers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
