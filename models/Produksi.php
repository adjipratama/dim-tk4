<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "produksi".
 *
 * @property int $id_produksi
 * @property int $id_pesanan
 * @property int $id_barang
 * @property string $jumlah_produksi
 * @property string $lead_time
 */
class Produksi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'produksi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pesanan', 'id_barang', 'jumlah_produksi', 'lead_time'], 'required'],
            [['id_pesanan', 'id_barang'], 'integer'],
            [['jumlah_produksi'], 'string', 'max' => 16],
            [['lead_time'], 'string', 'max' => 4],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_produksi' => 'Id Produksi',
            'id_pesanan' => 'Id Pesanan',
            'id_barang' => 'Id Barang',
            'jumlah_produksi' => 'Jumlah Produksi',
            'lead_time' => 'Lead Time',
        ];
    }

    public function getBarang()
    {
        return $this->hasOne(Barang::class, ['id_barang' => 'id_barang']);
    }
    
    public function getPemesanan()
    {
        return $this->hasOne(Pemesanan::class, ['id_pesanan' => 'id_pesanan']);
    }
}
