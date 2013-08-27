<?php
/* @var $this DeployController */

$this->breadcrumbs=array(
	'Deploy'=>array('/cod/deploy'),
	'Result',
);
?>
<p>$ <?php echo $cli; ?></p>
<p>$ <?php echo $ret; ?></p>
<pre>
<?php echo implode('<br \>', $output); ?>
</pre>
