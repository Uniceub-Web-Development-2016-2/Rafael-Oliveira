<?php
/* @var $this RewardController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rewards',
);

$this->menu=array(
	array('label'=>'Create Reward', 'url'=>array('create')),
	array('label'=>'Manage Reward', 'url'=>array('admin')),
);
?>

<h1>Rewards</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
