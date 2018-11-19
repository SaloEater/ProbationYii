<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var array $text
 */

$this->title = 'Создать семью';
?>
<div class="films-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-lg-5">
        <?php $form = ActiveForm::begin(); ?>
        <?= Html::a('Создать', ['new'], ['class' => 'btn btn-primary']) ?>
        или
        <?= Html::a('Присоединиться', ['join'], ['class' => 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>