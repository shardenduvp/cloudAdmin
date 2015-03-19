<?php
class SiteController extends Controller
{
	/**
	* Declares class-based actions.
	**/
	public $layout='column2';
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */

 	public function accessRules()
    {
        return array(
            array('allow','actions'=>array('newProjSubmit','shareprofile'),'users'=>array('@'),),
			array('allow','actions'=>array('index','signup','autoCity','login','error','verifyActivation','Supplier_Signup','AutoCity','Supplier_Login','Supplier','AjaxSignup','AjaxUniqe','ForgotPassword','ResetPassword','Notifictaion','Activation','VerifyActivation','AdminLink','Recommendation','NewPassword','PrivacyTerms','Contact','Search','Signups','Logout','GetNames','DynamicCity','DynamicPriceTire','Linkedin','LinkedinAfter','Reminder','HourlyReminder','test','SendChatMessage','NewProject','Calculate','CreateService','NewLogIn','NewSignUp','CreateSkill','NewLinkedin','NewLinkedinAfter','NewProjSubmit','Reply','Calculator','GetCalculatorJson','SaveCalculatorData','CalcResult','CalculatorAjaxUniqe','startcalculator','costofbuildinganapp','calculatorcall','ebookdownload','indexcall','Profile','backSearch'),'users'=>array('*')),
            array('deny', 'users'=>array('*'),),
		);
    }

	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionSignup()
	{
		$users	=	new Users;
		if(isset($_POST["Users"])){
			$users->attributes		=	$_POST["Users"];
			$users->password		=	base64_encode($users->password);
			$users->add_date		=	date('Y-m-d H:i:s');
			$users->status			=	0;
			if($users->save()){
				/*
				$user_has_cities		=	new UsersHasCities;
				$user_has_cities->users_id	=	$users->id;
				$user_has_cities->cities_id	=	$_POST['Users']['cities_id'];
				$user_has_cities->is_main	=	1;
				if($user_has_cities->save()){
				*/
					$profile	                =	new ClientProfiles;
					$profile->users_id		    =	$users->id;
					$profile->address1		    =	$_POST['Users']['cities_id'];
					if($profile->save()){
						/*
						$client_has_city	=	new ClientProfilesHasCities;
						$client_has_city->client_profiles_id	=	$profile->id;
						$client_has_city->cities_id				=	$_POST['Users']['cities_id'];
						$client_has_city->is_main				=	1;
						$client_has_city->status				=	1;
						$client_has_city->save();
						*/
						$data['name']		=	$users->first_name;
						$data['email']		=	$users->username;
						$data['password']	=	$users->password;
						$this->sendMail($data,'register');
						$this->redirect(array('/site/login','first'=>'1'));
					}
				//}
			}
		}
		$this->render('signup',array('users'=>$users));
	}

    public function actionSupplier_Signup()
	{
		$users	=	new Users;
		if(isset($_POST["Users"])){
			$users->attributes		=	$_POST["Users"];
			$users->password		=	base64_encode($users->password);
			$users->add_date		=	date('Y-m-d H:i:s');
			$users->status			=	0;
			if($users->save()){
				/*$user_has_cities			=	new UsersHasCities;
				$user_has_cities->users_id	=	$users->id;
				$user_has_cities->cities_id	=	$_POST['Users']['cities_id'];
				if($user_has_cities->save()){*/
					$profile	                =	new Suppliers;
					$profile->users_id		    =	$users->id;
					if($profile->save()){
						$data['name']		=	$users->first_name;
						$data['email']		=	$users->username;
						$data['password']	=	$users->password;
						$this->sendMail($data,'register_supplier');
						$this->redirect(array('/site/supplier_login','first'=>'1'));
					}
				//}
			}
		}
		$this->render('supplier_signup',array('users'=>$users));
	}

	public function actionAutoCity()
	{
	  if (!empty($_GET['term'])) {
		$sql = "SELECT id ,name as label,name FROM Cities where name Like :qterm limit 0,10";
		$command = Yii::app()->db->createCommand($sql);
		$qterm = '%'.$_GET['term'].'%';
		$command->bindParam(":qterm", $qterm, PDO::PARAM_STR);
		$result = $command->queryAll();
		echo CJSON::encode($result); exit;
	  } else {
		return false;
	  }
	}

