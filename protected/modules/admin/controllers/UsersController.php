<?php

class UsersController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete', 'initChat', 'chat'),
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

		$model=$this->loadModel($id);
		
		$modelClientProfile=$model->clientProfiles;
		$modelSupplier=$model->suppliers;	

		$this->render('view',array(
			'model'=>$model,
			'modelClientProfile'=>$modelClientProfile,
			'modelSupplier'=>$modelSupplier
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Users;
		$model_client=new ClientProfiles;
		$model_supp=new Suppliers;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if($_POST)
			{
				$model->attributes=$_POST['Users'];
				$model->password		=	base64_encode($model->password);
				$model->status 			=	1;
				// $model1->password		=	base64_encode($model1->password);
				// $model2->password		=	base64_encode($model2->password);
				if($model->save()) {
					$model_client->users_id=$model->id;
					$model_supp->users_id=$model->id;
					if(($model_client->save())&&($model_client->save()))
					$this->redirect(array('view','id'=>$model->id));
				}

			}
		

		$this->render('create',array('model'=>$model,));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$modelClientProfiles=$model->clientProfiles;
		$modelSuppliers=$model->suppliers;

		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['Users']))
		{
			$model->attributes=$_POST['Users'];
			$model->password=base64_encode($model->password);
			if(!isset($model->time_zone) || empty($model->time_zone))
				$model->time_zone = "";
			if($model->save()){
				 echo CJSON::encode(array(
                                  'status'=>'success'
                             ));
				 Yii::app()->end();
			}
		}

			
		$this->render('update',array(
			'model'=>$model,
			'modelClientProfiles'=>$modelClientProfiles,
			'modelSuppliers'=>$modelSuppliers
			)
		);
		
		
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
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Users');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Users('search');
		$model->unsetAttributes();  // clear any default values

		 if (isset($_GET['pageSize'])) {
            Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
            unset($_GET['pageSize']);
         }
         
		if(isset($_GET['Users']))
			$model->attributes=$_GET['Users'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Initiate admin chat with user
	 */
	public function actionInitChat($uid = null) {
		if($uid == null) {
			Yii::app()->user->setFlash('failureFlash', 'The user id is not provided.');
			$this->redirect(array('/admin/users/admin'));
		}

		// not allow admin to establish chat with admin
		if($uid == 1) {
			Yii::app()->user->setFlash('failureFlash', 'This is the admin user.');
			$this->redirect(array('/admin/users/admin'));
		}

		// do initiation process
		$chatUser = ChatRoomHasUsers::model()->findAllByAttributes(array('users_id'=>$uid));
		$room_id = null;
		foreach ($chatUser as $user) {
			if($user->chatRoom->room_type == 0) {
				$usersInRoom = ChatRoomHasUsers::model()->findAllByAttributes(array('chat_room_id'=>$user->chatRoom->id));
				// if the only users in room are admin and current user
				if(count($usersInRoom) == 2 && ($usersInRoom[0]->users_id == 1 || $usersInRoom[1]->users_id == 1)) {
					$room_id = $user->chatRoom->id; break;
				}
			}
		}

		// if room not found create a chat room
		if($room_id == null) {
			$transaction = Yii::app()->db->beginTransaction();
			$user = Users::model()->findByPk($uid);
			if(empty($user)) {
				Yii::app()->user->setFlash('failureFlash', 'The user with user_id : '.$uid . " does not exists.");
				$this->redirect(array('/admin/users/admin'));
			}

			// create a chat room
			$room = new ChatRoom();
			$room->room_type = 0;
			$room->room_name =  ucfirst($user->first_name) . " - Admin Chat";
			$room->add_date = date("Y-m-d H:i:s");
			$room->status = 1;

			// if chat room creation failed, rollback and show error
			if(!$room->save()) {
				$transaction->rollback();
				Yii::app()->user->setFlash('failureFlash', 'The user with user_id : '.$uid . " does not exists.");
				$this->redirect(array('/admin/users/admin'));
			}

			// if chat room created, add user to the room
			$userGroup = array(1, $uid);
			foreach ($userGroup as $u) {
				$chatHasUsers = new ChatRoomHasUsers();
				$chatHasUsers->chat_room_id = $room->id;
				$chatHasUsers->users_id = $u;
				$chatHasUsers->added_by = "Admin";
				$chatHasUsers->add_date = date("Y-m-d H:i:s");
				$chatHasUsers->status = 1;

				if(!$chatHasUsers->save()) {
					$transaction->rollback();
					Yii::app()->user->setFlash('failureFlash', "The user with user_id : ".$uid . " does not exists.");
					$this->redirect(array('/admin/users/admin'));
				}
			}
			$transaction->commit();
			$room_id = $room->id;
		}

		if($room_id != null) {
			$this->redirect(array('/admin/users/chat', 'room_id'=>base64_encode($room_id), 'uid'=>base64_encode($uid)));
		} else {
			Yii::app()->user->setFlash('failureFlash', 'Failed to find/create a group for this user.');
			$this->redirect(array('/admin/users/admin'));
		}
	}

	/**
	 * Manage chat for the user with admin
	 */
	public function actionChat($room_id = null, $uid = null) {
		if($room_id == null || $uid == null) {
			Yii::app()->user->setFlash('failureFlash', 'The chat group id/user id is not generated.');
			$this->redirect(array('/admin/users/admin'));
		}
		$room_id = base64_decode($room_id);
		$uid = base64_decode($uid);
		$room = ChatRoom::model()->findByPk($room_id);
		$user = ChatRoomHasUsers::model()->findByAttributes(array('users_id'=>$uid, 'chat_room_id'=>$room_id));
		
		$user = $user->users;
		
		// render the chat layout
		$this->render('chat', array('user'=>$user, 'room'=>$room));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Users the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Users::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	protected function assignLinks($data,$row){
		$url="/admin/users/view";
		return CHtml::link($data->username,Yii::app()->createUrl($url,array('id'=>$data->id)));
	}

}
