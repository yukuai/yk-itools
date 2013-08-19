<?php
/* @var $this DataController */
/* @var $model CodeRepository */

$this->breadcrumbs=array(
	'Code Repositories'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CodeRepository', 'url'=>array('index')),
	array('label'=>'Create CodeRepository', 'url'=>array('create')),
	array('label'=>'Update CodeRepository', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CodeRepository', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CodeRepository', 'url'=>array('admin')),
);
?>

<h1>View CodeRepository #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'type',
		'rc_type',
		'rc_url',
		'rc_username',
		'rc_password',
		'rc_head',
		'description',
	),
)); ?>
