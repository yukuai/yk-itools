<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'application-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'leader',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'description',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'entry',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'repo_path',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'team',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'deploy_mode',array('class'=>'span5','maxlength'=>32)); ?>

	<?php echo $form->textFieldRow($model,'deploy_path',array('class'=>'span5','maxlength'=>128)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
