<?php
/* @var $this ActionController */

$this->breadcrumbs=array(
	'Action'=>array('/cr/action'),
	'Deploy',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<ul class="thumbnails">
  <?php for ($i=0; $i<10; $i++) { ?>
  <li class="span3">
  <a href="#1">
    <div class="thumbnail" style="padding:32px 0 18px 0;">
      <img src="/codeploy/images/128x128.gif" alt="" class="img-rounded">
      <h3 class="text-success text-center">yxt</h3>

      <p class="muted text-center">html5 版营销通_v2.0(r495)</p>
    </div>
    </a>
  </li>
        <?php } ?>
</ul>


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

    <?php echo $form->passwordFieldRow($model, 'password', array('class'=>'span3')); ?>

</fieldset>

<div class="form-actions">
<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'下一步', 'size'=>'large')); ?>
</div>
<?php $this->endWidget(); ?>


<?php
/* $this->widget('bootstrap.widgets.TbCarousel', array( */
/*     'items'=>array( */
/*         array('image'=>'http://placehold.it/770x400&text=First+thumbnail', 'label'=>'First Thumbnail label', 'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'), */
/*         array('image'=>'http://placehold.it/770x400&text=Second+thumbnail', 'label'=>'Second Thumbnail label', 'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'), */
/*         array('image'=>'http://placehold.it/770x400&text=Third+thumbnail', 'label'=>'Third Thumbnail label', 'caption'=>'Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.'), */
/*     ), */
/* )); */
?>
