<?php

/* @var $this yii\web\View */

/* @var $form \bookkeeping\forms\manage\bookkeeping\CategoryForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Create category';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">
            <?php $activeForm = ActiveForm::begin(['id' => 'category-form']); ?>

            <?= $activeForm->field($form, 'name')->textInput(['autofocus' => true]) ?>
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'category-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
