<?php
/* @var $this DataController */
/* @var $model CodeRepository */

$this->breadcrumbs=array(
	'Code Repositories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CodeRepository', 'url'=>array('index')),
	array('label'=>'Manage CodeRepository', 'url'=>array('admin')),
);
?>

<h1>Create CodeRepository</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>