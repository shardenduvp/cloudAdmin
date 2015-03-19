<?php

class SuppliersController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','getSuppliers'),
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
		$this->redirect(array('/admin/users/view','id'=>$model->users_id));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Suppliers;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Suppliers']))
		{
			$model->attributes=$_POST['Suppliers'];
			if($model->save())
				$this->redirect(array('admin/users/view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
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
		$this->performAjaxValidation($model);

		if(isset($_POST['Suppliers']))
		{
			// begin transaction
        	$transaction = Yii::app()->db->beginTransaction();
        	// save supplier's data
			$model->attributes=$_POST['Suppliers'];
			// save user's data related to supplier
			$user = Users::model()->findByPk($model->users_id);
			$user->attributes=$_POST['Users'];
			// update user_offices
			if(isset($_POST["location"]))
			{
				$locations = $_POST["location"];
				foreach($_POST["location"] as $key=>$location)
				{
					if(!empty($location["cityid"])){
						if(empty($location["id"]) )
							$office = new UsersOffices;
						else
							$office = UsersOffices::model()->findByPk($location["id"]);
						$office->user_id		=	$model->users->id;
						$office->city_id		=	$location["cityid"];
						$office->dep_id			=	empty($location["dep"])?1:$location["dep"];
						// var_dump($office);
						if(!$office->save()) {
							$transaction->rollback();
							echo CJSON::encode(array('status'=>'error'));
							Yii::app()->end();
						} else {
							$location["id"]=$office->id;
							$location["e_id"] = base64_encode($office->id);
							$locations[$key] = $location;
						}
					}
				}
			}

			if($model->save() && $user->save()){
				$transaction->commit();
				if(Yii::app()->request->isAjaxRequest){
					if(isset($locations))
						echo CJSON::encode(array('locations'=>$locations, 'status'=>'success'));
					else
						echo CJSON::encode(array('status'=>'success'));
					Yii::app()->end();
				}
			} else {
				$transaction->rollback();
				echo CJSON::encode(array('status'=>'error'));
				Yii::app()->end();
			}	 
		}
		$this->redirect(array('users/update','id'=>$model->users_id));
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
		$dataProvider=new CActiveDataProvider('Suppliers');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Suppliers('adminSearch');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Suppliers']))
			$model->attributes=$_GET['Suppliers'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Suppliers the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Suppliers::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Suppliers $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='suppliers-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	protected function fetchSkills($data,$row){
		$str="";
		foreach ($data->suppliersHasSkills as $value) {
			$str=$str.'<span class="label label-primary">'.$value->skills->name."</span> ";
			

		}
		return $str;
		
	}

	public function actionGetSuppliers($id=null){
		
		$skills=ClientProjectsHasSkills::model()->findAll(
			array("select"=>"skills_id",
				"condition"=>"client_projects_id={$id}"
				)
			);
		$clientSkills=array();
		foreach($skills as $skill){
			$clientSkills[]=$skill['skills_id'];
		}

		//$suppliers=Suppliers::model()->suppliersSearch($clientSkills);

		$this->render('getSuppliers');//,array('model'=>$suppliers));
	}
}
