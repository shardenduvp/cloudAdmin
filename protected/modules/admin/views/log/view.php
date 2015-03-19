<?php
/* @var $this LogController */
/* @var $model Log */

$this->breadcrumbs=array(
	'Logs'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Log', 'url'=>array('index')),
	array('label'=>'Create Log', 'url'=>array('create')),
	array('label'=>'Update Log', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Log', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Log', 'url'=>array('admin')),
);
?>

<br><br>
<div class="box inverse">
        <div class="col-md-5 col-lg-5 col-md-offset-3 col-lg-offset-3 " >
   			<div class="panel panel-info">
            	<div class="panel-heading ">
              		<h3 class="panel-title">View Log #<?php echo $model->id; ?></h3>
              	</div>
        <div class="panel-body">
            <div class="row">
<div class=" col-md-50 col-lg-50 "> 
    <table class="table table-user-information">
       	<tbody>
       	<?php
             $attributes=array(
             	'id',
				'proposal_id',
				'project_status',
				'is_checked',
				'title',
				'description',
				'add_date',
				'update_date',
				'status',
				'for_user',
				'notification',
				'is_read',
				'is_active',
				'login_id',
				);

  				foreach($attributes as $attr) {
                	$value=$model->$attr;
                	//if password display same number of stars instead
        ?>    
         		<tr>
         			<td><?php echo ucfirst($attr); ?></td>
         			<td><?php echo $value; ?></td>
         		</tr>     
         			<?php }?>    		
        </tbody>
    </table>
    </div>
  </div>
</div>
              

<!--

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'proposal_id',
		'project_status',
		'is_checked',
		'title',
		'description',
		'add_date',
		'update_date',
		'status',
		'for_user',
		'notification',
		'is_read',
		'is_active',
		'login_id',
	),
)); */?>

-->
