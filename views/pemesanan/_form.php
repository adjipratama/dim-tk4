<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pemesanan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pemesanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_pemesan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_barang')->textInput() ?>

    <?= $form->field($model, 'jumlah_pesanan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'proses')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
