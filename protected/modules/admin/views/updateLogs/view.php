<?php
/* @var $this UpdateLogsController */
/* @var $model UpdateLogs */

$this->breadcrumbs=array(
	'Update Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UpdateLogs', 'url'=>array('index')),
	array('label'=>'Create UpdateLogs', 'url'=>array('create')),
	array('label'=>'Update UpdateLogs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UpdateLogs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UpdateLogs', 'url'=>array('admin')),
);
?>

<br><br>
<div class="box inverse">
        <div class="col-md-10 col-lg-10 col-md-offset-1 col-lg-offset-1 " >
   			<div class="panel panel-info">
            	<div class="panel-heading ">
              		<h3 class="panel-title">View UpdateLogs #<?php echo $model->id; ?></h3>
              	</div>
        <div class="panel-body">
            <div class="row">
<div class=" col-md-30 col-lg-30 "> 
    <table class="table table-user-information">
       	<tbody>
       	<?php
             $attributes=array(
             	'id',
				'username',
				'action',
				'controller',
				'description',
				'user_ip',
				'datetime',
				'user_id',
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
<?/*php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'action',
		'controller',
		'description',
		'user_ip',
		'datetime',
		'user_id',
	),
)); */?>
-->
