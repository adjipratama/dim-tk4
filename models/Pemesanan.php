<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pemesanan".
 *
 * @property int $id_pesanan
 * @property string $nama_pemesan
 * @property int $id_barang
 * @property string $jumlah_pesanan
 * @property int $proses
 */
class Pemesanan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemesanan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pemesan', 'id_barang', 'jumlah_pesanan'], 'required'],
            [['id_barang', 'proses'], 'integer'],
            [['nama_pemesan'], 'string', 'max' => 32],
            [['jumlah_pesanan'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pesanan' => 'Id Pesanan',
            'nama_pemesan' => 'Nama Pemesan',
            'id_barang' => 'Id Barang',
            'jumlah_pesanan' => 'Jumlah Pesanan',
            'proses' => 'Proses',
        ];
    }

    public function getBarang()
    {
        return $this->hasOne(Barang::class, ['id_barang' => 'id_barang']);
    }

    public function getProduksi()
    {
        return $this->hasMany(Produksi::class, ['id_pesanan' => 'id_pesanan']);
    }
}
