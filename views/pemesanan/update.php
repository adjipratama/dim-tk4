<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pemesanan $model */

$this->title = 'Update Pemesanan: ' . $model->id_pesanan;
$this->params['breadcrumbs'][] = ['label' => 'Pemesanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pesanan, 'url' => ['view', 'id_pesanan' => $model->id_pesanan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pemesanan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
