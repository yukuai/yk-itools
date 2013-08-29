<?php
$this->breadcrumbs=array(
	'Application Servers',
);

$this->menu=array(
	array('label'=>'Create ApplicationServer','url'=>array('create')),
	array('label'=>'Manage ApplicationServer','url'=>array('admin')),
);
?>

<h1>Application Servers</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
