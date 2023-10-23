<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $authKey
 * @property string $password
 * @property string $accessToken
 * @property string|null $nama_pegawai
 * @property string|null $alamat_pegawai
 * @property string|null $hp_pegawai
 * @property int|null $id_bagian
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['id_bagian'], 'integer'],
            [['username', 'password', 'nama_pegawai', 'alamat_pegawai', 'hp_pegawai'], 'string', 'max' => 255],
            [['authKey', 'accessToken'], 'string', 'max' => 32],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'authKey' => 'Auth Key',
            'password' => 'Password',
            'accessToken' => 'Access Token',
            'nama_pegawai' => 'Nama Pegawai',
            'alamat_pegawai' => 'Alamat Pegawai',
            'hp_pegawai' => 'Hp Pegawai',
            'id_bagian' => 'Id Bagian',
        ];
    }

    public function getBagian()
    {
        return $this->hasOne(Bagian::class, ['id_bagian' => 'id_bagian']);
    }
}
