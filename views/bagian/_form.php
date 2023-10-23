<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Bagian $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="bagian-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_bagian')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
