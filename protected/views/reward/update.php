<?php
/* @var $this RewardController */
/* @var $model Reward */

$this->breadcrumbs=array(
	'Rewards'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Reward', 'url'=>array('index')),
	array('label'=>'Create Reward', 'url'=>array('create')),
	array('label'=>'View Reward', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Reward', 'url'=>array('admin')),
);
?>

<h1>Update Reward <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>