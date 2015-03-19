<?php

/**
 * This is the model class for table "skills".
 *
 * The followings are the available columns in table 'skills':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $skillcol
 *
 * The followings are the available model relations:
 * @property SuppliersHasSkills[] $suppliersHasSkills
 */
class Skills extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'skills';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'length', 'max'=>245),
			array('description', 'length', 'max'=>500),
			array('skillcol', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, skillcol,parent_id,add_date', 'safe', 'on'=>'parentSearch'),
			array('id, name, description, skillcol,parent_id,add_date', 'safe', 'on'=>'search'),
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
			'suppliersHasSkills' => array(self::HAS_MANY, 'SuppliersHasSkills', 'skills_id'),
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
			'description' => 'Description',
			'skillcol' => 'Skill col',
			'parent_id'=>'Parent'
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('skillcol',$this->skillcol,true);
		$criteria->compare('parent_id',$this->parent_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function parentSearch()
	{
		$criteria=new CDbCriteria;
		
		$parentId=array();
		if($this->parent_id!=null && $this->parent_id!='Parent' ){
			$q=new CdbCriteria;
			$q->compare('name',$this->parent_id,true);
			$result=Skills::model()->findAll($q);
			if($result!=null){
				foreach ($result as $value) {
					$parentId[]=$value->id;
				}
			}
			else{
				$parentId=null;
			}
		}
	    if($this->parent_id =='Parent'){
			$parentId[0]=0;
		}

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('skillcol',$this->skillcol,true);
		
		if($parentId!=null){
			$criteria->addInCondition('parent_id',$parentId,'AND');
		}

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Skills the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
