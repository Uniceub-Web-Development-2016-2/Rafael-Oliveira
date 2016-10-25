<?php
/* @var $this RewardController */
/* @var $model Reward */

$this->breadcrumbs=array(
	'Rewards'=>array('index'),
	$model->reward_id=>array('view','id'=>$model->reward_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Reward', 'url'=>array('index')),
	array('label'=>'Create Reward', 'url'=>array('create')),
	array('label'=>'View Reward', 'url'=>array('view', 'id'=>$model->reward_id)),
	array('label'=>'Manage Reward', 'url'=>array('admin')),
);
?>

<h1>Update Reward <?php echo $model->reward_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>