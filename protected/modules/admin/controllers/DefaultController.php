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
                'actions'=>array('index','view','create','update','admin','delete', 'getApproveView', 'approveProject', 'intermediary', 'messages'),
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

    public function actionIntermediary()
    {
        $model=new ClientProjects('intermediarySearch');
        $model->unsetAttributes();

        if(isset($_GET['ClientProjects']))
            $model->attributes=$_GET['ClientProjects'];

        $this->render('intermediary', array(
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
        $suppliers = Yii::app()->request->getPost('Suppliers');
        if(is_null($id)) {
            Yii::app()->user->setFlash('failureFlash', 'Invalid Url Requested.');
            $this->redirect(array('/admin/default/intermediary'));
        }

        // begin transaction
        $transaction = Yii::app()->db->beginTransaction();

        // get supplierProject for this client project
        $supProjects = SuppliersProjects::model()->findAllByAttributes(array('client_projects_id' => $id));
        
        // if all the suppliers are disselected - remove status from all
        if(!isset($suppliers) || empty($suppliers)) {
            foreach ($supProjects as $project) {
                $project->status = 0;
                if(!$project->update()) {
                    $transaction->rollback();
                    Yii::app()->user->setFlash('failureFlash', 'Project Approval Failed.');
                    $this->redirect(array('/admin/default/intermediary'));
                }
            }

            // set clients status to waiting approval
            $project = ClientProjects::model()->findByPk($id);
            $project->status = 1;
            if($project->update()) {
                $transaction->commit();
                Yii::app()->user->setFlash('successFlash', 'Suppliers Removed Successfully.');
                $this->redirect(array('/admin/default/intermediary'));
            } else {
                $transaction->rollback();
                Yii::app()->user->setFlash('failureFlash', 'Suppliers Selection Failed.');
                $this->redirect(array('/admin/default/intermediary'));
            }

        }

        // if some suppliers are selected
        if(isset($suppliers) && !empty($suppliers)){
            $selected = array();
            foreach($suppliers as $supplier) {
                foreach ($supplier as $key => $value) {
                    $selected[] = $key;
                }
            }

            // update project status to 1
            foreach ($supProjects as $project) {
                if(in_array($project->suppliers_id, $selected)) $project->status = 1;
                else $project->status = 0;
                if(!$project->update()) {
                    $transaction->rollback();
                    Yii::app()->user->setFlash('failureFlash', 'Project Approval Failed.');
                    $this->redirect(array('/admin/default/intermediary'));
                }
            }

            $project = ClientProjects::model()->findByPk($id);
            $project->status = 2;
            if($project->update()) {
                $transaction->commit();
                Yii::app()->user->setFlash('successFlash', 'Project Approved Successfully.');
                $this->redirect(array('/admin/default/intermediary'));
            } else {
                $transaction->rollback();
                Yii::app()->user->setFlash('failureFlash', 'Project Approval Failed.');
                $this->redirect(array('/admin/default/intermediary'));
            }
        }
        $this->redirect(array('/admin/default/intermediary'));
    }
}