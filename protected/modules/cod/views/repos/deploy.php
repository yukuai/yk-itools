<?php
/* @var $this ReposController */

$this->breadcrumbs=array(
	'Repos'=>array('/cod/repos'),
	'Deploy',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'verticalForm',
	'type'=>'horizontal',
	'htmlOptions'=>array('class'=>'well'),
)); ?>

<fieldset>

<?php echo $form->errorSummary($model); ?>

<?php echo $form->dropDownListRow($model,'project',
								  CHtml::listData(CodeRepository::model()->findAll(), 'name', 'name')); ?>

<?php echo $form->dropDownListRow($model,'server',
								  CHtml::listData(Server::model()->findAll(), 'name', 'name')); ?>

<?php echo $form->dropDownListRow($model,'version',$versions); ?>

<?php echo $form->passwordFieldRow($model, 'password', array()); ?>

</fieldset>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'发布', 'size'=>'large')); ?>
</div>
<?php $this->endWidget(); ?>
