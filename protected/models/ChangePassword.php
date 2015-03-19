<?php
class ChangePassword extends CFormModel
{
   
    public $current_password;
    public $new_password;
	public $confirm_password;
    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
          // email is required
            array('current_password,new_password,confirm_password','required'),
            array('new_password', 'length', 'min'=>6),
			array('confirm_password', 'compare', 'compareAttribute'=>'new_password'),
            // email has to be a valid email address
        );
    }

    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array(
		'current_password'=>'Current Password',
		'new_password'=>'New Password',
		'confirm_password'=>'Confirm Password',
		);
    }
    
}//ends class

