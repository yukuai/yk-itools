<?php
/* @var $this ProjectController */
/* @var $model Project */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'project-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rc_type'); ?>
		<?php echo $form->textField($model,'rc_type',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'rc_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rc_url'); ?>
		<?php echo $form->textField($model,'rc_url',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'rc_url'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->