<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel \bookkeeping\entities\searchers\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Families';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="films-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'ownerId',
            ['class' => '\bookkeeping\entities\columns\DeleteColumn'],
        ],
    ]); ?>
</div>