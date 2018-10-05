<?php

use yii\db\Migration;

/**
 * Class m181005_124501_add_to_footer_to_page
 */
class m181005_124501_add_to_footer_to_page extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('page', 'to_footer', $this->boolean());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('page', 'to_footer');
    }
}
