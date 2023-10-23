<?php

namespace app\controllers;

use app\models\Pengambilan;
use app\models\PengambilanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PengambilanController implements the CRUD actions for Pengambilan model.
 */
class PengambilanController extends Controller
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
     * Lists all Pengambilan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PengambilanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pengambilan model.
     * @param int $id_pengambilan Id Pengambilan
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_pengambilan)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_pengambilan),
        ]);
    }

    /**
     * Creates a new Pengambilan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pengambilan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_pengambilan' => $model->id_pengambilan]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pengambilan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_pengambilan Id Pengambilan
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_pengambilan)
    {
        $model = $this->findModel($id_pengambilan);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_pengambilan' => $model->id_pengambilan]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pengambilan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_pengambilan Id Pengambilan
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_pengambilan)
    {
        $this->findModel($id_pengambilan)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pengambilan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_pengambilan Id Pengambilan
     * @return Pengambilan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_pengambilan)
    {
        if (($model = Pengambilan::findOne(['id_pengambilan' => $id_pengambilan])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
