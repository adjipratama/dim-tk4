<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Produksi;

/**
 * ProduksiSearch represents the model behind the search form of `app\models\Produksi`.
 */
class ProduksiSearch extends Produksi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_produksi', 'id_pesanan', 'id_barang'], 'integer'],
            [['jumlah_produksi', 'lead_time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Produksi::find()->joinWith('barang')->joinWith('pemesanan');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_produksi' => $this->id_produksi,
            'id_pesanan' => $this->id_pesanan,
            'id_barang' => $this->id_barang,
        ]);

        $query->andFilterWhere(['like', 'jumlah_produksi', $this->jumlah_produksi])
            ->andFilterWhere(['like', 'lead_time', $this->lead_time]);

        return $dataProvider;
    }
}
