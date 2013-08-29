<?php
$this->breadcrumbs=array(
	'Application Servers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ApplicationServer','url'=>array('index')),
	array('label'=>'Create ApplicationServer','url'=>array('create')),
	array('label'=>'View ApplicationServer','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ApplicationServer','url'=>array('admin')),
);
?>

<h1>Update ApplicationServer <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>