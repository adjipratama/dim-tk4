<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Pengambilan $model */

$this->title = 'Tambah Pengambilan';
$this->params['breadcrumbs'][] = ['label' => 'Pengambilans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pengambilan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
