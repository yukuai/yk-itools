<?php
/* @var $this ServerController */
/* @var $model Server */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'server-form',
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
		<?php echo $form->labelEx($model,'deploy_type'); ?>
		<?php echo $form->textField($model,'deploy_type',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'deploy_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deploy_target'); ?>
		<?php echo $form->textField($model,'deploy_target',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'deploy_target'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->