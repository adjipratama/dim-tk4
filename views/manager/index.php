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

            'nama_barang',
            [
                'attribute' => 'Deviasi Pesanan',
                'value' => 's_order'
            ],
            [
                'attribute' => 'Mean Pesanan',
                'value' => 'mean_order'
            ],
            [
                'attribute' => 'Deviasi Produksi',
                'value' => 's_demand'
            ],
            [
                'attribute' => 'Mean Produksi',
                'value' => 'mean_demand'
            ],
            [
                'attribute' => 'Lead Time',
                'value' => 'lead_time'
            ],
            [
                'attribute' => 'BE',
                'value' => 'BE'
            ],
            [
                'attribute' => 'Parameter',
                'value' => 'parameter'
            ],
            [
                'attribute' => 'Bullwhip Effect',
                'format' => 'raw',
                'value' => function ($data) {
                            if (($data['BE']) > ($data['parameter'])){
                                return '<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Solusi Bullwhip</button>';
                            }else{
                                return "Tidak Terjadi Bullwhip Effect";
                            }
                        },
            ],
        ]
    ]); ?>


</div>
<!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Solusi Bullwhip</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <ol>
    			<li> Menjamin ketersediaan produk dengan memperhatikan tingkat pemesanan </li>
        		<li> Mengatisipasi terjadinya fluktuasi permintaan  </li>
        		<li> Menjaga arus komunikasi agar tidak terjadi penundaan sehingga arus permintaan selalu lancar </li>
                <li> Menjaga <b>Lead Time </b> tetap stabil </li>
                <li> Melakukan peramalan dengan metode yang akurat <i> (dilakukan penelitian lanjutan) karena pada penelitian ini tidak dibahas metode peramalan </i></li><i>
    		</i></ol>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>