<?php

use yii\db\Migration;

class m150207_210500_i18n_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%translate_source_message}}', [
            'id' => $this->primaryKey(),
            'category' => $this->string(),
            'message' => $this->text(),
        ], $tableOptions);

        $this->createTable('{{%translate_message}}', [
            'id' => $this->integer()->notNull(),
            'language' => $this->string(16)->notNull(),
            'translation' => $this->text(),
        ], $tableOptions);

        $this->addPrimaryKey('pk_message_id_language', '{{%translate_message}}', ['id', 'language']);
        $this->addForeignKey('fk_message_source_message', '{{%translate_message}}', 'id', '{{%translate_source_message}}', 'id', 'CASCADE', 'RESTRICT');
        $this->createIndex('idx_source_message_category', '{{%translate_source_message}}', 'category');
        $this->createIndex('idx_message_language', '{{%translate_message}}', 'language');
    }

    public function down()
    {
        $this->dropForeignKey('fk_message_source_message', '{{%translate_message}}');
        $this->dropTable('{{%translate_message}}');
        $this->dropTable('{{%translate_source_message}}');
    }
}
