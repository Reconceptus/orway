<?php

use yii\db\Migration;

/**
 * Class m180809_084759_create_feedback
 */
class m180809_084759_create_requests extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('request', [
            'id'           => $this->primaryKey()->unsigned(),
            'name'         => $this->string(),
            'contact_info' => $this->string(),
            'message'      => $this->text(),
            'accept'       => $this->smallInteger(1)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('request');
    }

}
