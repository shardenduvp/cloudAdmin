<?php

class DefaultController extends Controller
{

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout='//layouts/column2';

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

    /**
     * Custom methods for cell value in CGridView 
     * @param $data and $row for which the method is called 
     */
    public function getSuppliers($data, $row)
    {
        $suppliers_projects = $data->suppliersProjects;
        if(empty($suppliers_projects)) return "None";

        $value = "";
        $suppliers = array();
        foreach ($suppliers_projects as $suppliers_project) {
            array_push($suppliers, $suppliers_project->suppliers);
        }
        foreach($suppliers as $supplier) {
            $value .= CHtml::link(ucwords($supplier->name), array("/admin/users/view&id=" . $supplier->users_id), array(
                                  'class'=>'label label-primary',
                            )) . "  ";
        }
        return rtrim($value, ", ");
    }
}