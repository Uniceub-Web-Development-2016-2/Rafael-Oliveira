<?php
/* @var $this RewardController */
/* @var $model Reward */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reward-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'reward_name'); ?>
		<?php echo $form->textField($model,'reward_name',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'reward_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'reward_descrition'); ?>
		<?php echo $form->textField($model,'reward_descrition',array('size'=>60,'maxlength'=>150)); ?>
		<?php echo $form->error($model,'reward_descrition'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image_url'); ?>
		<?php echo $form->textField($model,'image_url',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'image_url'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->