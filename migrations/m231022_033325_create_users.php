<?php

use yii\db\Migration;

/**
 * Class m231022_033325_create_users
 */
class m231022_033325_create_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'authKey' => $this->string(32)->notNull(),
            'password' => $this->string()->notNull(),
            // 'email' => $this->string()->notNull()->unique(),
            'accessToken' => $this->string(32)->notNull(),
            'nama_pegawai' => $this->string(),
            'alamat_pegawai' => $this->string(),
            'hp_pegawai' => $this->string(),
            'id_bagian' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
