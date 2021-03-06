<?php
/* @var $this MissionController */
/* @var $model Mission */

$this->breadcrumbs=array(
	'Missions'=>array('index'),
	$model->name=>array('view','id'=>$model->mission_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Mission', 'url'=>array('index')),
	array('label'=>'Create Mission', 'url'=>array('create')),
	array('label'=>'View Mission', 'url'=>array('view', 'id'=>$model->mission_id)),
	array('label'=>'Manage Mission', 'url'=>array('admin')),
);
?>

<h1>Update Mission <?php echo $model->mission_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>