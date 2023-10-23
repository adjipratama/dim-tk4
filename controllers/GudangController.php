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
class GudangController extends Controller
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
    public function actionStokbarang()
    {
        // $searchModel = new ManagerSearch();
        // $dataProvider = $searchModel->search($this->request->queryParams);

        $query = (new \yii\db\Query())
        ->select([
            'barang.nama_barang', 
            'SUM(DISTINCT produksi.jumlah_produksi) as total_produksi',
            'SUM(DISTINCT pengambilan.jumlah_pengambilan) as total_pengambilan',
            '(SUM(DISTINCT produksi.jumlah_produksi)-SUM(DISTINCT pengambilan.jumlah_pengambilan)) as stok_barang',
            ])
        ->from('barang')
        ->innerJoin('pengambilan', 'pengambilan.id_barang = barang.id_barang')
        ->innerJoin('produksi', 'produksi.id_barang = barang.id_barang')
        ->groupBy(['barang.nama_barang']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('stok_barang', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
