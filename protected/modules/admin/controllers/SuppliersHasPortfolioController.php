<?php

class SuppliersHasPortfolioController extends Controller
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
				'actions'=>array('index','view','create','update','admin','delete','suppliersPortfolio','references'),
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
        $is_new = true;
		$indusList  = "";
        $isUpdated  = false;
        $model= new SuppliersHasPortfolio;
        $industries = Industries::model()->findAll();
        $skills     = Skills::model()->findAll();

        $services   = Services::model()->findAll();


        if(isset($_POST['SuppliersHasPortfolio']))
        {            
            $model->attributes = $_POST['SuppliersHasPortfolio'];
            $model->suppliers_id = Yii::app()->user->supplierProfileId;
            $model->status = 1;
            if(isset($_POST['SuppliersHasPortfolio']['start_date']))
            {
                if($_POST['SuppliersHasPortfolio']['start_date']!="")
                {
                    $model->start_date   = date("Y-m-d",strtotime($_POST['SuppliersHasPortfolio']['start_date']));    
                }else{
                    $model->start_date   = NULL;
                }                   
                $model->discreet_desc = $_POST['SuppliersHasPortfolio']['discreet_desc'];                
            }

            if($model->save())
            {
                $portfolioId = $model->id;
                $portId      = $portfolioId;
                if(isset($_POST['Industries']))
                {
                    if($isUpdated)
                    {
                        SuppliersPortfolioHasIndustries::model()->deleteAll('suppliers_has_portfolio_id = ?' , array($portfolioId));
                    }
                    foreach($_POST['Industries'] as $indus){
                        $condition                      =   array('industries_id'=>$indus,'suppliers_has_portfolio_id'=>$portfolioId);
                        $indusList                      =   SuppliersPortfolioHasIndustries::model()->findByAttributes($condition);
                        if(empty($indusList))
                            $indusList                  =   new SuppliersPortfolioHasIndustries;
                        $indusList->industries_id       =   $indus;
                        $indusList->suppliers_has_portfolio_id  =   $portfolioId;
                        $indusList->add_date            =   date('Y-m-d H:i:s');
                        $indusList->status              =   1;
                        $indusList->save();
                    }
                }




                if(isset($_POST['Skills']))
                {
                    if($isUpdated)
                    {
                        SuppliersHasPortfolioHasSkills::model()->deleteAll('suppliers_has_portfolio_id = ?' , array($portfolioId));
                    }

                        //CVarDumper::Dump($_POST['Skills'],10,1);die;
                    foreach($_POST['Skills'] as $skills){

                        if($skills!=''){

                            if(!is_numeric($skills)){
                                $sk = Skills::model()->findByAttributes(array('name'=>$skills));
                                $skills = $sk->id;
                            }

                            $condition  =   array('skills_id'=>$skills,'suppliers_has_portfolio_id'=>$portfolioId);
                            $skillsList =   SuppliersHasPortfolioHasSkills::model()->findByAttributes($condition);

                            if(empty($skillsList))
                                $skillsList =   new SuppliersHasPortfolioHasSkills;
                            $skillsList->skills_id  =   $skills;
                            $skillsList->suppliers_has_portfolio_id =   $portfolioId;
                            $skillsList->add_date   =   date('Y-m-d H:i:s');
                            $skillsList->status =   1;
                            $skillsList->save();

                        }
                    }

                }


                if(isset($_POST['Services']))
                {
                    if($isUpdated)
                    {
                        SuppliersHasPortfolioHasServices::model()->deleteAll('suppliers_has_portfolio_id = ?' , array($portfolioId));
                    }

                    foreach($_POST['Services'] as $services){
                        $condition                      =   array('services_id'=>$services,'suppliers_has_portfolio_id'=>$portfolioId);
                        $serviceaList                   =   SuppliersHasPortfolioHasServices::model()->findByAttributes($condition);
                        if(empty($serviceaList))
                            $serviceaList                           =   new SuppliersHasPortfolioHasServices;
                        $serviceaList->services_id                  =   $services;
                        $serviceaList->suppliers_has_portfolio_id   =   $portfolioId;
                        $serviceaList->add_date                     =   date('Y-m-d H:i:s');
                        $serviceaList->status                       =   1;
                        $serviceaList->save();
                    }
                }



                if(isset($_POST['docs']))
                {

                    if($_POST['docs']!="")
                    {
                        if($isUpdated)
                        {
                            suppliersPortfolioImages::model()->deleteAll('suppliers_has_portfolio_id = ?' , array($portfolioId));
                        }

                        $docs = explode(",",$_POST['docs']);

                        for($j=0;$j<count($docs);$j++)
                        {
                            if($docs[$j]!="")
                            {
                                $docImg = explode("|",$docs[$j]);

                                if(isset($docImg[3]))
                                {
                                    $imgList                             =  new suppliersPortfolioImages;
                                    $imgList->image                      =  $docImg[3];
                                    $imgList->suppliers_has_portfolio_id =  $portfolioId;
                                    $imgList->add_date                   =  date('Y-m-d H:i:s');
                                    $imgList->status                     =  1;
                                    $imgList->save();
                                }    
                            }

                        }

                    }
                }

                if(isset($_REQUEST['t_name']))
                {
                    SuppliersPortfolioHasTeam::model()->deleteAll('suppliers_has_portfolio_id = ?' , array($portfolioId));
                    for($i=0;$i<count($_REQUEST['t_name']);$i++)
                    {
                        if($_REQUEST['t_name'][$i]!="" || $_REQUEST['t_designation'][$i]!="" || $_REQUEST['t_dep'][$i]!="")
                        {
                            $clientTeam    = new SuppliersPortfolioHasTeam;
                            $clientTeam->suppliers_has_portfolio_id = $portfolioId;
                            $clientTeam->name        = $_REQUEST['t_name'][$i];
                            $clientTeam->designation = $_REQUEST['t_designation'][$i];
                            $clientTeam->dep         = $_REQUEST['t_dep'][$i];;
                            $clientTeam->image       = $_REQUEST['t_image'][$i];
                            $clientTeam->linkedin    = $_REQUEST['t_linkedin'][$i];
                            $clientTeam->facebook    = $_REQUEST['t_facebook'][$i];
                            $clientTeam->twitter     = $_REQUEST['t_twitter'][$i];
                            $clientTeam->add_date    =  date('Y-m-d H:i:s');
                            $clientTeam->save();    
                        }
                    }
                }

                if(Yii::app()->request->isAjaxRequest)
                {
                    echo $portId;exit;    
                }else{
                    if($isUpdated)
                        Yii::app()->user->setFlash('record','Portfolio Updated');
                    else
                        Yii::app()->user->setFlash('record','Portfolio Added');
                    $this->redirect(array('/supplier/editprofile'));
                }

            }
        }

        $selectedIndustries =   array();
        $selectedSkills        = array();
        $selectedServices        = array();

        if(!empty($indusList))
        {
            for($i=0;$i<count($indusList);$i++)
            {
                $selectedIndustries[] = $indusList[$i]->industries_id;
            }

        }

        if(!empty($skillsList))
        {
            for($i=0;$i<count($skillsList);$i++)
            {
                $selectedSkills[] = $skillsList[$i]->skills_id;
            }

        }

        if(!empty($servicesList))
        {
            for($i=0;$i<count($servicesList);$i++)
            {
                $selectedServices[] = $servicesList[$i]->services_id;
            }

        }


        $setVariable = array(
            'model'=>$model,
            'industries'=>$industries,
            'services'=>$services,
            'selectedIndustries'=>$selectedIndustries,
            'selectedSkills'=>$selectedSkills,
            'skills'=>$skills,
            'selectedServices'=>$selectedServices
            );

        $this->render('create',array('setVariable'=>$setVariable,'is_new'=>$is_new));

	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		// if(isset($_POST['SuppliersHasPortfolio']))
		// {
		// 	$model->attributes=$_POST['SuppliersHasPortfolio'];
		// 	if($model->save())
		// 		$this->redirect(array('view','id'=>$model->id));
		// }

		// $this->render('update',array(
		// 	'model'=>$model
		// ));
        $is_new = false;
		$indusList  = "";
    	$isUpdated  = false;
    	$model= new SuppliersHasPortfolio;
    	$industries	= Industries::model()->findAll();
    	$skills  	= Skills::model()->findAll();

    	$services	= Services::model()->findAll();
        
    	if($id!="")
    	{
       		$isUpdated = True;
    		$model = SuppliersHasPortfolio::model()->findByPK($id);

    		$condition	=	array('suppliers_has_portfolio_id'=>$id);
    		$indusList	=	SuppliersPortfolioHasIndustries::model()->findAllByAttributes($condition);
            //$conditionSkills =	array('suppliers_has_portfolio_id'=>$id);
    		$skillsList	     =	SuppliersHasPortfolioHasSkills::model()->findAllByAttributes($condition);
            //$conditionServices   = array('suppliers_has_portfolio_id'=>$id);
    		$servicesList	     =	SuppliersHasPortfolioHasServices::model()->findAllByAttributes($condition);
    	}



    	if(isset($_POST['SuppliersHasPortfolio']))
    	{
    		$portType = $_POST['SuppliersHasPortfolio']['portfolio_type'];    
    		$portId   = $_POST['SuppliersHasPortfolio']['id'];

    		if(Yii::app()->request->isAjaxRequest && $portId > 0)
    		{
    			$isUpdated = True;
    		}

    		if($portId > 0)
    		{
                //$model SuppliersHasPortfolio::model()->findByAttributes(array('id'=>$portId,'portfolio_type'=>$portType));
    			$model = SuppliersHasPortfolio::model()->findByPK($portId);
    		}

    		$model->attributes = $_POST['SuppliersHasPortfolio'];

    		$model->suppliers_id = Yii::app()->user->supplierProfileId;
    		$model->status = 1;
    		if(isset($_POST['SuppliersHasPortfolio']['start_date']))
    		{
    			if($_POST['SuppliersHasPortfolio']['start_date']!="")
    			{
    				$model->start_date   = date("Y-m-d",strtotime($_POST['SuppliersHasPortfolio']['start_date']));    
    			}else{
    				$model->start_date   = NULL;
    			}                   
    			$model->discreet_desc = $_POST['SuppliersHasPortfolio']['discreet_desc'];                
    		}

    		if($model->save())
    		{
    			$portfolioId = $model->id;
    			$portId      = $portfolioId;
    			if(isset($_POST['Industries']))
    			{
    				if($isUpdated)
    				{
    					SuppliersPortfolioHasIndustries::model()->deleteAll('suppliers_has_portfolio_id = ?' , array($portfolioId));
    				}
    				foreach($_POST['Industries'] as $indus){
    					$condition						=	array('industries_id'=>$indus,'suppliers_has_portfolio_id'=>$portfolioId);
    					$indusList						=	SuppliersPortfolioHasIndustries::model()->findByAttributes($condition);
    					if(empty($indusList))
    						$indusList					=	new SuppliersPortfolioHasIndustries;
    					$indusList->industries_id		=	$indus;
    					$indusList->suppliers_has_portfolio_id	=	$portfolioId;
    					$indusList->add_date			=	date('Y-m-d H:i:s');
    					$indusList->status				=	1;
    					$indusList->save();
    				}
    			}




    			if(isset($_POST['Skills']))
    			{
    				if($isUpdated)
    				{
    					SuppliersHasPortfolioHasSkills::model()->deleteAll('suppliers_has_portfolio_id = ?' , array($portfolioId));
    				}

                        //CVarDumper::Dump($_POST['Skills'],10,1);die;
    				foreach($_POST['Skills'] as $skills){

    					if($skills!=''){

    						if(!is_numeric($skills)){
    							$sk = Skills::model()->findByAttributes(array('name'=>$skills));
    							$skills = $sk->id;
    						}

    						$condition	=	array('skills_id'=>$skills,'suppliers_has_portfolio_id'=>$portfolioId);
    						$skillsList	=	SuppliersHasPortfolioHasSkills::model()->findByAttributes($condition);

    						if(empty($skillsList))
    							$skillsList	=	new SuppliersHasPortfolioHasSkills;
    						$skillsList->skills_id	=	$skills;
    						$skillsList->suppliers_has_portfolio_id	=	$portfolioId;
    						$skillsList->add_date	=	date('Y-m-d H:i:s');
    						$skillsList->status	=	1;
    						$skillsList->save();

    					}
    				}

    			}


    			if(isset($_POST['Services']))
    			{
    				if($isUpdated)
    				{
    					SuppliersHasPortfolioHasServices::model()->deleteAll('suppliers_has_portfolio_id = ?' , array($portfolioId));
    				}

    				foreach($_POST['Services'] as $services){
    					$condition						=	array('services_id'=>$services,'suppliers_has_portfolio_id'=>$portfolioId);
    					$serviceaList					=	SuppliersHasPortfolioHasServices::model()->findByAttributes($condition);
    					if(empty($serviceaList))
    						$serviceaList					        =	new SuppliersHasPortfolioHasServices;
    					$serviceaList->services_id		            =	$services;
    					$serviceaList->suppliers_has_portfolio_id	=	$portfolioId;
    					$serviceaList->add_date			            =	date('Y-m-d H:i:s');
    					$serviceaList->status				        =	1;
    					$serviceaList->save();
    				}
    			}



    			if(isset($_POST['docs']))
    			{

    				if($_POST['docs']!="")
    				{
    					if($isUpdated)
    					{
    						suppliersPortfolioImages::model()->deleteAll('suppliers_has_portfolio_id = ?' , array($portfolioId));
    					}

    					$docs = explode(",",$_POST['docs']);

    					for($j=0;$j<count($docs);$j++)
    					{
    						if($docs[$j]!="")
    						{
    							$docImg = explode("|",$docs[$j]);

    							if(isset($docImg[3]))
    							{
    								$imgList				             =	new suppliersPortfolioImages;
    								$imgList->image		                 =	$docImg[3];
    								$imgList->suppliers_has_portfolio_id =	$portfolioId;
    								$imgList->add_date			         =	date('Y-m-d H:i:s');
    								$imgList->status				     =	1;
    								$imgList->save();
    							}    
    						}

    					}

    				}
    			}

    			if(isset($_REQUEST['t_name']))
    			{
    				SuppliersPortfolioHasTeam::model()->deleteAll('suppliers_has_portfolio_id = ?' , array($portfolioId));
    				for($i=0;$i<count($_REQUEST['t_name']);$i++)
    				{
    					if($_REQUEST['t_name'][$i]!="" || $_REQUEST['t_designation'][$i]!="" || $_REQUEST['t_dep'][$i]!="")
    					{
    						$clientTeam    = new SuppliersPortfolioHasTeam;
    						$clientTeam->suppliers_has_portfolio_id = $portfolioId;
    						$clientTeam->name        = $_REQUEST['t_name'][$i];
    						$clientTeam->designation = $_REQUEST['t_designation'][$i];
    						$clientTeam->dep         = $_REQUEST['t_dep'][$i];;
    						$clientTeam->image       = $_REQUEST['t_image'][$i];
    						$clientTeam->linkedin    = $_REQUEST['t_linkedin'][$i];
    						$clientTeam->facebook    = $_REQUEST['t_facebook'][$i];
    						$clientTeam->twitter     = $_REQUEST['t_twitter'][$i];
    						$clientTeam->add_date	 =	date('Y-m-d H:i:s');
    						$clientTeam->save();    
    					}
    				}
    			}

    			if(Yii::app()->request->isAjaxRequest)
    			{
    				echo $portId;exit;    
    			}else{
    				if($isUpdated)
    					Yii::app()->user->setFlash('record','Portfolio Updated');
    				else
    					Yii::app()->user->setFlash('record','Portfolio Added');
    				$this->redirect(array('/admin/SuppliersHasPortfolio/view','id'=>$_POST['SuppliersHasPortfolio']['id']));
    			}

    		}
    	}

    	$selectedIndustries	=	array();
    	$selectedSkills        = array();
    	$selectedServices        = array();

    	if(!empty($indusList))
    	{
    		for($i=0;$i<count($indusList);$i++)
    		{
    			$selectedIndustries[] = $indusList[$i]->industries_id;
    		}

    	}

    	if(!empty($skillsList))
    	{
    		for($i=0;$i<count($skillsList);$i++)
    		{
    			$selectedSkills[] = $skillsList[$i]->skills_id;
    		}

    	}

    	if(!empty($servicesList))
    	{
    		for($i=0;$i<count($servicesList);$i++)
    		{
    			$selectedServices[] = $servicesList[$i]->services_id;
    		}

    	}


    	$setVariable = array(
    		'model'=>$model,
    		'industries'=>$industries,
    		'services'=>$services,
    		'selectedIndustries'=>$selectedIndustries,
    		'selectedSkills'=>$selectedSkills,
    		'skills'=>$skills,
    		'selectedServices'=>$selectedServices
    		);

    	$this->render('update',array('setVariable'=>$setVariable,'is_new'=>$is_new));


	}

	public function actionReferences($id){
		$model=$this->loadModel($id);
		$this->render('references',array(
			'model'=>$model
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
		$dataProvider=new CActiveDataProvider('SuppliersHasPortfolio');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SuppliersHasPortfolio('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SuppliersHasPortfolio']))
			$model->attributes=$_GET['SuppliersHasPortfolio'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return SuppliersHasPortfolio the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SuppliersHasPortfolio::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	public function actionSuppliersPortfolio(){
		
		$this->render('suppliersPortfolio');

	}

	/**
	 * Performs the AJAX validation.
	 * @param SuppliersHasPortfolio $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='suppliers-has-portfolio-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
