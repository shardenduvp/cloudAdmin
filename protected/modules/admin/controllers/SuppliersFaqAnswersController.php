<?php

class SuppliersFaqAnswersController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','createUpdateFaq'),
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
		$model=new SuppliersFaqAnswers;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SuppliersFaqAnswers']))
		{
			$model->attributes=$_POST['SuppliersFaqAnswers'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		if(isset($_POST['SuppliersFaqAnswers']))
		{
			$model->answer=$_POST['SuppliersFaqAnswers']['answer'];
			$model->publish=$_POST['SuppliersFaqAnswers']['publish'];
				if($model->update()){
				 echo CJSON::encode(array(
                                  'status'=>'success'
                             ));
				 Yii::app()->end();
				//$this->redirect(array('view','id'=>$model->id));
			}
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
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('SuppliersFaqAnswers');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SuppliersFaqAnswers('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SuppliersFaqAnswers']))
			$model->attributes=$_GET['SuppliersFaqAnswers'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SuppliersFaqAnswers the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SuppliersFaqAnswers::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param SuppliersFaqAnswers $model the model to be validated
	 */

	public function actionCreateUpdateFaq(){
		$suppliers=Suppliers::model()->with('users')->findAll(array('select'=>'t.id,users.first_name'));
		if(isset($_POST['id'])){
			$supplier=Suppliers::model()->findByPk($_POST['id']);
			$faqs=SuppliersFaqAnswers::model()->findAll("suppliers_id={$supplier->id}");
			$this->render('createUpdateFaq',array('model'=>$faqs,'supplier'=>$suppliers));
		}
		else{
			$this->render('createUpdateFaq',array('model'=>null,'supplier'=>$suppliers));
		}
		

	}
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='suppliers-faq-answers-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
