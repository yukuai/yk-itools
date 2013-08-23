<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'code-repository-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'type',array('class'=>'span5','maxlength'=>9)); ?>

	<?php echo $form->textFieldRow($model,'rc_type',array('class'=>'span5','maxlength'=>9)); ?>

	<?php echo $form->textFieldRow($model,'rc_url',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'rc_username',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'rc_password',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'rc_head',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>64)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
