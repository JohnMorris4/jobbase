<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h2 class="page-header">Categories <a href="/index.php?r=catagory/create" class="btn btn-primary pull-right">Create</a> </h2>
<?php if(null !== Yii::$app->session->getFlash('success')): ?>
    <div class="alert alert-success" >
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>
<ul class="list-group">
<?php foreach($catagories as $catagory) : ?>
    <li class="list-group-item"> <a href="/index.php?r=job&catagory=<?php echo $catagory->id; ?>"></a><?php echo $catagory->name; ?> </li>
    <?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ;

