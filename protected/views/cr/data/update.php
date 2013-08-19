<?php
/* @var $this DataController */
/* @var $model CodeRepository */

$this->breadcrumbs=array(
	'Code Repositories'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CodeRepository', 'url'=>array('index')),
	array('label'=>'Create CodeRepository', 'url'=>array('create')),
	array('label'=>'View CodeRepository', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CodeRepository', 'url'=>array('admin')),
);
?>

<h1>Update CodeRepository <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>