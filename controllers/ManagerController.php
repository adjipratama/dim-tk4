<?php

namespace app\controllers;

use app\models\Barang;
use app\models\ManagerSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * BarangController implements the CRUD actions for Barang model.
 */
class ManagerController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Barang models.
     *
     * @return string
     */
    public function actionIndex()
    {
        // $searchModel = new ManagerSearch();
        // $dataProvider = $searchModel->search($this->request->queryParams);

        $query = (new \yii\db\Query())
        ->select([
            'barang.nama_barang', 
            'ROUND(STDDEV(jumlah_pesanan), 3) AS s_order',
            'ROUND(AVG(pemesanan.jumlah_pesanan), 3) AS mean_order',
            'ROUND(STDDEV(jumlah_produksi), 3) AS s_demand',
            'ROUND(AVG(produksi.jumlah_produksi), 3) AS mean_demand',
            'ROUND((STDDEV(jumlah_pesanan) / AVG(jumlah_pesanan)), 3) AS cv_order',
            'ROUND((STDDEV(jumlah_produksi) / AVG(jumlah_produksi)), 3) AS cv_demand',
            'ROUND(((STDDEV(jumlah_pesanan) / AVG(jumlah_pesanan)) / (STDDEV(jumlah_produksi) / AVG(jumlah_produksi))), 3) AS BE',
            'produksi.lead_time',
            'ROUND((1 + ((2 * produksi.lead_time) / 30) + ((2 * produksi.lead_time ^ 2) / (30 ^ 2))), 3) AS parameter',
            'ROUND(((STDDEV(jumlah_pesanan) / AVG(jumlah_pesanan)) / (STDDEV(jumlah_produksi) / AVG(jumlah_produksi))) > 1 + ((2 * produksi.lead_time) / 30) + ((2 * produksi.lead_time ^ 2) / (30 ^ 2)), 3) AS Bullwhip_Effect'
            ])
        ->from('barang')
        ->innerJoin('pemesanan', 'pemesanan.id_barang = barang.id_barang')
        ->innerJoin('produksi', 'produksi.id_barang = barang.id_barang')
        ->groupBy(['barang.nama_barang', 'produksi.lead_time']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
