<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	private $_name;
	
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
	    $user=Users::model()->findByAttributes(array('username'=>$this->username));
		if($user === NULL){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		}elseif($user->password !== sha1($this->password)){
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}else{
			$this->errorCode=self::ERROR_NONE;
			$this->_id=$user->id;
			$this->_name=$user->fullname;
		}
		return !$this->errorCode;
	}
	public function getId(){
		return $this->_id;
	}
	
	public function getName(){
		return $this->_name;
	}
}