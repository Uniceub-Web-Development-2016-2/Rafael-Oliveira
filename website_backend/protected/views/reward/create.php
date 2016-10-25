<?php
/* @var $this RewardController */
/* @var $model Reward */

$this->breadcrumbs=array(
	'Rewards'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Reward', 'url'=>array('index')),
	array('label'=>'Manage Reward', 'url'=>array('admin')),
);
?>

<h1>Create Reward</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>