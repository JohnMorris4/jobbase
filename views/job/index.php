<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h2 class="page-header">Jobs <a href="/index.php?r=catagory/create" class="btn btn-primary pull-right">Create</a> </h2>
<?php if(null !== Yii::$app->session->getFlash('success')): ?>
    <div class="alert alert-success" >
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>
<ul class="list-group">
<?php if(!empty($jobs)) : ?>
<?php
foreach($jobs as $job) : ?>
<li class="list-group-item"> <a href="/index.php?r=job/details&id=<?php echo $job->id; ?>"> <?php echo $job->title ;
     ?></a> - <strong><?php echo $job->city; ?>, <?php echo $job->state; ?></strong> </li>
<?php endforeach ?>
</ul>
 <?php else : ?>
    <h1>No Jobs To List</h1>
 <?php endif;?>
<?= LinkPager::widget (['pagination'=> $pagination]); 
