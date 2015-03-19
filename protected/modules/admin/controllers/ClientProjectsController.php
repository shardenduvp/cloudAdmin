<?php

class ClientProjectsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
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
			array('allow', // allow authenticated user to perform actions
				'actions'=>array('index','view','create','update','admin','delete','active','listSuppliers','searchSuppliers','addSupplier','updateProject','calculate','calculatePitches'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model=SuppliersProjects::model()->findAllByAttributes(array('client_projects_id'=>$id));
		$profile 	=	ClientProfiles::model()->FindByPk(Yii::app()->user->clientProfileId);
		// if(empty($profile->cities)){
		// 	Yii::app()->user->setFlash('error','Please Complete your profile first.');
		// 	$this->redirect(array('/client/profile'));
		// }
		$id		=	(isset($_REQUEST['id']))?$_REQUEST['id']:'';
		if(!empty($id))
		    $client_projects 	=	ClientProjects::model()->findByPk($id);
		$industries			=	Industries::model()->findAll();
		$services			=	Services::model()->findAll("status in(0,1)");
		$currentStatus			=	CurrentStatus::model()->findAll("status=1  order by id");
		$selecetedServices		=	array();
		$selecetedIndustries	=	array();
		$selecetedSkills		=	array();
		if(isset($client_projects->clientProjectsHasServices))
			foreach($client_projects->clientProjectsHasServices as $ser)
				$selecetedServices[]	=	$ser->services_id;
		if(isset($client_projects->clientProjectsHasSkills))
			foreach($client_projects->clientProjectsHasSkills as $skill)
			$selecetedSkills[]	=	$skill->skills_id;
		if(isset($client_projects->clientProjectsHasIndustries))
			foreach($client_projects->clientProjectsHasIndustries as $ind)
			$selecetedIndustries[]	=	$ind->industries_id;
		$selecetedStatus		=	explode(',',$client_projects->current_status);
		$selecetedTier			=	explode(',',$client_projects->tier);
		$selecetedRegions		=	explode(',',$client_projects->regions);

		if(isset($region))
		 {
			$list		=	Countries::model()->findAllByAttributes(array('regions_id'=>$region));
		 }
		if($client_projects->preferences=='regoin')
		{
			$list	=	Countries::model()->findAllByAttributes(array('regions_id'=>$selecetedRegions));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone_id'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->regions;
			}
		}
		elseif(isset($country) && ($client_projects->preferences=='city' || $client_projects->preferences=='country')){
			$da		=	Countries::model()->findByPk($country);
			$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone_id'=>$da->price_zone_id));
			$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
			$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
			$filt[$da->price_zone_id]['tier']		=	$tier;
			$filt[$da->price_zone_id]['country'][]	=	$da->regions;
		}
		else{
			$listRegion			=	Regions::model()->findAll();
			foreach($listRegion as $listReg)
				$selecetedRegion[]	=	$listReg->id;
			$list	=	Countries::model()->findAllByAttributes(array('regions_id'=>$selecetedRegion));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone_id'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->regions;
			}
		}
		ksort($filt);
		if(!empty($selecetedSkills))
			$skills	=	Skills::model()->findAll('skillcol = 0 or id in ('.implode(',',$selecetedSkills).')');
		else
			$skills	=	Skills::model()->findAll('skillcol = 0');

		$preference	=	(isset($client_projects->preferences))?$client_projects->preferences:'no-preferences';
		if(!isset($clientCity)) $clientCity = null;
		if(!isset($countryName)) $countryName = null;
		$this->render('view',array('model'=>$model,'project'=>$client_projects,'industries'=>$industries,'currentStatus'=>$currentStatus,'services'=>$services,'selecetedServices'=>$selecetedServices,'selecetedStatus'=>$selecetedStatus,'selecetedIndustries'=>$selecetedIndustries,'selecetedTier'=>$selecetedTier,'selecetedRegions'=>$selecetedRegions,'list'=>$filt,'skills'=>$skills,'selecetedSkills'=>$selecetedSkills,'preference'=>$preference,'city'=>$clientCity,'countryName'=>$countryName));
	}
	
	public function actionCreateSkill()
	{
		$skill	=	Skills::model()->findByAttributes(array('name'=>$_POST['name']));
		if(empty($skill))
			$skill	=	new Skills;
		if(isset($_POST['name'])){
			$skill->name		=	$_POST['name'];
			$skill->description	=	'added by user';
			$skill->skillcol	=	1;
			if($skill->save())
				echo $skill->id;
		}
		die;
	}
	

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$profile=null;
		if(isset($_POST['profileId'])){
			$profile 	=	ClientProfiles::model()->FindByPk($_POST['profileId']);
		}
		$clientName=ClientProfiles::model()->with('users')->findAll(array('select'=>'t.id,users.first_name'));
		// if(empty($profile->cities)){
		// 	Yii::app()->user->setFlash('error','Please Complete your profile first.');
		// 	$this->redirect(array('/client/profile'));
		// }
	//	$id		=	(isset($_REQUEST['id']))?$_REQUEST['id']:'';
	//	if(!empty($id))
	//		$client_projects 	=	ClientProjects::model()->findByPk($id);
		$client_projects =null;
		if(empty($client_projects)){
			$client_projects							=	new ClientProjects;
			$client_projects->preferences				=	'no-preferences';
			$client_projects->current_status_id			=	1;
			$client_projects->project_start_preference	=	1;
			$client_projects->add_date					=	date('Y-m-d H:i:s');
		}
		
		if(isset($_POST['ClientProjects']))
		{
			$response		=	array();
			$listStatus		=	array();
			$listRegion		=	array();
			$listTier		=	array();
			if(isset($_POST['options']))
				foreach($_POST['options'] as $sel)
					$listRegion[]	=	$sel;

			if(isset($_POST['tier']))
				foreach($_POST['tier'] as $sel2)
					$listTier[]	=	$sel2;
			
			$client_projects->attributes			=	$_POST['ClientProjects'];
			$client_projects->client_profiles_id	=	$_POST['client_id'];
			$client_projects->other_current_status	=	(isset($_POST['ClientProjects']['other_current_status']))?$_POST['ClientProjects']['other_current_status']:'';
			$client_projects->regions				=	implode(',',$listRegion);
			$client_projects->tier					=	implode(',',$listTier);
			$client_projects->preferences			=	(isset($_POST['ClientProjects']['preferences']))?$_POST['ClientProjects']['preferences']:'regoin';
			if(isset($_POST['ClientProjects']['preferences']) && $_POST['ClientProjects']['preferences']!='regoin')
				$client_projects->regions			=	'';
			$client_projects->status				=	1;
			$client_projects->modify_date			=	date('Y-m-d H:i:s');
			if($client_projects->save())
			{
				
				$response['code'] = '1';
				$response['message'] = 'Project details saved successfully.';
				/*Code for Documents if ID not set*/
				if(isset($_POST['docs']) && !empty($_POST['docs']))
				{
					$docs = explode(',',$_POST['docs']);
					for($i=0;$i<count($docs);$i++)
					{
						if($docs[$i]==""){continue;}
						$doc = explode('|',$docs[$i]);
						$docs1						=	new ClientProjectDocuments;
						$docs1->client_projects_id			=	$client_projects->id;
						$docs1->path					=	$doc[3];
						$docs1->type					=	$doc[0];
						$docs1->name					=	$doc[1];
						$docs1->size					=	$doc[2];
						$docs1->status					=	1;
						$docs1->add_date				=	date('Y-m-d H:i:s');
						if(!$docs1->save())
							$response['error'][] = 'Documents not uploaded successfully.Please upload again by ediot this project.';
					}
				}
				/* project industry start here*/
				ClientProjectsHasIndustries::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Industries']))
				foreach($_POST['Industries'] as $indus){
					$condition						=	array('industries_id'=>$indus,'client_projects_id'=>$client_projects->id);
					$indusList						=	ClientProjectsHasIndustries::model()->findByAttributes($condition);
					if(empty($indusList))
						$indusList					=	new ClientProjectsHasIndustries;
					$indusList->industries_id		=	$indus;
					$indusList->client_projects_id	=	$client_projects->id;
					$indusList->add_date			=	date('Y-m-d H:i:s');
					$indusList->status				=	1;
					if(!$indusList->save())
						$response['error'][] = 'Industries not saved successfully.';
					
				}
				/* project industry end here*/
				/*project documents start here */
				if(isset($_POST['attachment']))
				{
					$attachData	=	$_POST['attachment'];
					foreach($attachData as $data1)
					{
							$data	=	json_decode($data1);
							$docs						=	new ClientProjectDocuments;
							$docs->client_projects_id	=	$client_projects->id;
							$docs->path					=	$data->url;
							$docs->type					=	$data->mimetype;
							$docs->name					=	$data->filename;
							$docs->size					=	$data->size;
							$docs->status				=	1;
							$docs->add_date				=	date('Y-m-d');
							$docs->save();
						
					}
				}
					/* project services start here*/
				ClientProjectsHasServices::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Services']))
				foreach($_POST['Services'] as $indus){
					$condition							=	array('services_id'=>$indus,'client_projects_id'=>$client_projects->id);
					$serviceList						=	ClientProjectsHasServices::model()->findByAttributes($condition);
					if(empty($serviceList))
						$serviceList					=	new ClientProjectsHasServices;
					$serviceList->services_id			=	$indus;
					$serviceList->client_projects_id	=	$client_projects->id;
					$serviceList->add_date				=	date('Y-m-d H:i:s');
					$serviceList->status				=	1;
					$serviceList->save();
				}
				
				/* project skills or steps start here*/
				ClientProjectsHasSkills::model()->deleteAll('client_projects_id = ?' , array($client_projects->id));
				if(isset($_POST['Skills']))
				foreach($_POST['Skills'] as $key){
					if($key!=''){
						if(!is_numeric($key)){
							$sk		=	Skills::model()->findByAttributes(array('name'=>$key));
							$key	=	$sk->id;
						}
						$condition					=	array('client_projects_id'=>$client_projects->id,'skills_id'=>$key);
						$skill						=	ClientProjectsHasSkills::model()->findByAttributes($condition);
						if(empty($skill))
							$skill					=	new ClientProjectsHasSkills;
						$skill->skills_id			=	$key;
						$skill->client_projects_id	=	$client_projects->id;
						$skill->add_date			=	date('Y-m-d');
						$skill->status				=	1;
						$skill->save();
					}
				}
				/* project skills or steps end here*/
			
				$clientProjectCount	=	ClientProfiles::model()->findByPK(Yii::app()->user->clientProfileId);
				if(isset($_POST['city_pref']))
				{
					$clientProjectCount->cities_id	=	$_POST['city_pref'];
					$clientProjectCount->save();
				}
				$client_data['client_project_detail'] = $client_projects;
			   // $this->sendMail($client_data,'project_detail_to_admin');    
				Yii::app()->user->setFlash('saved','Project details saved successfully.');
				/*if(count($clientProjectCount->clientProjects)==1)
					$this->redirect(Yii::app()->createUrl('client/index',array('first'=>2)));
				else
					$this->redirect(Yii::app()->createUrl('client/index'));*/
            }
			else{
				$response['code']		=	'2';
				$response['message']	=	'Project details not saved successfully.';
				$response['error']		=	$client_projects->errors;
			}
			$response['error']		=	array('required fiels missing','test descridpfd ');
			echo json_encode($response);
			die;
		}
		$industries			=	Industries::model()->findAll();
		$services			=	Services::model()->findAll("status in(0,1)");
		$currentStatus			=	CurrentStatus::model()->findAll("status=1  order by id");
		$selecetedServices		=	array();
		$selecetedIndustries		=	array();
		$selecetedSkills		=	array();
		if(isset($client_projects->clientProjectsHasServices))
			foreach($client_projects->clientProjectsHasServices as $ser)
				$selecetedServices[]	=	$ser->services_id;
		if(isset($client_projects->clientProjectsHasSkills))
			foreach($client_projects->clientProjectsHasSkills as $skill)
			$selecetedSkills[]	=	$skill->skills_id;
		if(isset($client_projects->clientProjectsHasIndustries))
			foreach($client_projects->clientProjectsHasIndustries as $ind)
			$selecetedIndustries[]	=	$ind->industries_id;
		$selecetedStatus		=	explode(',',$client_projects->current_status);
		$selecetedTier			=	explode(',',$client_projects->tier);
		$selecetedRegions		=	explode(',',$client_projects->regions);
		if($profile!=null){
			foreach($profile->cities as $cities){
				$clientCity	=	$cities->cities_id;
				$country	=	$cities->cities->countries_id;
				
				$clientCity	=	$cities->cities->name;
				$countryName	=	$cities->cities->countries->name;
				
				$region		=	$cities->cities->countries->regions_id;
			}
		}
		if(isset($region)) {
			$list		=	Countries::model()->findAllByAttributes(array('regions_id'=>$region));
		}
		if($client_projects->preferences=='regoin'){
			$list	=	Countries::model()->findAllByAttributes(array('regions_id'=>$selecetedRegions));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone_id'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->regions;
			}
		}
		elseif(isset($country) && ($client_projects->preferences=='city' || $client_projects->preferences=='country')){
			$da		=	Countries::model()->findByPk($country);
			$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone_id'=>$da->price_zone_id));
			$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
			$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
			$filt[$da->price_zone_id]['tier']		=	$tier;
			$filt[$da->price_zone_id]['country'][]	=	$da->regions;
		}
		else{
			$listRegion			=	Regions::model()->findAll();
			foreach($listRegion as $listReg)
				$selecetedRegion[]	=	$listReg->id;
			$list	=	Countries::model()->findAllByAttributes(array('regions_id'=>$selecetedRegion));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone_id'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->regions;
			}
		}
		ksort($filt);
		if(!empty($selecetedSkills))
			$skills	=	Skills::model()->findAll('skillcol = 0 or id in ('.implode(',',$selecetedSkills).')');
		else
			$skills	=	Skills::model()->findAll('skillcol = 0');

		$preference	=	(isset($client_projects->preferences))?$client_projects->preferences:'no-preferences';
		if(!isset($clientCity)) $clientCity = null;
		if(!isset($countryName)) $countryName = null;
		$this->render('create',array('clientName'=>$clientName,'project'=>$client_projects,'industries'=>$industries,'currentStatus'=>$currentStatus,'services'=>$services,'selecetedServices'=>$selecetedServices,'selecetedStatus'=>$selecetedStatus,'selecetedIndustries'=>$selecetedIndustries,'selecetedTier'=>$selecetedTier,'selecetedRegions'=>$selecetedRegions,'list'=>$filt,'skills'=>$skills,'selecetedSkills'=>$selecetedSkills,'preference'=>$preference,'city'=>$clientCity,'countryName'=>$countryName));
	}
	
		

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ClientProjects']))
		{
			$model->attributes=$_POST['ClientProjects'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionListSuppliers($id)
	{
			$model=SuppliersProjects::model()->findAllByAttributes(array('client_projects_id'=>$id));
			$modelSupp=Suppliers::model()->findAllByAttributes(array('id'=>$id));
			$model_client=ClientProjects::model()->findByAttributes(array('id'=>$id));
			$this->render('listSuppliers',array(
			'model'=>$model,
			'model_client'=>$model_client,
		));
	}

	/**
	 * Search more suppliers for client projects
	 */
	public function actionSearchSuppliers($pid = null) {
		if(is_null($pid)) $this->redirect(array('/admin/'));

		// find client project by the id provided
		$clientProject = ClientProjects::model()->findByPk($pid);
		if(!isset($clientProject) || empty($clientProject)) {
			Yii::app()->user->setFlash('failureFlash', 'Couldn\'t find any client project.');
			$this->redirect(array('/admin/'));
		}

		$suppliersList = ClientProjects::model()->searchSuppliers($pid);

		$this->render('searchSuppliers', array(
		    'client'=>$clientProject,
		    'suppliers'=>$suppliersList,
		));
	}

	/**
	 * Add suppliers to project
	 */
	public function actionAddSupplier()
	{
		if(!Yii::app()->request->isAjaxRequest) $this->redirect(Yii::app()->user->returnUrl);
		
		// get post data
		$pid = Yii::app()->request->getPost('pid');
		$sid = Yii::app()->request->getPost('sid');
		if(!isset($pid) || !isset($sid) || empty($pid) || empty($sid) || !is_numeric($pid) || !is_numeric($sid)) {
			echo "Supplier and Project id not provided."; die;
		}

		// if id's are incorrect
		$forSupplier = Suppliers::model()->findByPk($sid);
		$forProject = ClientProjects::model()->findByPk($pid);
		if(!isset($forSupplier) || empty($forSupplier)) {
			echo "Supplier id provided was not found"; die;
		}
		if(!isset($forProject) || empty($forProject)) {
			echo "Project id provided was not found"; die;
		}

		// begin transaction
        $transaction = Yii::app()->db->beginTransaction();


		// create a chat room for this project introduction
		$chatRoom = new ChatRoom();
		$chatRoom->users_id = $sid;
		$chatRoom->room_type = "admin";
		$chatRoom->room_name = $forSupplier->users->company_name . "'s Introduction to " . $forProject->clientProfiles->users->company_name;
		$chatRoom->add_date = date("Y-m-d H:i:s");
		$chatRoom->status = 2;
		if(!$chatRoom->save()) {
			$transaction->rollback();
			echo "Error in creating chat room."; die;
		}

		// TODO: add users to chat room
		$chatRoomUsers = array($forSupplier->users->id, $forProject->clientProfiles->users->id, 1);
		foreach ($chatRoomUsers as $user) {
			$chatHasUsers = new ChatRoomHasUsers();
			$chatHasUsers->chat_room_id = $chatRoom->id;
			$chatHasUsers->users_id = $user;
			if(!$chatHasUsers->save()) {
				$transaction->rollback();
				echo "Error in adding users in chat room."; die;
			}
		}

		// Create suppliers project
		$supplierProject = new SuppliersProjects();
		$supplierProject->client_projects_id = $pid;
		$supplierProject->suppliers_id = $sid;
		$supplierProject->status = 2;
		$supplierProject->chat_room_id = $chatRoom->id;
		if(!$supplierProject->save()) {
			$transaction->rollback();
			echo "Error in creating suppliers project."; die;
		}
		$transaction->commit();
		echo "Successfully Added"; die;
	}

	/**
	 * Index page for this controller
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ClientProjects');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ClientProjects('projectSearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ClientProjects']))
			$model->attributes=$_GET['ClientProjects'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionActive()
	{
		$model=new ClientProjects('activeProjectSearch');
		$model->unsetAttributes();

		if(isset($_GET['ClientProjects']))
			$model->attributes=$_GET['ClientProjects'];

		$this->render('active', array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ClientProjects the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ClientProjects::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ClientProjects $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='client-projects-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * Custom methods for cell value in CGridView 
	 * @param $data and $row for which the method is called 
	 */
	public function getRegion($data, $row)
	{
		if(empty($data->regions)) return "Not Provided";
		$reg['id'] = explode(',', $data->regions);
		$regions = Regions::model()->findAllByAttributes($reg);
		$value = "";
		foreach ($regions as $region) {
			$value .= $region->name . ", ";
		}
		return rtrim(trim($value), ",");
	}

	public function getTier($data, $row)
	{
		if(empty($data->tier)) return "Not Provided";
		$tr['id'] = explode(',', $data->tier);
		$tiers = PriceTier::model()->findAllByAttributes($tr);
		$value = "";
		foreach ($tiers as $tier) {
			$value .='<span class="label label-primary">'. ucwords(trim('$'.$tier->min_price.'-$'.$tier->max_price)) . " /hour</span><br/>";
		}
		return $value;
	}

	public function actionUpdateProject($id=null)
	{
		if($id != null){
			$client_projects 	=	ClientProjects::model()->findByPk($id);
			$model=SuppliersProjects::model()->findByAttributes(array('client_projects_id'=>$id));
			if($model!=null){
				$pitchesAll=ProposalPitches::model()->findAllByAttributes(array('suppliers_projects_id'=>$model->id));
				$pitches=ProposalPitches::model()->findByAttributes(array('status'=>'3','suppliers_projects_id'=>$model->id));
			}
			else{
				$pitches=null;
				$pitchesAll=null;
			}
		}
		
		if(isset($_POST['list']))
		{
			$array	=	explode(',',$_POST['list']);
			var_dump($array);
			die;
		}

		if(isset($_POST['ClientProjects']))
		{	
			$response		=	array();
			$client_projects->attributes=$_POST['ClientProjects'];

			//handle skills
			if(isset($_POST['Skills'])){
				//get skills
				$skills=$client_projects->clientProjectsHasSkills;
				//store retrieved skills in array
				$storedSkills=array();
				foreach ($skills as $skill) {
					$storedSkills[]=$skill['skills_id'];
				}
				//remove the skills 
				foreach ($skills as $skill) {
					if(!in_array($skill['skills_id'],$_POST['Skills'])){
						$skill->delete();
					}
				}
				//add the new skills 
				foreach ($_POST['Skills'] as $skill) {
					if(!is_numeric($skill)){
							$sk		=	Skills::model()->findByAttributes(array('name'=>$skill));
							$skill	=	$sk->id;
					}
					if(!in_array($skill,$storedSkills)){
						$newSkill=new ClientProjectsHasSkills;
						$newSkill->skills_id=$skill;
						$newSkill->client_projects_id=$id;
						$newSkill->status=1;
						$newSkill->add_date=date("Y-m-d H:i:s",time());
						$newSkill->save();
					}
				}
			}

			//handle Industries
			if(isset($_POST['Industries'])){
				//get Industries
				$industries=$client_projects->clientProjectsHasIndustries;
				//store retrieved Industries in array
				$storedIndustries=array();
				foreach ($industries as $industry) {
					$storedIndustries[]=$industry['industries_id'];
				}
				//remove the Industries 
				foreach ($industries as $industry) {
					if(!in_array($industry['industries_id'],$_POST['Industries'])){
						$industry->delete();
					}
				}
				//add the new Industries 
				foreach ($_POST['Industries'] as $industry) {
					if(!in_array($industry,$storedIndustries)){
						$newIndustry=new clientProjectsHasIndustries;
						$newIndustry->industries_id=$industry;
						$newIndustry->client_projects_id=$id;
						$newIndustry->status=1;
						$newIndustry->add_date=date("Y-m-d H:i:s",time());
						$newIndustry->save();
					}
				}
			}

			//handle services
			if(isset($_POST['Services'])){
				//get Services
				$services=$client_projects->clientProjectsHasServices;
				//store retrieved Services in array
				$storedServices=array();
				foreach ($services as $service) {
					$storedServices[]=$service['services_id'];
				}
				//remove the Services 
				foreach ($services as $service) {
					if(!in_array($service['services_id'],$_POST['Services'])){
						$service->delete();
					}
				}
				//add the new Services 
				foreach ($_POST['Services'] as $service) {
					if(!in_array($service,$storedServices)){
						$newService=new clientProjectsHasServices;
						$newService->services_id=$service;
						$newService->client_projects_id=$id;
						$newService->status=1;
						$newService->add_date=date("Y-m-d H:i:s",time());
						$newService->save();
					}
				}
			}
			//handle tiers
			if(isset($_POST['tier'])){
				$client_projects->tier=implode(',',$_POST['tier']);
				
			}
			//handle regions
			if(isset($_POST['options'])){
				$client_projects->regions=implode(',', $_POST['options']);
			}

			if($client_projects->preferences=='no-preferences'){
				$client_projects->regions='';
			}
			//save the model
			if($client_projects->save()){
				$response['code']		=	1;
				$response['message']	=	"<strong> Success ! </strong>Project Data Updated Successfully .";
				echo json_encode($response);
				die;

				// echo CJSON::encode(array(
     //                              'status'=>'success'
     //                         ));
				 Yii::app()->end();
			}
		}
		$industries			=	Industries::model()->findAll();
		$services			=	Services::model()->findAll("status in(0,1)");
		$currentStatus		=	CurrentStatus::model()->findAll("status=1  order by id");
		$selecetedServices	=	array();
		$selecetedIndustries=	array();
		$selecetedSkills	=	array();
		if(isset($client_projects->clientProjectsHasServices))
			foreach($client_projects->clientProjectsHasServices as $ser)
				$selecetedServices[]	=	$ser->services_id;
		if(isset($client_projects->clientProjectsHasSkills))
			foreach($client_projects->clientProjectsHasSkills as $skill)
			$selecetedSkills[]	=	$skill->skills_id;
		if(isset($client_projects->clientProjectsHasIndustries))
			foreach($client_projects->clientProjectsHasIndustries as $ind)
			$selecetedIndustries[]	=	$ind->industries_id;
		$selecetedStatus		=	explode(',',$client_projects->current_status);
		$selecetedTier			=	explode(',',$client_projects->tier);
		$selecetedRegions		=	explode(',',$client_projects->regions);
		//fetch the country of client
		$profile 	=	$client_projects->clientProfiles;
		foreach($profile->cities as $cities){
			$country	=	$cities->cities->countries_id;
			$clientCity	=	$cities->cities->name;	
		}

		
		$countryName	=	'';
		$region			=	'';
		$list		=	Countries::model()->findAll();
		if($client_projects->preferences=='regoin'){
			$list	=	Countries::model()->findAllByAttributes(array('regions_id'=>$selecetedRegions));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone_id'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->regions;
			}
		}
		elseif($client_projects->preferences=='city' || $client_projects->preferences=='country' ){
			$da		=	Countries::model()->findByPk($country);
			$countryName=$da->name;
			$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone_id'=>$da->price_zone_id));
			$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
			$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
			$filt[$da->price_zone_id]['tier']		=	$tier;
			$filt[$da->price_zone_id]['country'][]	=	$da->regions;
		}
		else{
			$listRegion			=	Regions::model()->findAll();
			foreach($listRegion as $listReg)
				$selecetedRegion[]	=	$listReg->id;
			$list	=	Countries::model()->findAllByAttributes(array('regions_id'=>$selecetedRegion));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone_id'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->regions;
			}
		}
		ksort($filt);
		if(!empty($selecetedSkills))
			$skills	=	Skills::model()->findAll('skillcol = 0 or id in ('.implode(',',$selecetedSkills).')');
		else
			$skills	=	Skills::model()->findAll('skillcol = 0');

		$preference	=	(isset($client_projects->preferences))?$client_projects->preferences:'no-preferences';
		
		
		$users = new Users;
		$clientCity = (isset($clientCity))?$clientCity:null;	
		$this->render('project',array('model'=>$model,'project'=>$client_projects,'industries'=>$industries,'currentStatus'=>$currentStatus,'services'=>$services,'selecetedServices'=>$selecetedServices,'selecetedStatus'=>$selecetedStatus,'selecetedIndustries'=>$selecetedIndustries,'selecetedTier'=>$selecetedTier,'selecetedRegions'=>$selecetedRegions,'list'=>$filt,'skills'=>$skills,'selecetedSkills'=>$selecetedSkills,'preference'=>$preference,'city'=>$clientCity,'countryName'=>$countryName,'users'=>$users,'pitches'=>$pitches,'pitchesAll'=>$pitchesAll));
	
	}

	public function actionCalculate($id=null)
	{
		//$tiers			=	(!empty($_REQUEST['tier']))?$_REQUEST['tier']:array();
		$preferences	=	$_REQUEST['ClientProjects']['preferences'];
		$current_status	=	$_REQUEST['ClientProjects']['current_status_id'];
		$listTier	=	array();
		$listRegion	=	array();
		if(isset($_REQUEST['options']))
			foreach($_REQUEST['options'] as $sel)
				$listRegion[]	=	$sel;
		if(isset($_REQUEST['tier']))
			foreach($_REQUEST['tier'] as $sel2)
				$listTier[]	=	$sel2;
		
		$profile 	=	ClientProfiles::model()->FindByPk($id);
		foreach($profile->cities as $cities){
			$cityName	=	$cities->cities->name;	
			$countryName	=	$cities->cities->countries->name;	
			$clientCity	=	$cities->cities_id;	
			$country	=	$cities->cities->countries_id;
			$region		=	$cities->cities->countries->regions_id;
		}
		$list		=	Countries::model()->findAllByAttributes(array('regions_id'=>$region));
		if($preferences=='regoin'){
			$list	=	Countries::model()->findAllByAttributes(array('regions_id'=>$listRegion));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone_id'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->regions;
			}
		}
		elseif($preferences=='no-preferences'){
			$listRegion			=	Regions::model()->findAll();
			foreach($listRegion as $listReg)
				$selecetedRegion[]	=	$listReg->id;
			$list	=	Countries::model()->findAllByAttributes(array('regions_id'=>$selecetedRegion));
			$filt	=	array();
			foreach($list as $da){
				$tier	=	PriceTier::model()->findAllByAttributes(array('price_zone_id'=>$da->price_zone_id));
				$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
				$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
				$filt[$da->price_zone_id]['tier']		=	$tier;
				$filt[$da->price_zone_id]['country'][]	=	$da->regions;
			}
		}
		else{
			$da			=	Countries::model()->findByPk($country);
			$tier		=	PriceTier::model()->findAllByAttributes(array('price_zone_id'=>$da->price_zone_id));
			$filt[$da->price_zone_id]['id']			=	$da->price_zone_id;
			$filt[$da->price_zone_id]['title']		=	$da->priceZone->title;
			$filt[$da->price_zone_id]['tier']		=	$tier;
			$filt[$da->price_zone_id]['country'][]	=	$da->regions;
		}
		ksort($filt);
		$this->renderPartial('_budget', array('list'=>$filt,'sel'=>$listTier,'preference'=>$preferences,'city'=>$cityName,'countryName'=>$countryName,'current_status'=>$current_status));
	}


	public function actionCalculatePitches($id=null)
	{
		$pitches=ProposalPitches::model()->findByPk($_POST['id']);
		if(!empty($pitches)){
			$this->renderPartial('_pitches',array(
			'pitches'=>$pitches
			));
		}
		else{
			$this->renderPartial('_pitches',array(
			'pitches'=>null
			));
		}
		
	}
}
