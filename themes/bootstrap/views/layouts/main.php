<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>

	<?php Yii::app()->bootstrap->register(); ?>
</head>

<body>

<?php $this->widget('bootstrap.widgets.TbNavbar',array(
    'items'=>array(
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'items'=>array(
                array('label'=>'首页', 'url'=>array('/site/index')),
                array('label'=>'发布', 'url'=>array('/cod/repos/all')),
            ),
        ),

        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('label'=>'登录', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'退出 ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),

                array('label'=>'后台', 'url'=>'#', 'items'=>array(
                    array('label'=>'用户', 'url'=>array('/user')),
                    '---',
                    array('label'=>'应用', 'url'=>array('/cod/data/repos')),
                    array('label'=>'服务器', 'url'=>array('/server')),
                )),

                array('label'=>'调试', 'url'=>'#', 'items'=>array(
                    array('label'=>'代码发布', 'url'=>array('/cod/repos/deploy')),
                )),

            ),
        ),
    ),
)); ?>

<div class="container" id="page">

	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

    <div id="footer" class="mute text-center">
		<br />正大恒领，版权所有。Copyright &copy; <?php echo date('Y'); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
