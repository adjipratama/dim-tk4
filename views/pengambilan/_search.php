<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\PengambilanSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pengambilan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pengambilan') ?>

    <?= $form->field($model, 'nama_pengambil') ?>

    <?= $form->field($model, 'id_barang') ?>

    <?= $form->field($model, 'jumlah_pengambilan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
