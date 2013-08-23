<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type')); ?>:</b>
	<?php echo CHtml::encode($data->type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rc_type')); ?>:</b>
	<?php echo CHtml::encode($data->rc_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rc_url')); ?>:</b>
	<?php echo CHtml::encode($data->rc_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rc_username')); ?>:</b>
	<?php echo CHtml::encode($data->rc_username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rc_password')); ?>:</b>
	<?php echo CHtml::encode($data->rc_password); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('rc_head')); ?>:</b>
	<?php echo CHtml::encode($data->rc_head); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	*/ ?>

</div>