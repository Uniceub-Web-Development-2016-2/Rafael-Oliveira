<?php
/* @var $this RewardController */
/* @var $model Reward */

$this->breadcrumbs=array(
	'Rewards'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Reward', 'url'=>array('index')),
	array('label'=>'Create Reward', 'url'=>array('create')),
	array('label'=>'Update Reward', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Reward', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reward', 'url'=>array('admin')),
);
?>

<h1>View Reward #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'descrition',
		'image_url',
	),
)); ?>
