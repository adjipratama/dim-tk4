<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProduksiSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="produksi-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_produksi') ?>

    <?= $form->field($model, 'id_pesanan') ?>

    <?= $form->field($model, 'id_barang') ?>

    <?= $form->field($model, 'jumlah_produksi') ?>

    <?= $form->field($model, 'lead_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
