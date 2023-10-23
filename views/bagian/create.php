<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Bagian $model */

$this->title = 'Create Bagian';
$this->params['breadcrumbs'][] = ['label' => 'Bagians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bagian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
