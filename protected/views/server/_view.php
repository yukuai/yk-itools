<?php
/* @var $this ServerController */
/* @var $data Server */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deploy_type')); ?>:</b>
	<?php echo CHtml::encode($data->deploy_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deploy_target')); ?>:</b>
	<?php echo CHtml::encode($data->deploy_target); ?>
	<br />


</div>