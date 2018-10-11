<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 10.10.2018
 * Time: 13:04
 */

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $producer common\models\Producers */
/* @var $films common\models\Films[] */

$this->title = 'Films of ' . $producer->name;
$this->params['breadcrumbs'][] = ['label' => 'ProducerFilms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producer-films-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=GridView::widget([
        'dataProvider' => $films,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name'
        ],
    ]);
    ?>

</div>
