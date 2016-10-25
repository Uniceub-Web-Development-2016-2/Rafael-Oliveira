<?php
/* @var $this MissionController */
/* @var $data Mission */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('mission_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->mission_id), array('view', 'id'=>$data->mission_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mission_description')); ?>:</b>
	<?php echo CHtml::encode($data->mission_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deleted_at')); ?>:</b>
	<?php echo CHtml::encode($data->deleted_at); ?>
	<br />


</div>