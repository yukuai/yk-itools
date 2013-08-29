<?php
$this->breadcrumbs=array(
	'Applications'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Application','url'=>array('index')),
	array('label'=>'Create Application','url'=>array('create')),
	array('label'=>'Update Application','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Application','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Application','url'=>array('admin')),
);
?>

<h1>View Application #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'leader',
		'status',
		'description',
		'entry',
		'repo_path',
		'team',
		'deploy_mode',
		'deploy_path',
	),
)); ?>
