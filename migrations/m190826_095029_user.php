<?php

use yii\db\Migration;

/**
 * Class m190826_095029_user
 */
class m190826_095029_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $userTable = 'user';
        if (Yii::$app->db->getTableSchema($userTable, true) !== null)
        {
            $this->dropTable($userTable);
        }

        $this->createTable($userTable, [
            'id' => $this->primaryKey(8),
            'active' => $this->boolean(),
            'username' => $this->string(16),
            'email' => $this->string(32),
            'name' => $this->string(16),
            'middle_name' => $this->string(16),
            'surname' => $this->string(16),
            'birthday' => $this->dateTime(),
            'password' => $this->string(32),
            'access_token' => $this->string(32),
            'auth_key' => $this->string(32),
        ], 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB');

        $this->insert($userTable, [
            'active' => 1,
            'email' => 'ya.suhanek@ya.ru',
            'username' => 'admin',
            'name' => 'Ярослав',
            'middle_name' => 'Михайлович',
            'surname' => 'Суханек',
            'birthday' => '1993-03-29 10:30:00',
            'password' => 'admin',
            'access_token' => hash('md5', uniqid()),
            'auth_key' => hash('md5', uniqid()),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190826_095029_user cannot be reverted.\n";
        $this->delete('user', ['username' => 'admin']);
        $this->dropTable('user');
        return true;
    }
}
