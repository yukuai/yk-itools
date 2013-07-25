<?php
/* @var $this ProjectController */

$this->breadcrumbs=array(
	'Project'=>array('/project'),
	'Deploy',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm'); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
      <?php echo $form->label($model,'project'); ?>
      <?php echo $form->dropDownList($model,'project',
      CHtml::listData(Project::model()->findAll(), 'name', 'name')); ?>
    </div>

    <div class="row">
      <?php echo $form->label($model,'server'); ?>
      <?php echo $form->dropDownList($model,'server',
      CHtml::listData(Server::model()->findAll(), 'name', 'name')); ?>
    </div>

    <div class="row">
      <?php echo $form->label($model,'version'); ?>
      <?php echo $form->dropDownList($model,'version',
      array('HEAD', '稳定版', '432')
      ); ?>
    </div>

    <div class="row">
      <?php echo $form->labelEx($model,'password'); ?>
      <?php echo $form->passwordField($model,'password'); ?>
      <?php echo $form->error($model,'password'); ?>
      <p class="hint">
	Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
      </p>
    </div>

    <div class="row submit">
      <?php echo CHtml::submitButton('Deploy'); ?>
    </div>

<?php $this->endWidget(); ?>
</div>
