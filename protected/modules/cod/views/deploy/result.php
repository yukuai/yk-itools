<?php
/* @var $this DeployController */

$this->breadcrumbs=array(
    '发布'=>array('/cod/repos/all'),
    $app->name=>array('/cod/repos/all', 'id'=>$app->id),
	'结果',
);
?>
<p>$ <?php echo $cli; ?></p>
<p>$ <?php echo $ret; ?></p>
<pre>
<?php echo implode('<br \>', $output); ?>
</pre>
