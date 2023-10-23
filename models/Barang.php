<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "barang".
 *
 * @property int $id_barang
 * @property string $nama_barang
 */
class Barang extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_barang'], 'required'],
            [['nama_barang'], 'string', 'max' => 32],
            [['nama_barang'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_barang' => 'Id Barang',
            'nama_barang' => 'Nama Barang',
        ];
    }

    public function getPemesanan()
    {
        return $this->hasMany(Pemesanan::class, ['id_barang' => 'id_barang']);
    }

    public function getPengambilan()
    {
        return $this->hasMany(Pengambilan::class, ['id_barang' => 'id_barang']);
    }

    public function getProduksi()
    {
        return $this->hasMany(Produksi::class, ['id_barang' => 'id_barang']);
    }
}
