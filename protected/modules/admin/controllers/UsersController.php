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
				'actions'=>array('index','view','create','update','admin','delete'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
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
			if($model->save()){
				 echo CJSON::encode(array(
                                  'status'=>'success'
                             ));
				 Yii::app()->end();
				//$this->redirect(array('view','id'=>$model->id));
			}
		}

			
			$this->render('update',array(
			'model'=>$model,
			'modelClientProfiles'=>$modelClientProfiles,
			'modelSuppliers'=>$modelSuppliers
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
		$url="";
		if($data->role_id==1){
			$url='admin/users/view&id='.$data->id;
		}
		else if($data->role_id==2){
			$result=ClientProfiles::model()->findByAttributes(array('users_id'=>$data->id));
			if(!empty($result)){
				$url='admin/clientProfiles/view&id='.$result['id'];
			}
		}
		else{
			$result=Suppliers::model()->findByAttributes(array('users_id'=>$data->id));
			if(!empty($result)){
				$url='admin/suppliers/view&id='.$result['id'];
			}
		}
		if($url!="")
			return CHtml::link($data->username,Yii::app()->createUrl($url));
		else
			return CHtml::link($data->username,'#');
	}

}