	public function actionLogin()
	{
       if(isset(Yii::app()->user->role))
			$this->redirect(array('/'.Yii::app()->user->role));
		$model	=	new LoginForm;
		// $forgot	=	new ForgotpasswordForm;
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			$model->password		=	base64_encode($model->password);
			if($model->validate() && $model->loginStatus() && $model->login()){
				$userd				=	Users::model()->findByPk(Yii::app()->user->id);
				$userd->last_login	=	date('Y-m-d H:i:s');
				$userd->save();
				
				if(Yii::app()->user->role=='admin'){
					$this->redirect(array('/admin/users/admin'));
				}
				elseif(Yii::app()->user->role=='client'){
					$this->redirect(array('/admin/index'));
				}
				elseif(Yii::app()->user->role=='supplier'){
					$this->redirect(array('/admin/index'));
				}else{
					$this->redirect(array('/admin/login'));
				}
			}else{
			 
				Yii::app()->user->setFlash('loginError',$model->errors['password'][0]);
                //$this->redirect(array('/site/login'));
				$this->render('login',array('model'=>$model /* ,'forgot'=>$forgot */));
			}
		}
		else
			$this->render('login',array('model'=>$model /* ,'forgot'=>$forgot */));
	}
    
    public function actionShareprofile()
    {
        $id             = base64_decode($_REQUEST['id']); 
        $users	        = Users::model()->findByAttributes(array("id"=>$id));
        $suppliers      = Suppliers::model()->findByAttributes(array("users_id"=>$users->id));
        $awards_listing = SuppliersHasAwards::model()->findAllByAttributes(array("suppliers_id"=>$suppliers->id));

        $team_users     = UsersTeamMembers::model()->findAllByAttributes(array('user_id'=>$users->id));

        $this->render('profile',array("suppliers"=>$suppliers,"awards_listing"=>$awards_listing,"users"=>$users,"team_users"=>$team_users));
    }
    
    public function actionSupplier_Login()
	{
	    $model	=	new LoginForm;
		$forgot	=	new ForgotpasswordForm;
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			$model->password		=	base64_encode($model->password);
			if($model->validate() && $model->loginStatus() && $model->login()){
				$userd				=	Users::model()->findByPk(Yii::app()->user->id);
				$userd->last_login	=	date('Y-m-d H:i:s');
				$userd->save();
				
				if(Yii::app()->user->role=='admin'){
					$this->redirect(array('/admin/users/admin'));
				}
				elseif(Yii::app()->user->role=='client'){
					$this->redirect(array('/client/index'));
				}
				elseif(Yii::app()->user->role=='supplier'){
					$this->redirect(array('/supplier/index'));
				}else{
					$this->redirect(array('/site/supplier_login'));
				}
			}else{
				Yii::app()->user->setFlash('loginError',$model->errors['password'][0]);
                $this->render('supplier_login',array('model'=>$model,'forgot'=>$forgot));
			}
		}
		else
			$this->render('supplier_login',array('model'=>$model,'forgot'=>$forgot));
	
	}

	public function actionSupplier()
	{
		if(isset(Yii::app()->user->role))
			$this->redirect(array('/'.Yii::app()->user->role));
        $model	=	new LoginForm;
		$users	=	new Users;
		$forgot	=	new ForgotpasswordForm;
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				if(Yii::app()->user->role=='supplier'){
					$this->redirect(array('supplier/index'));
				}else{
					$this->redirect(array('site/login'));
				}
			}else{
				Yii::app()->user->setFlash('loginError',$model->errors['password'][0]);
			}
		}
		if(isset($_POST['Users']))
		{
			$response = array("iserror" =>false,
								"errors" => array(),
							  	"Success" => array()
							 );
            $users = Users::model()->exists('username = :user_id', array(":user_id"=>$_REQUEST['Users']['username']));
            if($users)
            {
                $response["iserror"] = true;
                $msg= array(
                            'msg'=>"Already Registered with Us, Please try login!!",
                            //'token'=>$token
                        );
                $response["errors"]=$msg;
            }else{
                $users = new Users;
                $users->attributes	=	$_POST['Users'];
                $users->role_id		=	3;
                $users->status		=	0;
				$users->last_login	=	date('Y-m-d H:i:s');
                $users->add_date	=	date('Y-m-d H:i:s');
                if($users->save())
                {
                    $profile	                =	new Suppliers;
                    $profile->name			    =	"";
                    $profile->first_name	    =	$users->display_name;
                    $profile->last_name	        =	$users->role;
                    $profile->users_id		    =	$users->id;
                    $profile->cities_id		    =	134717; //default for new york
                    $profile->status		    =	0;
                    $profile->add_date		    =	date('Y-m-d H:i:s');
                    $profile->save();

                    $data['name']		=	$users->display_name;
                    $data['email']		=	$users->username;
                    $data['password']	=	$users->password;
                    $data['id']         =   $users->id;
                    $this->sendMail($data,'register_supplier');
                    $this->sendMail($data,'new_user_signup');
                    $model->username	=	$users->username;
                    $model->password	=	$users->password;
					$response["iserror"] = false;
                    $msg= array('msg'=>"Please check your mail and verify your account!!",);
					$response["Success"]= $msg;
                }
                else{
                    $response["iserror"] = true;
                    $msg= array('msg'=>"Already Registered with Us, Please try login!!",);
                    $response["errors"]=$msg;
                }
            }
			echo json_encode($response);
			die;
		}
		$this->render('login_supplier',array('users'=>$users,'model'=>$model,'forgot'=>$forgot)	);
	}

	public function actionAjaxUniqe()
	{
		$users	=	Users::model()->exists('username = :user_id', array(":user_id"=>$_REQUEST['email']));
		$response = array("exist" =>false,'message'=>'Sorry this email does not exists in our records.');
		if($users){
			$record = Users::model()->findByAttributes(array('username'=>$_REQUEST['email']));
			$data['name']				=	$record->display_name;
			$data['email']				=	$record->username;
			$data['password']			=	base64_encode($record->username);
			$mail	=	$this->sendMail($data,'forget');
			if($mail){
				$record->status = 0;
				$record->save();
				$response = array("exist" =>false,'message'=>'You will receive an email with instructions about how to reset your password in a few minutes.');
			}else{
				$response = array("exist" =>true,'message'=>'Sorry this email does not exists in our records.');
			}
		}else{
			$response = array("exist" =>true,'message'=>'Sorry this email does not exists in our records.');
		}
		echo json_encode($response);
		die;
	}

	public function actionForgotPassword()
	{
		$model=new ForgotpasswordForm;
		if(isset($_POST['ForgotpasswordForm'])){
			$model->attributes=$_POST['ForgotpasswordForm'];
			if($model->validate())
			{
				//Searches for the record in the database for the posted email 
				$record_exists = Users::model()->exists('username = :email', array(':email'=>$_POST['ForgotpasswordForm']['email']));
				if($record_exists==1){
					$record = Users::model()->findByAttributes(array('username'=>$_POST['ForgotpasswordForm']['email']));
					$data['name']				=	$record->display_name;
					$data['email']				=	$record->username;
					$data['password']			=	base64_encode($record->username);
					$mail	=	$this->sendMail($data,'forget');
                	if($mail){
						Yii::app()->user->setFlash('successPass','You will receive an email with instructions<br/> about how to reset your password in a<br/> few minutes.');
						$this->refresh();
					}else
						Yii::app()->user->setFlash('errorfPass',"Sorry mail could not be sent this time! Please try again.");
				}
				else
					Yii::app()->user->setFlash('errorfPass',"The details you provided do not match our records. Please provide the correct details!");
			}else
				Yii::app()->user->setFlash('errorFPass',"Invalide details!");
		}
		$this->redirect(Yii::app()->createUrl('/site/login'));
	}

	public function actionResetPassword($link)
	{
        $email =    '';
        if(isset($link))
          $email = base64_decode($link);
        
       $record_exists = Users::model()->exists('username = :email And status = 0', array(':email'=>$email));
       if($record_exists==1){
           Yii::app()->session['passwordEmail'] = $email;
           $this->redirect(Yii::app()->createUrl('/site/newPassword'));
       }
        else{
           Yii::app()->user->setFlash('error',"The link has expired please try again.");
           $this->redirect(Yii::app()->createUrl('/site/login'));
        }
        
	}

	public function actionPastClientResetPassword($link)
	{
        $email =    '';
        if(isset($link))
          $email = base64_decode($link);
        
       $record_exists = Users::model()->exists('username = :email And status = 1', array(':email'=>$email));
       if($record_exists==1){
           Yii::app()->session['passwordEmail'] = $email;
           $this->redirect(Yii::app()->createUrl('/site/newPassword'));
       }
        else{
           Yii::app()->user->setFlash('error',"The link has expired please try again.");
           $this->redirect(Yii::app()->createUrl('/site/login'));
        }
        
	}
	
	public function actionNotifictaion()
	{
		if(!isset(Yii::app()->user->id))
			$this->redirect(Yii::app()->createUrl('/site/login'));

		Log::model()->updateAll(array('is_read'=>1),'for_user = :for_user and notification = 1 and is_read=0',array(':for_user'=>Yii::app()->user->id));
		echo '1';
		die;
	}

	public function actionActivation($link,$log)
	{
		$email =    '';
		if(isset($link)){
			echo $email = base64_decode($link);
			echo $log = base64_decode($log);
		}
		$record_exists = Users::model()->find('username = :email AND password = :pass', array(':email'=>$email,'pass'=>$log));
		if(!empty($record_exists)){
			$record_exists->status	=	1;
			$record_exists->save();
			$model     			=     new LoginForm;
			$model->username	=	$email;
			$model->password	=	$log;
			if($model->validate() && $model->login()){

				if($record_exists->role_id==3)
					$users	=	Suppliers::model()->findByPk(Yii::app()->user->supplierProfileId);
				else
					$users	=	ClientProfiles::model()->findByPk(Yii::app()->user->clientProfileId);
				
				$data['name']	=	$users->first_name;
				$data['email']	=	$email;
				$this->sendMail($data,$record_exists->role_id==2?'welcome':'welcome_complete_profile_supplier');
				Yii::app()->user->setFlash('success','Your account email address has been verified.');
				$this->redirect(Yii::app()->createUrl('/'.$record_exists->roles->name));
			}
		}
		else{
			Yii::app()->user->setFlash('success','Your email address has no account with us.Please Register to get one.');
		}
		$this->redirect(Yii::app()->createUrl('/site/login'));
	}

	public function actionVerifyActivation($link,$log)
	{
		$email =    '';
		if(isset($link)){
			echo $email = base64_decode($link);
			echo $log = base64_decode($log);
		}
		$record_exists = Users::model()->find('username = :email AND password = :pass', array(':email'=>$email,'pass'=>$log));
		if(!empty($record_exists)){
			$record_exists->status	=	1;
			$record_exists->save();
			$model     			=     new LoginForm;
			$model->username	=	$email;
			$model->password	=	$log;
			if($model->validate() && $model->login()){

				/*if($record_exists->role_id==3)
					$users	=	Suppliers::model()->findByPk(Yii::app()->user->profileId);
				else
					$users	=	ClientProfiles::model()->findByPk(Yii::app()->user->profileId);
				
				$data['name']		=	$users->first_name;
				$data['email']	=	$email;
				add to template name if need to send to supplier  - welcome_supplier
				$this->sendMail($data,$record_exists->role_id==2?'welcome':'welcome_complete_profile_supplier');
				$this->sendMail($data,'welcome');calculatorcall

				*/
				Yii::app()->user->setFlash('success','Your account email address has been verified.');
				$this->redirect(Yii::app()->createUrl('/'.$record_exists->roles->name));
			}
		}
		else{
			Yii::app()->user->setFlash('success','Your email address has no account with us.Please Register to get one.');
		}
		$this->redirect(Yii::app()->createUrl('/site/login'));
	}

	public function actionAdminLink($link,$log)
	{
		if(isset($link)){
			$email	=	base64_decode($link);
			$log	=	base64_decode($log);
		}
		$record_exists = Users::model()->find('username = :email AND password = :pass AND link_status = :status', array(':email'=>$email,':pass'=>$log,':status'=>1));
		if(!empty($record_exists)){
			$record_exists->link_status	=	0;
			$record_exists->save();
			$model     			=	new LoginForm;
			$model->username	=	$email;
			$model->password	=	$log;
			if($model->validate()&&$model->login()){
				$this->redirect(Yii::app()->createUrl('/'.$record_exists->roles->name));
			}
		}
		else{
			Yii::app()->user->setFlash('success','Your email address has no account with us.Please Register to get one.');
		}
		$this->redirect(Yii::app()->createUrl('/site/login'));
	}

	public function actionRecommendation()
	{
        $id = $_REQUEST['id'];
		if(isset($id))
			$model         =    Recommendations::model()->findByPk($id);
		else
			throw new CHttpException(404,'The specified recommendation cannot be found.');

		if(isset($_POST['Recommendations'])){
			$model->attributes=$_POST['Recommendations'];
			if($model->save())
            {
				Yii::app()->user->setFlash('RecommendationsSuccess','Your recommendation will be taken into account.');
				$this->redirect(Yii::app()->createUrl('/site'));
			}
		}
		$developer     =    Developer::model()->findByPk($model->developer_id);
        $this->render('recommendation',array('model'=>$model,'name'=>$developer->first_name));
    }

	public function actionNewPassword()
	{
		if(!isset(Yii::app()->session['passwordEmail']))
			$this->redirect(Yii::app()->createUrl('/site/resetPassword'));
		$model     =    new NewpasswordForm;
		if(isset($_POST['NewpasswordForm'])){
			$model->attributes=$_POST['NewpasswordForm'];
			if($model->validate())
			{
				$record = Users::model()->findByAttributes(array('username'=>Yii::app()->session['passwordEmail']));
				$record->password          =    base64_encode($model->new_password);
				$record->status            =    1;
				
				if($record->save()){
					Yii::app()->user->setFlash('success1','Your password has been reset.');
					unset(Yii::app()->session['passwordEmail']);
					$this->redirect(array('site/login'));
				}
				else
					die('error');
			}
		}
		$this->render('newPassword',array('model'=>$model));
	}

	public function actionPrivacyTerms()
	{
		$this->render('privacyTerms');
	}

	public function actionError()
	{
		$error=Yii::app()->errorHandler->error;
		$errMsg	='Property "CWebUser.role" is not defined.';
		if($error)
		{
			$errorModel							= 		new ErrorLogs;
			$errorModel->user_type 				=		isset(Yii::app()->user->role)?Yii::app()->user->role:'Guest';
			$errorModel->user_id				=		isset(Yii::app()->user->id)?Yii::app()->user->id:'000';
			$errorModel->user_name				=		Yii::app()->user->name ;
			$errorModel->error_code				=		isset($error['code'])?$error['code']:'0000';
			$errorModel->message				=		isset($error['message'])?$error['message']:'Not Available';
			$errorModel->request_url			=		$_SERVER['REQUEST_URI'];
			$errorModel->query_string			= 		isset($_SERVER['QUERY_STRING'])?$_SERVER['QUERY_STRING']:'Not Available';
			$errorModel->file_name				=		isset($error['file'])?$error['file']:'Not Available';
			$errorModel->line_number			=		isset($error['line'])?$error['line']:'Not Available';;
			$errorModel->error_type				=		isset($error['type'])?$error['type']:'Not Available';
			$errorModel->time					=		date('Y-m-d H:i:s');
			$errorModel->reference_url			=		isset($_SERVER['HTTP_REFERER'])?$_SERVER['HTTP_REFERER']:'Direct from Broswer';
			$errorModel->ipaddress				=		isset($_SERVER['REMOTE_ADDR'])?$_SERVER['REMOTE_ADDR']:'NA';
			$errorModel->browser				=		($_SERVER['HTTP_USER_AGENT'])?$_SERVER['HTTP_USER_AGENT']:'Unknown';
			if($errMsg	!=	$errorModel->message)
				{
				 if($errorModel->save()){}
	  				//Yii::app()->user->logout();
				}
			else
				{
					//Yii::app()->user->logout();
				}
		}
        $this->render('error', array('error'=>$error));
	}
    
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			$data['name']	=	$model->name;
			$data['subject']=	$model->subject;
			$data['email']	=	$model->email;
			$data['body']	=	$model->body;
			$this->sendMail($data,'contact');
			$this->sendMail($data,'contactUs');
			//Yii::app()->user->setFlash('success','Thank you for contacting us. We will respond to you as soon as possible.');
			echo 'Thank you for contacting us. We will respond to you as soon as possible.';
			die;
		}
		//$this->layout='/layouts/newSite';
		$this->render('contact',array('model'=>$model));
	}
	
	public function actionSearch()
	{
		$this->layout	=	'layout';
		$industryFilter	=	array();
		$skillFilter	=	array();
		$serviceFilter	=	array();
		$filter			=	1;

		$criteria			=	new CDbCriteria;
		$criteria->distinct	=	true;
		if(!empty($_REQUEST['for'])){
			$matchs	=	explode(',',$_REQUEST['for']);
			foreach($matchs as $match){
				$criteria->addCondition('name LIKE "%'.$match.'%"','OR');
				$criteria->addCondition('about_company LIKE "%'.$match.'%"','OR');
				$supplierPortfolioList	=	SuppliersHasPortfolio::model()->findAll( 'project_name LIKE :match OR description LIKE :match ',array(':match' => "%$match%"));
				foreach($supplierPortfolioList as $portfolio)
					$suppliers[]		=	$portfolio->suppliers_id;

				if(!empty($suppliers))
					$criteria->addInCondition('t.id',$suppliers,'OR');


				//Skills filter
				$skillList		=	Skills::model()->findAllByAttributes(array('name'=>$match));
				if(!empty($skillList))
					foreach($skillList as $skill)
						$skillFilter[]		=	$skill->id;
				//Industry
				$industryList	=	Industries::model()->findAllByAttributes(array('name'=>$match));
				if(!empty($industryList))
					foreach($industryList as $industry)
						$industryFilter[]		=	$industry->id;
				//Services
				$servicesList	=	Services::model()->findAllByAttributes(array('name'=>$match));
				if(!empty($servicesList))
					foreach($servicesList as $services)
						$serviceFilter[]		=	$services->id;
			}
			if(!empty($skillFilter))
				$criteria->addInCondition('skills_id',$skillFilter,'OR');
			if(!empty($industryFilter))
				$criteria->addInCondition('industries_id',$industryFilter,'OR');
			if(!empty($serviceFilter))
				$criteria->addInCondition('services_id',$serviceFilter,'OR');


		}
		if(!empty($_REQUEST['skills'])){
			$skillList		=	Skills::model()->findAllByAttributes(array('name'=>$_REQUEST['skills']));
			if(!empty($skillList))
				foreach($skillList as $skill)
					$skillFilter[]		=	$skill->id;
			$criteria->addInCondition('skills_id',$skillFilter,'AND');
		}
		if(!empty($_REQUEST['industry'])){
			$industryList	=	Industries::model()->findAllByAttributes(array('name'=>$_REQUEST['industry']));
			if(!empty($industryList))
				foreach($industryList as $industry)
					$industryFilter[]		=	$industry->id;
			$criteria->addInCondition('industries_id',$industryFilter,'AND');
		}
		if(!empty($_REQUEST['services'])){
			$servicesList	=	Services::model()->findAllByAttributes(array('name'=>$_REQUEST['services']));
			if(!empty($servicesList))
				foreach($servicesList as $services)
					$serviceFilter[]		=	$services->id;
			$criteria->addInCondition('services_id',$serviceFilter,'AND');
		}
		$criteria->with	=	array('suppliersHasPortfolios'=>array('with'=>array('suppliersHasPortfolioHasSkills','suppliersHasPortfolioHasServices','suppliersPortfolioHasIndustries')),'suppliersHasReferences'=>array());
		$suppliers		=	Suppliers::model()->findAll($criteria);
		$supplierList	=	array();
		$count			=	0;
		foreach($suppliers as $supplier){
			if($count>=5)
				break;
			$supplierList[count($supplier->suppliersHasPortfolios)+ count($supplier->suppliersHasReferences)]=$supplier;
			$count++;
		}
		krsort($supplierList);
		$this->render('search',array("suppliers"=>$supplierList));
	}

	public function actionBackSearch()
	{
		$this->layout	=	'layout';
		$industryFilter	=	array();
		$skillFilter	=	array();
		$serviceFilter	=	array();
		$filter			=	1;

		$criteria			=	new CDbCriteria;
		$criteria->distinct	=	true;
		if(!empty($_REQUEST['for'])){
			$match	=	$_REQUEST['for'];
			$criteria->addCondition('name LIKE "%'.$match.'%"','OR');
			$criteria->addCondition('about_company LIKE "%'.$match.'%"','OR');
			$supplierPortfolioList	=	SuppliersHasPortfolio::model()->findAll( 'project_name LIKE :match OR description LIKE :match ',array(':match' => "%$match%"));
			foreach($supplierPortfolioList as $portfolio){
				$suppliers[]		=	$portfolio->suppliers_id;
			}
			if(!empty($suppliers))
				$criteria->addInCondition('t.id',$suppliers,'OR');
		}
		if(!empty($_REQUEST['skills'])){
			$skillList		=	Skills::model()->findAllByAttributes(array('name'=>$_REQUEST['skills']));
			if(!empty($skillList))
				foreach($skillList as $skill)
					$skillFilter[]		=	$skill->id;
			$criteria->addInCondition('skills_id',$skillFilter,'AND');
		}
		if(!empty($_REQUEST['industry'])){
			$industryList	=	Industries::model()->findAllByAttributes(array('name'=>$_REQUEST['industry']));
			if(!empty($industryList))
				foreach($industryList as $industry)
					$industryFilter[]		=	$industry->id;
			$criteria->addInCondition('industries_id',$industryFilter,'AND');
		}
		if(!empty($_REQUEST['services'])){
			$servicesList	=	Services::model()->findAllByAttributes(array('name'=>$_REQUEST['services']));
			if(!empty($servicesList))
				foreach($servicesList as $services)
					$serviceFilter[]		=	$services->id;
			$criteria->addInCondition('services_id',$serviceFilter,'AND');
		}
		$criteria->with		=	array('suppliersHasPortfolios'=>array('with'=>array('suppliersHasPortfolioHasSkills','suppliersHasPortfolioHasServices','suppliersPortfolioHasIndustries')),'suppliersHasReferences'=>array());
		$suppliers			=	Suppliers::model()->findAll($criteria);
		$supplierList	=	array();
		$count			=	0;
		foreach($suppliers as $supplier){
			if($count>=2)
				break;
			$supplierList[count($supplier->suppliersHasPortfolios)+ count($supplier->suppliersHasReferences)]=$supplier;
			$count++;
		}
		krsort($supplierList);
		$this->render('search',array("suppliers"=>$supplierList));
		
	}
	public function addFakeSuppliers($num=null)
	{
		if(!empty($num))
		{
			$criteria = new CDbCriteria;
			$criteria->select = 'id';
			$criteria->condition = 'state = 2';
			$client_projects = ClientProjects::model()->findAll($criteria);

			$criteria1 = new CDbCriteria;
			$criteria1->select = 'id';
			$services = Services::model()->findAll($criteria1);
			$skills = Skills::model()->findAll($criteria1);

			$industries = Industries::model()->findAll($criteria1);

			//CVarDumper::dump(array_rand($client_projects),10,1);die;

			for($i = 0 ; $i<$num ; $i++){

				$newuser = new Users;
				$newuser->display_name = "test2222_".$i;

				$newuser->username = $newuser->display_name."@venturepact.com";
				echo "<br />Creating new user - ".$newuser->username ;
				$newuser->password = $newuser->display_name."123";
				$newuser->role_id		=	3;
                $newuser->status		=	1;
                $newuser->add_date	=	date('Y-m-d H:i:s');
				$newuser->last_login	=	date('Y-m-d H:i:s');
				
				//CVarDumper::dump($client_projects,10,1);die;
                if($newuser->save())
                {
					echo "<br>Creating profile";
                    $profile	                =	new Suppliers;
                    $profile->name			    =	"";
                    $profile->first_name	    =	$newuser->display_name;
                    $profile->last_name	        =	$newuser->role;
                    $profile->users_id		    =	$newuser->id;
                    $profile->cities_id		    =	134717; //default for new york
                    $profile->status		    =	1;
                    $profile->add_date		    =	date('Y-m-d H:i:s');
                    if($profile->save()){

						//create services
						for($j=0 ; $j<2 ; $j++)
						{
							$supplierhasservices = new SuppliersHasServices;
							$supplierhasservices->suppliers_id = $profile->id;
							$supplierhasservices->services_id = array_rand($services);
							$supplierhasservices->status = 1;
							$supplierhasservices->add_date = date('Y-m-d H:i:s');
							/*if($supplierhasservices->save()){

							}else{

								echo "<br /> Error in services ";
							}*/
						}

						// create skills
						for($j=0 ; $j<6 ; $j++)
						{
							$supplierhasskiils = new SuppliersHasSkills;
							$supplierhasskiils->suppliers_id = $profile->id;
							$supplierhasskiils->skills_id = array_rand($skills);
							$supplierhasskiils->status = 1;
							$supplierhasskiils->add_date = date('Y-m-d H:i:s');
							/*if($supplierhasskiils->save()){

							}else
							{
								echo "<br /> Error in skills ";
							}*/


						}

						// create industries
						for($j=0 ; $j<6 ; $j++)
						{
							$supplierhasindustries = new SuppliersHasIndustries;
							$supplierhasindustries->suppliers_id = $profile->id;
							$supplierhasindustries->industries_id = array_rand($industries);
							$supplierhasindustries->status = 1;
							$supplierhasindustries->add_date = date('Y-m-d H:i:s');
						/*	if($supplierhasindustries->save()){

							}else
							{
								echo "<br /> Error in industries ";
							}*/


						}




						$assignProject = new SuppliersProjectsProposals;
						$assignProject->client_projects_id = array_rand($client_projects);
						$assignProject->suppliers_id = $profile->id;
						$assignProject->add_date = date("Y-m-d H:i");
						$assignProject->status = 0;
						echo " - assigend ".$assignProject->client_projects_id;
						/*if($assignProject->save()){

						}else{
							echo "<br /> Error in projects ";
						}*/

					}
					else{
						echo "<br />error creating prfile";
					}

				}else
				{
					echo "<br />error creating user";
				}
			}
		}
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionSignups()
	{
		$model				=	new LoginForm;
		$users				=	new Users;
		$users->attributes	=	$_POST['Users'];
		$users->role_id		=	2;
		$users->status		=	1;
		if($users->save())
		{
			$profile	                =	new ClientProfiles;
			$profile->first_name	    =	$users->display_name;
			$profile->email				=	$users->username;
			$profile->last_name	    	=	$users->role;
			$profile->users_id			=	$users->id;
			$profile->cities_id			=	(!empty($_POST['ClientProjects']['cities_id']))?$_POST['ClientProjects']['cities_id']:134717;
			//$profile->team_size		    =	$_POST['ClientProjects']['team_size'];
			//$profile->company_link		=	$_POST['Users']['company_link'];
			$profile->company_name		=	$_POST['Users']['company_name'];
			$profile->status		    =	1;
			$profile->add_date		    =	date('Y-m-d H:i:s');
			if($profile->save()){
				$data['name']		=	$users->display_name;
				$data['email']		=	$users->username;
				$data['password']	=	$users->password;
				$this->sendMail($data,'register');
			
				$model->username	=	$users->username;
				$model->password	=	$users->password;
				if($model->login())
					$response = array("exist" =>true,'message'=>'Welcome to VenturePact. Post your first job by clicking on "Add a new Job". <br>If you would like to discuss your requirements over a call, feel free to schedule a call here.');
				else{
					$response = array("exist" =>false,'message'=>'Error occurred during login to your account. Please try again after some time.');
				}
			}
			else
				$response = array("exist" =>false,'message'=>'Signup not completed. Error occurred during registration. Please fill all the details carefully.');
		}
		else
			$response = array("exist" =>false,'message'=>'Signup not completed. This email address is already in use.');

		echo json_encode($response);
		die;
	}
	
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionDynamicCity()
	{
		if(isset($_REQUEST['country']))
			$countryId	=	$_REQUEST['country'];
		elseif(isset($_REQUEST['Company']['country']))
			$countryId	=	$_REQUEST['Company']['country_id'];
		elseif(isset($_REQUEST['Developer']['country_id']))
			$countryId=$_REQUEST['Developer']['country_id'];
		elseif(isset($_REQUEST['Schools']['country_id']))
			$countryId	=	$_REQUEST['Schools']['country_id'];
		elseif(isset($_REQUEST['Investor']['country_id']))
			$countryId	=$_REQUEST['Investor']['country_id'];
		elseif(isset($_POST['state_id'])) //added for creating supplier via admin panel 
			$countryId	=$_POST['state_id'];
	
				
		$cityList	= Cities::model()->findAllByAttributes(array('countries_id'=>$countryId,'status'=>1),array('order'=>'name ASC'));
        //echo CHtml::tag('option',array(''=>"Select City"),CHtml::encode("Select City"),true);
		foreach($cityList as $city)
		{
			echo CHtml::tag('option',array('value'=>$city->id),CHtml::encode($city->name),true);
		}
		
		die;
	}
    
   public function actionDynamicPriceTire()
   {
    
    if(isset($_POST['cities_id'])) //added for creating supplier via admin panel 
			$cityId	=$_POST['cities_id'];
	
				
		$cityList	= Cities::model()->findAllByAttributes(array('id'=>$cityId));
   		//CVarDumper::dump($cityList[0]->states,10,1);die;
    	foreach($cityList[0]->states->priceZone->priceTiers as $tiers)
		{
			echo CHtml::tag('option',array('value'=>$tiers->id),CHtml::encode($tiers->title.' $'.$tiers->min_price.' - $'.$tiers->max_price),true);
		}
		
		die;

   }
    	
	
	public function sendMail($data,$type)
	{
		$templete	=	'';
		$admin	=	0;
		$subject	=	'default';
		switch($type){
            case "complete_profile" :
                $templete	=	"complete_profile";	
				$subject = 'VenturePact: Complete Your Profile ';
				$body = $this->renderPartial('/mails/complete_profile_tpl',
										array(	'data' => $data),
											 true
											);
            break;
			case 'welcome':
				$subject = 'VenturePact: We are offering you premium concierge service.';
				$body = $this->renderPartial('/mails/welcome_tpl',
										array('name' => $data['name']), true);
			break;
			case 'welcome_complete_profile_supplier':
				$subject = 'Welcome To VenturePact: We are offering you premium concierge service.';
				$body = $this->renderPartial('/mails/welcome_complete_profile_supplier_tpl',
										array('data' => $data), true);
			break;
			case 'contact':
				$templete	=	"contact";
				$subject = 'VenturePact: Thanks for contacting us.';
				$body = $this->renderPartial('/mails/contact_tpl',
										array('name' => $data['name']), true);
			break;
			
			case 'contactUs':
				$templete	=	"contactUs";
				$admin	=	1;
				$subject = $data['subject'];
				$body = $this->renderPartial('/mails/contact-us_tpl',array('name' => $data['name'],'message'=> $data['body']), true);
			
			break;
			case 'forget':
				$templete	=	"forget";
				$subject = 'VenturePact: Forgot Password';
				$body = $this->renderPartial('/mails/forgot_tpl',
										array(	'name' => $data['name'],
												'email'=>$data['email'],
												'password'=>$data['password']), true);
			break;
			case 'loginReminder':
			    $templete	=	"loginReminder";
				$subject = 'VenturePact: Login Reminder.';
                $body = $this->renderPartial('/mails/loginReminder_tpl',array('name' => $data['name']),true);
			break;
			case 'register':
				$templete	=	"register";
				$subject = 'Action Required - Verify Email Address';
				$body = $this->renderPartial('/mails/register_tpl',
										array(	'name' => $data['name'],
												'email'=>$data['email'],
                                                'link'=>base64_encode($data['email']),
												'password'=>base64_encode($data['password'])), true);
				$admin	=	2;
			break;
			case 'rfp_submitted_new_tpl':
				$templete	=	"register";
				if($data['linkedin']=='')
				$subject 	= 'Action Required - Verify Email Address';
				else
				$subject	= ' Welcome to VenturePact: We are offering you premium concierge service.';	
				$body = $this->renderPartial('/mails/rfp_submitted_new_tpl',
										array(	'name' => $data['name'],
										'data' => $data,
												'email'=>$data['email'],
                                                'link'=>base64_encode($data['email']),
												'linkedin'=>$data['linkedin'],
												'password'=>base64_encode($data['password'])), true);
				$admin	=	2;
			break;
			case 'register_supplier':
				$templete	=	"register";
				$subject = 'Action Required - Verify Email Address';
				$body = $this->renderPartial('/mails/register_supplier_tpl',
										array(	'name' => $data['name'],
												'email'=>$data['email'],
                                                'link'=>base64_encode($data['email']),
												'password'=>base64_encode($data['password'])), true);
				$admin	=	2;
			break;
			case 'faq':
				$templete	=	"faq";
				$admin	=	1;
				$subject = $data['subject'];
				$body = $this->renderPartial('/mails/faq_tpl',array('name' => $data['name'],'email'=>$data['email'],'message'=>$data['message']), true);
			break;
			case 'request':
				$templete	=	"request";
				$subject = 'Project request application';
				$body = $this->renderPartial('/mails/request_tpl',
										array(	'data' => $data), true);
										
				$data['email']	=	Yii::app()->params['adminEmail'];
			break;
			case 'submit_rfp':
				$templete	=	'submit_rfp';
				$subject = 'VenturePact: RFP Successfully Submitted';
				$body = $this->renderPartial('/mails/rfp_submitted_new_tpl',
										array(	'name' => $data['name'],
												'data' => $data,
												'email'=>$data['email']), true);
			break;
			
			
            case 'twoNfourDays_reminder':
				$templete	=	"twoNfourDays_reminder";
                $subject = "VenturePact: Defining the requirements for ".$data['project'].".";
				$body = $this->renderPartial('/mails/remainder_email1_tpl',
										array(	'data' => $data), true);

            break;
            case 'sevenDays_reminder':
				$templete	=	"sevenDays_reminder";
                $subject = "VenturePact: Defining the requirements for ".$data['project'].".";
				$body = $this->renderPartial('/mails/remainder_email_sevenDays_tpl',
										array(	'data' => $data), true);

            break;
            case 'fiveNtwentyDaysOldProfiles_feedback':
				$templete	=	"fiveNtwentyDaysOldProfiles_feedback";
                $subject = " VenturePact: We value your feedback";
				$body = $this->renderPartial('/mails/feedback_email_5and20DaysOld_tpl',
										array(	'data' => $data), true);

            break;
            case 'remainder_email_22hourOld_notpitched':
				$templete	=	"remainder_email_22hourOld_notpitched";
                $subject = "VenturePact: Reminder for ".$data['project'].".";
				$body = $this->renderPartial('/mails/remainder_email_22hourOld_notpitched_tpl',
										array(	'data' => $data), true);

            break;
            case 'reminder_completeProfile':
				$templete	=	"reminder_completeProfile";
                $subject = "VenturePact: Reminder for completing profile";
				$body = $this->renderPartial('/mails/reminder_completeProfile_tpl',
										array(	'data' => $data), true);

            break;
            case 'remainder_email_22hour_2days_not_seen_proposal':
				$templete	=	"remainder_email_22hour_2days_not_seen_proposal";
                $subject = "VenturePact: You received a proposal";
				$body = $this->renderPartial('/mails/remainder_email_22hour_2days_not_seen_proposal_tpl',
										array(	'data' => $data), true);

            break;
            case 'feedback_email_after1week_supplierApproved':
				$templete	=	"feedback_email_after1week_supplierApproved";
                $subject = "VenturePact: Catching up to see how the engagement is going";
				$body = $this->renderPartial('/mails/feedback_email_after1week_supplierApproved_tpl',
										array(	'data' => $data), true);

            break;
             case "seek_clarification" :
			 	$templete	=	"seek_clarification";
                $subject = 'VenturePact: An interested service provider is seeking clarification';
				$body = $this->renderPartial('/mails/seek_clarification_tpl',
										array('data' => $data),
											 true
											);
            break;
            case 'followup' :
				$templete	=	"followup";
				$link = $data['client_email'].",".$data['client_id'].",".$data['supplier_id'].",".$data["id"] ;
				$subject = 'Reminder -'.$data["company_name"].' is requesting a Recommendation';
				$body = $this->renderPartial('/mails/supplier_reference_followup_tpl',
										array(	'data' => $data,
                                                'link'=>base64_encode($link)),
											 true
											);
			break;
			case 'reminder_chatMessages' :
				$templete	=	"reminder_chatMessages";
				$subject = 'Reminder - You got a new message';
				$body = $this->renderPartial('/mails/reminder_chatMessages_tpl',
										array('data' => $data),true);
			break;
            case 'new_user_signup' :
            
                
				$templete	=	"new_user";
				$subject = 'New Registration';
			                            
                $body = $this->renderPartial('/mails/new_user',
										array(	'name' => $data['name'],
												'email'=> $data['email'],
                                                'id' => $data['id']), true);                        
                $admin = 5;            
			break;
			case 'calculatorcall' :
                $templete	=	"calculatorcall";
				$subject = 'VenturePact: Thanks for contacting us.';
                $body = $this->renderPartial('/mails/calculatorcall_tpl',array('data' => $data),true);
            break;
            case 'indexcall' :
                $templete	=	"indexcall";
				$subject = 'VenturePact: Call me back request.';
                $body = $this->renderPartial('/mails/indexcall_tpl',array('phone' => $data['phone']),true);
            break;
            
            
            case "project_detail_to_admin" :
				$templete	=	'clientdetail_email_to_admin';			
                $subject = 'VenturePact: Client Project Detail';
                $body = $this->renderPartial('/mails/clientdetail_email_to_admin',array('data' => $data),true);
                $new_email = "";
                
            break;
            
			default:
			break;			
		}
       
		$from		=	Yii::app()->params['adminEmail'];
        $fromname   =	"VenturePact Team";
        
        if(isset($data['email']))
        {
            $to			=	$data['email'];    
        }
        
		
		
		if($admin==1){
			$from		=	$data['email'];
			$to			=	Yii::app()->params['adminEmail'];
		}
        
        if($admin==5){
			$from		=	$data['email'];
			$to			=	"devrelations@venturepact.com";
            //$to			=	"sandeep.verma@venturepact.com"; 
		}
		
        if(isset($new_email))
        {
            if(isset($data['email']))
            {
                $from = $data['email'];    
            }else{
                $from = "newclient@venturepact.com";
            }
            
            //$to = Yii::app()->params['adminEmail'];
            $to = "pratham@venturepact.com";
          
        }
        
        
        
		require_once("sendgrid-php/sendgrid-php.php");
		$options = array("turn_off_ssl_verification" => true);
		$sendgrid = new SendGrid('riteshtandon231981', 'venturepact1', $options);
		$mail = new SendGrid\Email();
		
		
		if($admin==2)//Admin will get sigup notifictaion 
			$mail->addTo($to)->addTo($from)->setFrom($from)->setFromName($fromname)->setSubject($subject)->setHtml($body);
		else
			$mail->addTo($to)->setFrom($from)->setFromName($fromname)->setSubject($subject)->setHtml($body);
		
        //CVarDumper::Dump($mail,10,1);
        //die;
		if(!$sendgrid->send($mail))
			return 0;
		else
		{
			if(parent::mailLog($subject,$to,$templete,$body))
			return 1;
		}
	}
   
	public function ActionLinkedin()
	{
		$role				=	$_REQUEST['role'];
		if(isset($_REQUEST['ref']) && $_REQUEST['ref']>0)
			$ref			=	$_REQUEST['ref'];
		else
			$ref			=	0;
		$API_CONFIG = array(
			'appKey'       => '75anr5w4aijrvv',
			'appSecret'    => 'Aox4aWXcgWh1J3pk',
			'callbackUrl'  => $this->createAbsoluteUrl('/site/linkedinAfter',array('role'=>$role,'ref'=>$ref))
			);
		$_REQUEST['lType']	=	(isset($_REQUEST['lType'])) ? $_REQUEST['lType'] : '';
		switch($_REQUEST['lType']) {
			case 'initiate':
				$OBJ_linkedin = new LinkedIn($API_CONFIG);
				$_GET[LINKEDIN::_GET_RESPONSE] = (isset($_GET[LINKEDIN::_GET_RESPONSE])) ? $_GET[LINKEDIN::_GET_RESPONSE] : '';
				if(!$_GET[LINKEDIN::_GET_RESPONSE]) {
					$response = $OBJ_linkedin->retrieveTokenRequest();
					if($response['success'] === TRUE) {
						Yii::app()->session['oauth_request']	= $response['linkedin'];
						header('Location: ' . LINKEDIN::_URL_AUTH . $response['linkedin']['oauth_token']);
					} else {
						echo "Request token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
					}
				}
				else{
					$response = $OBJ_linkedin->retrieveTokenAccess(Yii::app()->session['oauth_request']['oauth_token'],Yii::app()->session['oauth_request']['oauth_token_secret'], $_GET['oauth_verifier']);
					if($response['success'] === TRUE) {
						Yii::app()->session['oauth_access'] = $response['linkedin'];
						Yii::app()->session['oauth_authorized'] = TRUE;
						$this->redirect(Yii::app()->createUrl('linkedinAfter',array('role'=>$role,'ref'=>$ref)));
					} else {
						echo "Access token retrieval failed:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
					}
				}
			break;
			case 'revoke':
				if(!oauth_session_exists()) {
					throw new LinkedInException('This script requires session support, which doesn\'t appear to be working correctly.');
				}
				$OBJ_linkedin = new LinkedIn($API_CONFIG);
				$OBJ_linkedin->setTokenAccess(Yii::app()->session['oauth_access']);
				$response = $OBJ_linkedin->revoke();
				if($response['success'] === TRUE) {
					session_unset();
					$_SESSION = array();
					if(session_destroy()) {
						header('Location: ' . $_SERVER['PHP_SELF']);
					} else {
						echo "Error clearing user's session";
					}
				} else {
					echo "Error revoking user's token:<br /><br />RESPONSE:<br /><br /><pre>" . print_r($response, TRUE) . "</pre><br /><br />LINKEDIN OBJ:<br /><br /><pre>" . print_r($OBJ_linkedin, TRUE) . "</pre>";
				}
			break;
			default:
				if(version_compare(PHP_VERSION, '5.0.0', '<')) {
					throw new LinkedInException('You must be running version 5.x or greater of PHP to use this library.'); 
				} 
				if(extension_loaded('curl')) {
					$curl_version = curl_version();
					$curl_version = $curl_version['version'];
				}else {
					throw new LinkedInException('You must load the cURL extension to use this library.'); 
				}
			break;
		}
	}	
	
	public function ActionLinkedinAfter()
	{
		$API_CONFIG = array(
			'appKey'       => '75anr5w4aijrvv',
			'appSecret'    => 'Aox4aWXcgWh1J3pk',
			'callbackUrl'  => $this->createAbsoluteUrl('/site/linkedinAfter',array('role'=>$_REQUEST['role'],'ref'=>$_REQUEST['ref']))
			//'callbackUrl'  => $this->createAbsoluteUrl('/site/linkedinAfter')
			);			
		$OBJ_linkedin = new LinkedIn($API_CONFIG);
		$response = $OBJ_linkedin->retrieveTokenAccess(Yii::app()->session['oauth_request']['oauth_token'],Yii::app()->session['oauth_request']['oauth_token_secret'], $_GET['oauth_verifier']);
		if($response['success'] === TRUE) {
			Yii::app()->session['oauth_access'] = $response['linkedin'];
			Yii::app()->session['oauth_authorized'] = TRUE;
		}
		Yii::app()->session['oauth_authorized'] = (isset( Yii::app()->session['oauth_authorized']))? Yii::app()->session['oauth_authorized']: FALSE;
		if( Yii::app()->session['oauth_authorized'] === TRUE) {
			$OBJ_linkedin = new LinkedIn($API_CONFIG);
			$OBJ_linkedin->setTokenAccess(Yii::app()->session['oauth_access']);
			$OBJ_linkedin->setResponseFormat(LINKEDIN::_RESPONSE_XML);
			$response = $OBJ_linkedin->profile('~:(id,first-name,last-name,public-profile-url,email-address,picture-url,location,interests,industry,phone-numbers,main-address,positions,skills,educations,network,connections)');
			if($response['success'] === TRUE) {
				$response['linkedin'] = new SimpleXMLElement($response['linkedin']);
				$responseArray	=	(array) $response['linkedin'];
				$loc			=	(array)$responseArray['location'];
				$industry		=	(isset($responseArray['industry']))?$responseArray['industry']:'';
				$postion		=	(array)$responseArray['positions'];
				$connects		=	(array)$responseArray['connections'];
				$connections	=	(array)(isset($connects['person'])?$connects['person']:array());
				if(isset($postion['position'][0])){
					$curPo		=	(isset($postion['position'][0]))?(array)$postion['position'][0]:array();
					$company1	=	(isset($curPo['company']))?(array)$curPo['company']:array();
					$company	=	(isset($company1['name']))?$company1['name']:'';
				}
				$location		=	explode(',',$loc['name']);
				if(isset($location[1]) && isset($location[0])){
					$stat		=	Countries::model()->findByAttributes(array('name'=>rtrim(ltrim(ucfirst($location[1]),' '),' ')));
					if(empty($stat)){
						$stat				=	new Countries;
						$stat->name			=	rtrim(ltrim(ucfirst($location[1]),' '),' ');
						$stat->description	=	'Data added from Linkedin';
						$stat->price_zone_id=	1;
						$stat->regions_id	=	1;
						$stat->code			=	1;
						$stat->code2		=	1;
						$stat->status		=	1;
						$stat->save();
					}
					$city	=	Cities::model()->findByAttributes(array('name'=>rtrim(ltrim(ucfirst($location[0]),' '),' '),'countries_id'=>$stat->id));
					if(empty($city)){
						$city				=	new Cities;
						$city->name			=	rtrim(ltrim(ucfirst($location[0]),' '),' ');
						$city->description	=	'Data added from Linkedin';
						$city->countries_id	=	$stat->id;
						$city->code			=	1;
						$city->status		=	1;
						$city->save();
					}
				}
				else
					$city			=	Cities::model()->findByPk(9);


				$userCityLinkdin	=	$city->id;
				$actionSet			=	0;
				$linkedinId			=	$responseArray['id'];
				if(isset(Yii::app()->user->email) && !empty(Yii::app()->user->email)){
					$email             =	Yii::app()->user->email; 
					$actionSet	       =	1;
                }
				else
					$email		=	$responseArray['email-address'];

                $linkedInemail	   =	$responseArray['email-address'];
                
				$phone			=	$responseArray['phone-numbers'];
				$display_name	=	(isset($responseArray['first-name']))?$responseArray['first-name']:'';
				$profileUrl		=	(isset($responseArray['public-profile-url']))?$responseArray['public-profile-url']:'';
				$profilePic		=	(isset($responseArray['picture-url']))?$responseArray['picture-url']:'';
				$last_name		=	(isset($responseArray['last-name']))?$responseArray['last-name']:'';
				$education1		=	(array)$responseArray['educations'];
				if(!empty($education1['education']))
					$educations		=	$education1['education'];
				else	
					$educations		=	array();
				if(!empty($responseArray['positions']))
					$position1		=	(array)$responseArray['positions'];
				else
					$position1		=	array();
				
				if(!empty($position1) && !empty($position1['position']))
					$positions		=	$position1['position'];
				else	
					$positions		=	array();
				$record_exists	=	Users::model()->find('linkedin = :linkedinId', array(':linkedinId'=>$linkedinId));
				if(!empty($record_exists)){
                    
					if($email == $linkedInemail && $linkedInemail==$record_exists->username){
                        $model     			=     new LoginForm;
    					$model->username	=	$record_exists->username;
    					$model->password	=	$record_exists->password;
    					if($model->validate() && $model->login()){
    						if(isset(Yii::app()->user->role))
    						    $this->redirect(array('/'.Yii::app()->user->role));
    						else
    							$this->redirect(array('site/login'));
    					}
                    }else{
                        if(isset(Yii::app()->user->role)){
						
    						    Yii::app()->user->setFlash('linkedinError',"This LinkedIn account is already connected to some other user.");
								Yii::app()->user->setFlash('successR','Thank you for reviewing the service provider. We really appreciate it as it helps us maintain a high standard of service.');
								if($_REQUEST['ref']>0)
								{
									$refe			=	SuppliersHasReferences::model()->findByPk($_REQUEST['ref']);
									$refe->status	=	1;
									$refe->save();
									$this->redirect(array('/client/profile','page'=>'2'));
								}
    							$this->redirect(array('/'.Yii::app()->user->role));
						}else{
							Yii::app()->user->setFlash('error',"This LinkedIn account is already connected to some other user.");
							$this->redirect(array('site/login'));
						}
                    }
                    
				}
				else{
					$users	=	Users::model()->findByAttributes(array('username'=>$email));
					if(empty($users)){
						$users					=	new Users;
						$users->username		=	$email;
						$password				=	time();
						$users->password		=	base64_encode($password);
						$users->status			=	1;
						$users->role_id			=	$_REQUEST['role'];
						$users->display_name	=	$display_name.time();
						$users->add_date		=	date('Y-m-d H:i:s');
						$users->last_login		=	date('Y-m-d H:i:s');
						$users->first_name	    =	$display_name;
						$users->last_name		=	$last_name;
						$users->company_name	=	(isset($company))?$company:'';
						$users->phone_number	=	(isset($phone))?$phone:"";
						$users->image			=	$profilePic;
						
					}
					$users->linkedin			=	$linkedinId;
					$users->image				=	$profilePic;
					if($users->save())
					{
						$user_city	=	UsersHasCities::model()->findByAttributes(array('users_id'=>$users->id));
						if(empty($user_city)){
							$user_has_cities			=	new UsersHasCities;
							$user_has_cities->users_id	=	$users->id;
							$user_has_cities->cities_id	=	$userCityLinkdin;
							$user_has_cities->save();
						}
						foreach($connections as $connection){
							$item						=	(array)$connection;
							if($item['id']!='private'){
								$linkedConn					=	new LinkedinConnections;
								$linkedConn->linkedin_Id	=	$item['id'];
								$linkedConn->first_name		=	(isset($item['first-name']))?$item['first-name']:'';
								$linkedConn->last_name		=	(isset($item['last-name']))?$item['last-name']:'';
								$linkedConn->headline		=	(isset($item['headline']))?$item['headline']:'';
								$linkedConn->image			=	(isset($item['picture-url']))?$item['picture-url']:'';
								$linkedConn->industry		=	(isset($item['industry']))?$item['industry']:'';
								$linkedConn->url			=	(isset($item['site-standard-profile-request']))?$item['site-standard-profile-request']:'';
								$linkedConn->add_date		=	date('Y-m-d H:i:s');
								$linkedConn->status			=	1;
								$linkedConn->users_id		=	$users->id;
								$loc						=	(array)$item['location'];
								$linkedConn->location		=	(isset($loc['name']))?$loc['name']:'';
								$location		=	explode(',',$loc['name']);
								if(isset($location[1]) && isset($location[0])){
									$stat		=	Countries::model()->findByAttributes(array('name'=>rtrim(ltrim(ucfirst($location[1]),' '),' ')));
									if(empty($stat)){
										$stat				=	new Countries;
										$stat->name			=	rtrim(ltrim(ucfirst($location[1]),' '),' ');
										$stat->description	=	'Data added from Linkedin';
										$stat->price_zone_id=	1;
										$stat->regions_id	=	1;
										$stat->code			=	1;
										$stat->code2		=	1;
										$stat->status		=	1;
										$stat->save();
									}
									$city1	=	Cities::model()->findByAttributes(array('name'=>rtrim(ltrim(ucfirst($location[0]),' '),' '),'countries_id'=>$stat->id));
									if(empty($city1)){
										$city1				=	new Cities;
										$city1->name			=	rtrim(ltrim(ucfirst($location[0]),' '),' ');
										$city1->description	=	'Data added from Linkedin';
										$city1->countries_id	=	$stat->id;
										$city1->code			=	1;
										$city1->status		=	1;
										$city1->save();
									}
								}
								else
									$city1				=	Cities::model()->findByPk(9);
								
								$linkedConn->cities_id		=	$city1->id;
								$linkedConn->save();
								
								
								//if(!$linkedConn->save()){
									//CVarDumper::dump($linkedConn,10,1);
									//die;
								//}
							}
						}
						if($_REQUEST['role']==2){
							$profile	=	ClientProfiles::model()->find('users_id = :userId', array(':userId'=>$users->id));
							if(empty($profile)){
								$profile	        =	new ClientProfiles;
								$profile->users_id	=	$users->id;
								$profile->status	=	1;
								$profile->category	=	$industry;
								$profile->add_date	=	date('Y-m-d H:i:s');
								$profile->save();
								$client_city	=	ClientProfilesHasCities::model()->findByAttributes(array('client_profiles_id'=>$profile->id));
								if(empty($client_city)){
									$client_city						=	new ClientProfilesHasCities;
									$client_city->client_profiles_id	=	$profile->id;
									$client_city->cities_id				=	$userCityLinkdin;
									$client_city->is_main				=	1;
									$client_city->save();
								}
							}
							if($actionSet==1)
							{
								if($_REQUEST['ref']>0)
								{
									Yii::app()->user->setFlash('successR','Thank you for reviewing the service provider. We really appreciate it as it helps us maintain a high standard of service.');
									$this->redirect(array('/client/profile','page'=>'2'));
								}
								$this->redirect(array('/client/account'));
							}
							$model				=	new LoginForm;
							$model->username	=	$users->username;
							$model->password	=	$users->password;
							if($model->login()){
								$data['name']		=	$users->display_name;
								$data['email']		=	$users->username;
								$data['password']	=	$users->password;
								//$this->sendMail($data,'register');
								if(isset(Yii::app()->user->role)){
									$this->redirect(array('/'.Yii::app()->user->role));
								}else{
									$this->redirect(array('site/login'));
								}
							}
							else{
								Yii::app()->user->setFlash('error','Unable to connect linked in profile.');
								$this->redirect(Yii::app()->createUrl('/site/login'));
							}
						}
						else{
							$profile	=	Suppliers::model()->find('users_id = :userId', array(':userId'=>$users->id));
							if(empty($profile)){
								$profile	        =	new Suppliers;
								$profile->users_id	=	$users->id;
								$profile->status	=	0;
								$profile->add_date	=	date('Y-m-d H:i:s');
								$profile->save();
								
								$client_city	=	SuppliersHasCities::model()->findByAttributes(array('suppliers_id'=>$profile->id));
								if(empty($client_city)){
									$client_city				=	new SuppliersHasCities;
									$client_city->suppliers_id	=	$profile->id;
									$client_city->cities_id		=	$userCityLinkdin;
									$client_city->save();
								}
								
							}
							if($actionSet==1)
							{
								$this->redirect(array('/supplier/account'));
							}
							$model				=	new LoginForm;
							$model->username	=	$users->username;
							$model->password	=	$users->password;
							if($model->login()){
								$data['name']		=	$users->display_name;
								$data['email']		=	$users->username;
								$data['password']	=	$users->password;
								//$this->sendMail($data,'complete_profile');
								//$this->sendMail($data,'register_supplier');
								if(Yii::app()->user->role=='admin'){
									$this->redirect(array('admin/admin'));
								}
								elseif(Yii::app()->user->role=='client'){
									$this->redirect(array('client'));
								}
								elseif(Yii::app()->user->role=='supplier'){
									$this->redirect(array('supplier'));
								}else{
									$this->redirect(array('site'));
								}
							}
							else{
								Yii::app()->user->setFlash('loginError','Unable to connect linked in profile.');
								$this->redirect(Yii::app()->createUrl('/site/supplier'));
							}
						}
					}
					else{
						Yii::app()->user->setFlash('loginError','Unable to connect linked in profile.');
						$this->redirect(Yii::app()->createUrl('/site/login'));
					}
				}
			}
			else{
				Yii::app()->user->setFlash('loginError',"Error retrieving profile information:<br />RESPONSE:<br /><pre>".print_r($response)."</pre>");
				$this->redirect(Yii::app()->createUrl('/site/login'));
			}
		}
	}
    /*
    * Cron job actions
    * Schedular basis
    */

    public function actionReminder()
    {
        
		 /*Sending mail after 7 days  IF user didn't login to venturepact*/
        $reminderLoginChecked = Users::model()->findAll("datediff('".date('Y-m-d H:i:s')."', last_login) >= 7",array(":status"=>1));
        if(!empty($reminderLoginChecked)){
             foreach($reminderLoginChecked as $user)
             {
				if($user->role_id==2)
					$data["name"] = $user->clientProfiles->first_name." ".$user->clientProfiles->last_name;
				else
					$data["name"] = $user->suppliers->first_name." ".$user->suppliers->last_name;
                
				$data["email"] = $user->username;
                $this->sendMail($data,'loginReminder');

            }
        }else{
            echo " -  NO records found ";
        }
		
		
		
		
		
		
		/*
        * Finding all projects which has been started two/four days ago
        */
        
		
		
		//echo "Sending mails to project owners which are 2 or 4 days old<br>";
        $twoNfourDays = ClientProjects::model()->findAll("state=:state AND add_date <> '' AND (datediff(now(), add_date) = 2 OR datediff(now(), add_date) = 4)  ",array(":state"=>1));
        foreach($twoNfourDays as $project)
        {
            $data["name"] = $project->clientProfiles->first_name." ".$project->clientProfiles->last_name;
            $data["project"] = $project->name;
            $data["email"] = $project->clientProfiles->users->username;
            //CVarDumper::dump($data,10,1);
            $this->sendMail($data,'twoNfourDays_reminder');

        }


        /*
        * Finding all 7 Days of starting projects and send mail
        *
        */
        //echo "<br>Sending mails to project owners which are 7 days old<br>";
         $sevenDays = ClientProjects::model()->findAll("state=:state AND add_date <> '' AND datediff(now(), add_date) = 7 ",array(":state"=>1));
        foreach($sevenDays as $project)
        {
            $data["name"] = $project->clientProfiles->first_name." ".$project->clientProfiles->last_name;
            $data["project"] = $project->name;
            $data["email"] = $project->clientProfiles->users->username;
            //CVarDumper::dump($data,10,1);
            $this->sendMail($data,'sevenDays_reminder');

        }

        /*
        * Finding all client profiles who are 5 and 20 days old
        */
        //echo "<br>Sending mails to users for feedback who are 5 or 20  days old<br>";
        $fiveNtwentyDaysOldProfiles = Users::model()->findAll("status=:status AND add_date <> '' AND (datediff(now(), add_date) = 5 OR datediff(now(), add_date) = 20) ",array(":status"=>1)) ;
        foreach($fiveNtwentyDaysOldProfiles as $users)
        {
            $data["name"] = $users->display_name;
            $data["email"] = $users->username;
            //CVarDumper::dump($data,10,1);
            $this->sendMail($data,'fiveNtwentyDaysOldProfiles_feedback');

        }

        /*
        * Email asking Supplier to complete Profile, Reminder every 2, 4 and 7days
        */
        //echo "<br>Sending asking Supplier to complete Profile, Reminder every 2, 4 and 7days<br>";
        $completeProfileReminder =  Suppliers::model()->findAll("is_application_submit = 0 AND add_date <> '' AND (datediff(now(), add_date) = 2 OR datediff(now(), add_date) = 4 OR datediff(now(), add_date) = 7 )");
        foreach($completeProfileReminder as $users)
        {
            $data["name"] = $users->first_name." ".$users->last_name;
            $data["email"] = $users->users->username;
            //CVarDumper::dump($data,10,1);
            $this->sendMail($data,'reminder_completeProfile');

        }

        /*
        * 2 days after ^
        * SuppliersHasReferences
        **/

        $pastClient_2days_old = SuppliersHasReferences::model()->findAll("status=0 AND created <> '' AND (datediff(now(), created) = 2)",array());
        foreach($pastClient_2days_old as $users)
        {
            $data = $users->attributes;

            $data["supplier_id"]	= $users->suppliers_id ;
			$data['company_name'] 	= $users->suppliers->name;
			$data['first_name'] 	= $users->suppliers->first_name ;
			$data['last_name'] 		= $users->suppliers->last_name ;
			$data['email']			= $users->client_email ;
			$data['client_id'] 		= $users->client_id ;

            //CVarDumper::dump($data,10,1);
            $this->sendMail($data,'followup');

        }
        /*
        *Sending mail after 2 days  IF clarifications not yet checked by the client
        */

        //echo "<br> Sending mail after 2 days  IF clarifications not yet checked by the client.";
        $reminder_clarificationNotChecked = Log::model()->findAll("project_status=:status AND is_checked = 0 AND add_date <> '' AND proposal_id <> '' AND is_active = 1 AND datediff(now(), add_date) = 2 ",array(":status"=>1));
       // CVarDumper::dump($reminder_clarificationNotChecked,10,1);
        if(!empty($reminder_clarificationNotChecked)){
             foreach($reminder_clarificationNotChecked as $projects)
             {
                $project = SuppliersProjectsProposals::model()->findByPk($projects->proposal_id);
                $data["name"] = $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name;
                $data["email"] = $project->clientProjects->clientProfiles->users->username;
                $data["project"] = $project->clientProjects->name;
                $data['id'] = $project->id;
                $data['pid'] = $project->client_projects_id;
                //CVarDumper::dump($data,10,1);
                $this->sendMail($data,'seek_clarification');

            }
        }else{
            echo " -  NO records found ";
        }
        /*
        * Reminder email to be sent after 2 or 7
        * IF propsal not yet checked by the client.
        */

       // echo "<br> Sending Reminder email to be sent after 2 or 7 IF propsal not yet checked by the client..";
        $reminder_propsalsNotChecked = Log::model()->findAll("project_status=:status AND is_checked = 0 AND add_date <> '' AND proposal_id <> '' AND is_active = 1 AND (datediff(now(), add_date) = 2 OR datediff(now(), add_date) = 7) ",array(":status"=>2));
        //CVarDumper::dump($reminder_propsalsNotChecked,10,1);
        if(!empty($reminder_propsalsNotChecked)){
             foreach($reminder_propsalsNotChecked as $projects)
             {
                $project = SuppliersProjectsProposals::model()->findByPk($projects->proposal_id);
                $data["name"] = $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name;
                $data["email"] = $project->clientProjects->clientProfiles->users->username;
                $data["project"] = $project->clientProjects->name;
				$data["id"] = $project->client_projects_id;
                //CVarDumper::dump($data,10,1);
                $this->sendMail($data,'remainder_email_22hour_2days_not_seen_proposal');

            }
        }else{
            echo " -  NO records found ";
        }

        /*
        * ONe week after the client approves a supplier
        */

        //echo "<br> Sending mail after 1week of proposal accepted by the client.";
        $feedback_email_after1week_supplierApproved = Log::model()->findAll("project_status=:status AND is_checked = 0 AND add_date <> '' AND proposal_id <> '' AND is_active = 1 AND datediff(now(), add_date) = 7  ",array(":status"=>4));
        //CVarDumper::dump($feedback_email_after1week_supplierApproved,10,1);
        if(!empty($feedback_email_after1week_supplierApproved)){
             foreach($feedback_email_after1week_supplierApproved as $projects)
             {
                $project = SuppliersProjectsProposals::model()->findByPk($projects->proposal_id);
				$referance	=	SuppliersHasReferences::model()->findByAttributes(array('suppliers_id'=>$project->suppliers_id,'client_id'=>$project->clientProjects->client_profiles_id));
                $data["name"] = $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name;
                $data["supplier_name"] = $project->suppliers->first_name." ".$project->suppliers->last_name;
                $data["email"] = $project->clientProjects->clientProfiles->users->username;
                $data["project"] = $project->clientProjects->name;
				$data["references_id"] = $referance->id;
                //CVarDumper::dump($data,10,1);
                $this->sendMail($data,'feedback_email_after1week_supplierApproved');

            }
        }else{
            echo " -  NO records found ";
        }


		
		
		
		

       // CVarDumper::dump($twoNfourDays,10,1);
    }

    public function actionHourlyReminder()
    {
        /*
        * Finding all the propsal assigned to supplier which are 22 hour old and has not been pitched yet
        *
        */
        echo "<br> Sending mail to 22 hour old propsal not pitched";
        $projectAllocatedAfter_22hour = SuppliersProjectsProposals::model()->findAll("status=:status AND add_date <> '' AND TIMESTAMPDIFF(HOUR,add_date,NOW()) = 22 ",array(":status"=>0));
        if(!empty($projectAllocatedAfter_22hour)){
            foreach($projectAllocatedAfter_22hour as $project)
            {
                $data["name"] = $project->suppliers->first_name." ".$project->suppliers->last_name;
                $data["email"] = $project->suppliers->users->username;
                $data["project"] = $project->clientProjects->name;
                CVarDumper::dump($data,10,1);
            //$this->sendMail($data,'remainder_email_22hourOld_notpitched');

        }
        }else{
            echo " -  NO records found ";
        }

        /*
        * Reminder email to be sent after 24 hours or
        *2 days IF clarifications not yet checked by the client.
        */

        echo "<br> Sending mail after 24 hours  IF clarifications not yet checked by the client.";
        $reminder_clarificationNotChecked = Log::model()->findAll("project_status=:status AND is_checked = 0 AND add_date <> '' AND proposal_id <> '' AND is_active = 1 AND (TIMESTAMPDIFF(minute,add_date,NOW()) >= 1440 AND TIMESTAMPDIFF(minute,add_date,NOW()) <= 1445) ",array(":status"=>1));
        CVarDumper::dump($reminder_clarificationNotChecked,10,1);
        if(!empty($reminder_clarificationNotChecked)){
             foreach($reminder_clarificationNotChecked as $projects)
             {
                $project = SuppliersProjectsProposals::model()->findByPk($projects->proposal_id);
                $data["name"] = $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name;
                $data["email"] = $project->clientProjects->clientProfiles->users->username;
                $data["project"] = $project->clientProjects->name;
                $data['id'] = $project->id;
                $data['pid'] = $project->client_projects_id;
                CVarDumper::dump($data,10,1);
                 $this->sendMail($data,'seek_clarification');

            }
        }else{
            echo " -  NO records found ";
        }


        /*
        * Reminder email to be sent after 24 hours
        * IF proposal not yet checked by the client.
        */

        echo "<br> Sending mail after 24 hours  IF proposal not yet checked by the client.";
        $reminder_proposalNotChecked = Log::model()->findAll("project_status=:status AND is_checked = 0 AND add_date <> '' AND proposal_id <> '' AND is_active = 1 AND (TIMESTAMPDIFF(minute,add_date,NOW()) >= 1440 AND TIMESTAMPDIFF(minute,add_date,NOW()) <= 1445) ",array(":status"=>2));
        CVarDumper::dump($reminder_proposalNotChecked,10,1);
        if(!empty($reminder_proposalNotChecked)){
             foreach($reminder_proposalNotChecked as $projects)
             {
                $project = SuppliersProjectsProposals::model()->findByPk($projects->proposal_id);
                $data["name"] = $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name;
                $data["email"] = $project->clientProjects->clientProfiles->users->username;
                $data["project"] = $project->clientProjects->name;
                $data['id'] = $project->id;
                $data['pid'] = $project->client_projects_id;
                CVarDumper::dump($data,10,1);
                 $this->sendMail($data,'remainder_email_22hour_2days_not_seen_proposal');

            }
        }else{
            echo " -  NO records found ";
        }


    //CVarDumper::dump($projectAllocatedAfter_22hour,10,1);

    }

    /*
    * Send chat Messages
    */
    public function actionSendChatMessage($to)
    {


        if(!empty($_GET["to"]) && isset($_GET["from"]) && isset($_GET["message"]) ){

            $to = Users::model()->findByAttributes(array("id"=>$_GET["to"]));
            $project = SuppliersProjectsProposals::model()->findByPk($_GET["from"]);


            if(!empty($to)){
                $data["email"] = $to->username;

                $data["message"] = (isset($_GET["message"])?$_GET["message"]:"");
                if($to->role_id==2){

                    $data["name"] = $project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name;
                    $data["from"]= $project->suppliers->first_name." ".$project->suppliers->last_name;


                }
                else if($to->role_id==3){

                    $data["name"]=$project->suppliers->first_name." ".$project->suppliers->last_name;
                    $data["from"]=$project->clientProjects->clientProfiles->first_name." ".$project->clientProjects->clientProfiles->last_name;

                }




                //CVarDumper::dump($data,10,1);
                if($this->sendMail($data,'reminder_chatMessages'))
                    echo 1;
            }
            else{
                echo 0;
            }
        }

    }
	
	public function actionCalculate($id,$pref)
	{
		if(isset($_POST['option']))
			$options	=	explode(',',$_POST['option']);
		else
			$options	=	array();

		$listRegion	=	array();
		$listTier	=	array();
		$cityProfile='';
		$countryProfile='';
		if($pref=='regoin'){
			if(isset($options))
			foreach($options as $sel)
				$listRegion[]	=	$sel;
			if(isset($_POST['tier']))
			foreach($_POST['tier'] as $sel2)
				$listTier[]	=	$sel2;
				
			
			$list	=	States::model()->findAllByAttributes(array('countries_id'=>$listRegion));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->countries;
			}
		}
		elseif($pref=='no-preferences'){
			$listRegion			=	Countries::model()->findAll();
			foreach($listRegion as $listReg)
				$selecetedRegion[]	=	$listReg->id;
			$list	=	States::model()->findAllByAttributes(array('countries_id'=>$selecetedRegion));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->countries;
			}
		}
		else{
		$profile 	=	cities::model()->findByPK($id);
		$country	=	$profile->states_id;
		
		if($pref=='city'|| $pref=='country' ||$pref=='no-preferences'  )
		{
			 
			$country	=	$profile->states_id;
			$region		=	$profile->states->countries_id;
			$list		=	States::model()->findAllByAttributes(array('countries_id'=>$region));
			$cityProfile=	$profile->name;
			$countryProfile=$profile->states->name;
		}	
			
			
			$da			=	States::model()->findByPk($country);
			$tier		=	PriceTier::model()->findAllByAttributes(array('price_zone'=>$da->price_zone_id));
			$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
			$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
			$filt[$da->price_zone_id]['tier']		=	$tier;
			$filt[$da->price_zone_id]['country'][]	=	$da->countries;
		}
		ksort($filt);
		$this->renderPartial('_budget', array('list'=>$filt,'sel'=>$listTier,'preference'=>$pref,'city'=>$cityProfile,'countryName'=>$countryProfile));
	}
	
	public function actionCreateService()
	{
		$service	=	Services::model()->findByAttributes(array('name'=>$_POST['name']));
		if(empty($service))
			$service	=	new Services;
		if(isset($_POST['name'])){
			$service->name		=	$_POST['name'];
			$service->description	=	'added by user';
			$service->status	=	0;
			if($service->save())
				echo $service->id;
		}
		die;
	}
	
	public function actionCreateSkill()
	{
		$skill	=	Skills::model()->findByAttributes(array('name'=>$_POST['name']));
		if(empty($skill))
			$skill	=	new Skills;
		if(isset($_POST['name'])){
			$skill->name		=	$_POST['name'];
			$skill->description	=	'added by user';
			$skill->skillscol	=	0;
			if($skill->save())
				echo $skill->id;
		}
		die;
	}

}
