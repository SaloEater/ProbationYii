<?php

use yii\helpers\Html;
use bookkeeping\entities\widgets\FamilyWidget;
use bookkeeping\entities\widgets\ExpensesWidget;

/**
 * @var \bookkeeping\entities\Family $family
 * @var \bookkeeping\entities\Category $rootCategory
 */

$this->title = 'Ваша семья';
?>
<div class="films-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= FamilyWidget::widget(['family' => $family]) ?>
    <?= ExpensesWidget::widget(['rootCategory' => $rootCategory]) ?>
</div>