<?php

use yii\db\Migration;

/**
 * Handles the creation of table `config`.
 */
class m181009_125523_create_config_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('config', [
            'id'    => $this->primaryKey(),
            'name'  => $this->string(),
            'slug'  => $this->string(),
            'value' => $this->text()
        ]);

        $values = [
            ['Show language selector (1 - yes, 0 - no)', 'show_lang_selector', '0'],
            ['Admin email for notifications', 'adminEmail', 'web.requests@orway.com'],
            ['Additional admin email', 'adminEmail2', 'iva@natrix.com.ru'],
        ];

        Yii::$app->db->createCommand()->batchInsert('config', ['name', 'slug', 'value'], $values)->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('config');
    }
}
