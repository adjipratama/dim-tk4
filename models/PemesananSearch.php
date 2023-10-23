<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pemesanan;

/**
 * PemesananSearch represents the model behind the search form of `app\models\Pemesanan`.
 */
class PemesananSearch extends Pemesanan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pesanan', 'id_barang', 'proses'], 'integer'],
            [['nama_pemesan', 'jumlah_pesanan'], 'safe'],
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
        $query = Pemesanan::find()->joinWith('barang');

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
            'id_pesanan' => $this->id_pesanan,
            'proses' => $this->proses,
        ]);

        $query->andFilterWhere(['like', 'nama_pemesan', $this->nama_pemesan])
            ->andFilterWhere(['like', 'jumlah_pesanan', $this->jumlah_pesanan])
            ->andFilterWhere(['like', 'barang.nama_barang', $this->id_barang]);

        return $dataProvider;
    }
}
