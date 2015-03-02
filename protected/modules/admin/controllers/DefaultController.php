<?php

class DefaultController extends Controller
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
                'actions'=>array('index','view','create','update','admin','delete', 'getApproveView', 'approveProject'),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

  	public function actionIndex()
  	{
        $model=new ClientProjects('leadSearch');
        $model->unsetAttributes();

        if(isset($_GET['ClientProjects']))
            $model->attributes=$_GET['ClientProjects'];

        $this->render('index', array(
            'model'=>$model,
        ));
  	}

    public function actionGetApproveView($id) {
        if(Yii::app()->request->isAjaxRequest && is_numeric($id)) {
            $project = ClientProjects::model()->findByAttributes(array('id'=>$id));
            $this->renderPartial('_approve', array('project'=>$project));
        }
        else $this->redirect(array('/admin/'));
    }


    public function actionApproveProject($id=null) {
        if(!is_null($id) && isset($_POST['Suppliers'])){

            $supplier_model = SuppliersProjects::model();
            // begin transaction
            $transaction=$supplier_model->dbConnection->beginTransaction();

            // get post data
            $suppliers = $_POST['Suppliers'];

            foreach($suppliers as $selected) {
                foreach ($selected as $key => $value) {
                    // $key has supplier_id and $value has checked
                    $supplier_project = $supplier_model->findByAttributes(array('suppliers_id'=>$key,'client_projects_id' => $id));
                    $supplier_project->status=2;
                    if(!$supplier_project->update()) {
                        $transaction->rollback();
                        Yii::app()->user->setFlash('failureFlash', 'Project Approval Failed.');
                        $this->redirect(array('/admin/'));
                    }
                }
            }
            $project = ClientProjects::model()->findByPk($id);
            $project->status = 2;
            if($project->update()) {
                $transaction->commit();
                Yii::app()->user->setFlash('successFlash', 'Project Approved Successfully.');
                $this->redirect(array('/admin/'));
            } else {
                $transaction->rollback();
                Yii::app()->user->setFlash('failureFlash', 'Project Approval Failed.');
                $this->redirect(array('/admin/'));
            }
        }
        $this->redirect(array('/admin/'));
    }
}