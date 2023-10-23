<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengambilan;

/**
 * PengambilanSearch represents the model behind the search form of `app\models\Pengambilan`.
 */
class PengambilanSearch extends Pengambilan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pengambilan', 'id_barang'], 'integer'],
            [['nama_pengambil', 'jumlah_pengambilan'], 'safe'],
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
        $query = Pengambilan::find()->joinWith('barang');

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
            'id_pengambilan' => $this->id_pengambilan,
        ]);

        $query->andFilterWhere(['like', 'nama_pengambil', $this->nama_pengambil])
            ->andFilterWhere(['like', 'jumlah_pengambilan', $this->jumlah_pengambilan])
            ->andFilterWhere(['like', 'barang.nama_barang', $this->id_barang]);

        return $dataProvider;
    }
}
