<?php
$this->breadcrumbs=array(
	'Application Servers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ApplicationServer','url'=>array('index')),
	array('label'=>'Manage ApplicationServer','url'=>array('admin')),
);
?>

<h1>Create ApplicationServer</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>