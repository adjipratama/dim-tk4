<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bagian $model */

$this->title = 'Update Bagian: ' . $model->id_bagian;
$this->params['breadcrumbs'][] = ['label' => 'Bagians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_bagian, 'url' => ['view', 'id_bagian' => $model->id_bagian]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bagian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
