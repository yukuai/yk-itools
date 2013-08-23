<?php
/* @var $this ReposController */

$this->breadcrumbs=array(
    'Repos'=>array('/cod/repos'),
    'All',
);
?>

<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<ul class="thumbnails">
  <?php for ($i=0; $i<10; $i++) { ?>
  <li class="span3"><a href="<?php echo $this->createUrl('/cod/repos/status', array('id'=>$i)); ?>">
    <div class="thumbnail" style="padding:32px 0 18px 0;">
      <img src="/images/128x128.gif" alt="" class="img-rounded">
      <h3 class="text-success text-center">yxt</h3>

      <p class="muted text-center">html5 版营销通_v2.0(r495)</p>
    </div>
  </a></li>
  <?php } ?>
</ul>
