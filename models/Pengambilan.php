<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengambilan".
 *
 * @property int $id_pengambilan
 * @property string $nama_pengambil
 * @property int $id_barang
 * @property string $jumlah_pengambilan
 */
class Pengambilan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pengambilan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_pengambil', 'id_barang', 'jumlah_pengambilan'], 'required'],
            [['id_barang'], 'integer'],
            [['nama_pengambil'], 'string', 'max' => 32],
            [['jumlah_pengambilan'], 'string', 'max' => 16],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pengambilan' => 'Id Pengambilan',
            'nama_pengambil' => 'Nama Pengambil',
            'id_barang' => 'Id Barang',
            'jumlah_pengambilan' => 'Jumlah Pengambilan',
        ];
    }

    public function getBarang()
    {
        return $this->hasOne(Barang::class, ['id_barang' => 'id_barang']);
    }
}
