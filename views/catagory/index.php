<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h2 class="page-header">Categories <a href="/index.php?r=catagory/create" class="btn btn-primary pull-right">Create</a> </h2>

<ul class="list-group">
<?php
foreach($catagories as $catagory) : ?>
<li class="list-group-item"> <a href="/index.php?r=job&category<?php echo $catagory->id; ?>"> <?php echo $catagory->name ; ?></a> </li>
<?php endforeach ?>
</ul>

<?= LinkPager::widget (['pagination'=> $pagination]); 