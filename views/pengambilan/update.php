<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pengambilan $model */

$this->title = 'Update Pengambilan: ' . $model->id_pengambilan;
$this->params['breadcrumbs'][] = ['label' => 'Pengambilans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pengambilan, 'url' => ['view', 'id_pengambilan' => $model->id_pengambilan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pengambilan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
