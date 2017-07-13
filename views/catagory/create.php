<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $catagory app\models\Catagory */
/* @var $form ActiveForm */
?>
<div class="catagory-create">
    <h2 class="page-header">Add Category</h2>
    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($catagory, 'name') ?>
        
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- catagory-create -->
