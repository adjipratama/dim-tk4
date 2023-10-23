<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Produksi $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="produksi-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pesanan')->textInput() ?>

    <?= $form->field($model, 'id_barang')->textInput() ?>

    <?= $form->field($model, 'jumlah_produksi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lead_time')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
