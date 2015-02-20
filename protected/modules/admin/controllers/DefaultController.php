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
        $model=new ClientProjects('search');
        $model->unsetAttributes();

        if(isset($_GET['ClientProjects']))
            $model->attributes=$_GET['ClientProjects'];

        $this->render('index', array(
            'model'=>$model,
        ));
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