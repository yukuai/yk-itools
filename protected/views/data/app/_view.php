<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('leader')); ?>:</b>
	<?php echo CHtml::encode($data->leader); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('entry')); ?>:</b>
	<?php echo CHtml::encode($data->entry); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('repo_path')); ?>:</b>
	<?php echo CHtml::encode($data->repo_path); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('team')); ?>:</b>
	<?php echo CHtml::encode($data->team); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deploy_mode')); ?>:</b>
	<?php echo CHtml::encode($data->deploy_mode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deploy_path')); ?>:</b>
	<?php echo CHtml::encode($data->deploy_path); ?>
	<br />

	*/ ?>

</div>