<?php
/* @var $this MissionController */
/* @var $model Mission */

$this->breadcrumbs=array(
	'Missions'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Mission', 'url'=>array('index')),
	array('label'=>'Create Mission', 'url'=>array('create')),
	array('label'=>'Update Mission', 'url'=>array('update', 'id'=>$model->mission_id)),
	array('label'=>'Delete Mission', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->mission_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Mission', 'url'=>array('admin')),
);
?>

<h1>View Mission #<?php echo $model->mission_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'mission_id',
		'name',
		'mission_description',
		'deleted_at',
	),
)); ?>
