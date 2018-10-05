<?php

use yii\db\Migration;

/**
 * Class m181005_105453_add_to_main_to_post
 */
class m181005_105453_add_to_main_to_post extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('post', 'to_main', $this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('post', 'to_main');
    }
}
