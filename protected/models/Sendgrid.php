<?php

/**
 * This is the model class for table "sendgrid".
 *
 * The followings are the available columns in table 'sendgrid':
 * @property integer $id
 * @property string $headers
 * @property string $dkim
 * @property string $to
 * @property string $html
 * @property string $from
 * @property string $text
 * @property string $sender_ip
 * @property string $envelope
 * @property string $attachments
 * @property string $subject
 * @property string $charsets
 * @property string $SPF
 */
class Sendgrid extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'sendgrid';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('dkim, to, from, sender_ip, attachments, charsets, SPF', 'length', 'max'=>45),
			array('headers, html, text, envelope, subject', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, headers, dkim, to, html, from, text, sender_ip, envelope, attachments, subject, charsets, SPF', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'headers' => 'Headers',
			'dkim' => 'Dkim',
			'to' => 'To',
			'html' => 'Html',
			'from' => 'From',
			'text' => 'Text',
			'sender_ip' => 'Sender Ip',
			'envelope' => 'Envelope',
			'attachments' => 'Attachments',
			'subject' => 'Subject',
			'charsets' => 'Charsets',
			'SPF' => 'Spf',
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
		$criteria->compare('headers',$this->headers,true);
		$criteria->compare('dkim',$this->dkim,true);
		$criteria->compare('to',$this->to,true);
		$criteria->compare('html',$this->html,true);
		$criteria->compare('from',$this->from,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('sender_ip',$this->sender_ip,true);
		$criteria->compare('envelope',$this->envelope,true);
		$criteria->compare('attachments',$this->attachments,true);
		$criteria->compare('subject',$this->subject,true);
		$criteria->compare('charsets',$this->charsets,true);
		$criteria->compare('SPF',$this->SPF,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sendgrid the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
