<?php
/* @var $this ReposController */

$this->breadcrumbs=array(
    'Repos'=>array('/cod/repos'),
    'All',
);

$data=$dataProvider->getData();
if(($n=count($data))>0)
{
    foreach($data as $item)
    {
        print_r($item->name);
    }
}
else
{
}

?>

<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<ul class="thumbnails">
  <?php
    if(($n=count($data))>0)
    {
        foreach($data as $item)
        {
    ?>
  <li class="span3"><a href="<?php echo $this->createUrl('/cod/repos/deploy', array('id'=>$item->id)); ?>">
    <div class="thumbnail" style="padding:32px 0 18px 0;">
      <img src="/images/128x128.gif" alt="" class="img-rounded">
      <h3 class="text-success text-center"><?php echo $item->name; ?></h3>

      <p class="muted text-center"><?php echo $item->description; ?></p>
    </div>
  </a></li>
  <?php
        }
    } ?>
</ul>
