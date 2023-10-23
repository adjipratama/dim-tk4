<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Pengambilan $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pengambilan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_pengambil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_barang')->textInput() ?>

    <?= $form->field($model, 'jumlah_pengambilan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
