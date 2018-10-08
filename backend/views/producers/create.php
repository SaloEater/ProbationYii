<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Producers */

$this->title = 'Create Producers';
$this->params['breadcrumbs'][] = ['label' => 'Producers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
