<?php
/**
 * Created by PhpStorm.
 * User: Tom
 * Date: 31.12.2018
 * Time: 14:26
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Create transaction';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="row">
        <div class="col-lg-5">
            <?php $activeForm = ActiveForm::begin(['id' => 'transaction-form']); ?>

            <?= $activeForm->field($form, 'wealth')->textInput(['autofocus' => true]) ?>
            <?= $activeForm->field($form, 'date')->widget(\bookkeeping\entities\widgets\DateMaskedInput::class) ?>
            <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'transaction-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>