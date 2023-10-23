<?php

use app\models\Barang;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BarangSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Barangs';   
?>
<div class="barang-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'Nama Pemesan',
                'value' => 'nama_pemesan'
            ],
            [
                'attribute' => 'Nama Barang',
                'value' => 'nama_barang'
            ],
            [
                'attribute' => 'Jumlah Pesanan',
                'value' => 'jumlah_pesanan'
            ],
            [
                'attribute' => 'Proses',
                'format' => 'raw',
                'value' => function ($data) {
                            if ($data["proses"] == 1){
                                return '<button type="button" class="btn btn-danger disabled">
                                <span class="glyphicon glyphicon-eye-close">
                                    Sudah Diproses
                                </span>
                            </button>';
                            }else{
                                return '<a href="produksi_form.php?id=<?php echo $data[id_pesanan] ?>">
                                <button type="button" class="btn btn-success">
                                    <span class="glyphicon glyphicon-eye-open">
                                        Proses
                                    </span>
                                </button>
                            </a> ';
                            }
                        },
            ],
        ]
    ]); ?>


</div>
