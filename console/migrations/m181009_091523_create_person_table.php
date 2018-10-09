<?php

use yii\db\Migration;

/**
 * Handles the creation of table `person`.
 */
class m181009_091523_create_person_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('person', [
            'id'    => $this->primaryKey()->unsigned(),
            'image' => $this->string()
        ]);

        $this->createTable('personLang', [
            'id'          => $this->primaryKey()->unsigned(),
            'name'        => $this->string()->notNull(),
            'position'    => $this->string(),
            'description' => $this->string(600),
            'language'    => $this->string(6),
            'person_id'   => $this->integer()->unsigned()
        ]);

        $this->addForeignKey('FK_personLang_person', 'personLang', 'person_id', 'person', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_personLang_person', 'personLang');
        $this->dropTable('personLang');
        $this->dropTable('person');
    }
}
