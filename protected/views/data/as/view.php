<?php
$this->breadcrumbs=array(
	'Application Servers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List ApplicationServer','url'=>array('index')),
	array('label'=>'Create ApplicationServer','url'=>array('create')),
	array('label'=>'Update ApplicationServer','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete ApplicationServer','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ApplicationServer','url'=>array('admin')),
);
?>

<h1>View ApplicationServer #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'update_mode',
		'url',
		'deploy_mode_config',
	),
)); ?>
