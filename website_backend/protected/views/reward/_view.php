<?php
/* @var $this RewardController */
/* @var $data Reward */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('reward_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->reward_id), array('view', 'id'=>$data->reward_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reward_name')); ?>:</b>
	<?php echo CHtml::encode($data->reward_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reward_descrition')); ?>:</b>
	<?php echo CHtml::encode($data->reward_descrition); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('image_url')); ?>:</b>
	<?php echo CHtml::encode($data->image_url); ?>
	<br />


</div>