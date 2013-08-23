<?php
$this->breadcrumbs=array(
	'Code Repositories',
);

$this->menu=array(
	array('label'=>'Create CodeRepository','url'=>array('create')),
	array('label'=>'Manage CodeRepository','url'=>array('admin')),
);
?>

<h1>Code Repositories</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
