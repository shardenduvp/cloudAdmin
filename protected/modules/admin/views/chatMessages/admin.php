<?php
/* @var $this ChatMessagesController */
/* @var $model ChatMessages */

$this->breadcrumbs=array(
	'Chat Messages'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ChatMessages', 'url'=>array('index')),
	array('label'=>'Create ChatMessages', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#chat-messages-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Chat Messages</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'chat-messages-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'chat_template_id',
		'chat_message_has_user_id',
		'type',
		'message',
		'ip_address',
		/*
		'sender_type',
		'status',
		'add_date',
		'chat_room_id',
		'proposal_id',
		'is_sent_from_supplier',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
