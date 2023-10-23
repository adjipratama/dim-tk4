<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bagian".
 *
 * @property int $id_bagian
 * @property string $nama_bagian
 */
class Bagian extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bagian';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_bagian'], 'required'],
            [['nama_bagian'], 'string', 'max' => 16],
            [['nama_bagian'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_bagian' => 'Id Bagian',
            'nama_bagian' => 'Nama Bagian',
        ];
    }

    public function getUsers()
    {
        return $this->hasMany(Users::class, ['id_bagian' => 'id_bagian']);
    }
}
