<?php
/* @var $this AdminLogsController */
/* @var $model AdminLogs */

$this->breadcrumbs=array(
	'Admin Logs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List AdminLogs', 'url'=>array('index')),
	array('label'=>'Create AdminLogs', 'url'=>array('create')),
	array('label'=>'Update AdminLogs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete AdminLogs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AdminLogs', 'url'=>array('admin')),
);
?>

<br><br>
<div class="box inverse">
        <div class="col-md-15 col-lg-15, word-wrap-10" >
   			<div class="panel panel-info">
            	<div class="panel-heading ">
              		<h3 class="panel-title">View AdminLogs #<?php echo $model->id; ?></h3>
              	</div>
        <div class="panel-body">
            <div class="row">
        <div class="col-xs-3 ">
    <table class="table table-user-information">
       	<tbody>
       	<?php
             $attributes=array(
             	'id',
				'username',
				'ipaddress',
				'logtime',
				'controller',
				'action',
				'details',
				'action_param',
				'browser',
				'query_string',
				'refer_url',
				'user_id',
				'request_url',
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

<?php /* $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'username',
		'ipaddress',
		'logtime',
		'controller',
		'action',
		'details',
		'action_param',
		'browser',
		'query_string',
		'refer_url',
		'user_id',
		'request_url',
	),
)); */?>
-->