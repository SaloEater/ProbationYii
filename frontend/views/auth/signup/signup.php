<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $signupForm \bookkeeping\forms\manage\user\SignupForm */

/* @var $profileForm \bookkeeping\forms\manage\bookkeeping\ProfileForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

            <?= $form->field($signupForm, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($profileForm, 'surname') ?>

            <?= $form->field($profileForm, 'name') ?>

            <?= $form->field($signupForm, 'email') ?>

            <?= $form->field($signupForm, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
