<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m181118_061627_add_nestedsets_columns
 */
class m181118_061627_add_nestedsets_columns extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('categories', 'tree', Schema::TYPE_INTEGER.' NULL');
        $this->addColumn('categories', 'lft', Schema::TYPE_INTEGER.' NOT NULL');
        $this->addColumn('categories', 'rgt', Schema::TYPE_INTEGER.' NOT NULL');
        $this->addColumn('categories', 'depth', Schema::TYPE_INTEGER.' NOT NULL');
        $this->createIndex('lft', 'categories', ['tree', 'lft', 'rgt']);
        $this->createIndex('rgt', 'categories', ['tree', 'rgt']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('lft', 'categories');
        $this->dropIndex('rgt', 'categories');

        $this->dropColumn('categories', 'tree');
        $this->dropColumn('categories', 'lft');
        $this->dropColumn('categories', 'rgt');
        $this->dropColumn('categories', 'depth');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181118_061627_add_nestedsets_columns cannot be reverted.\n";

        return false;
    }
    */
}
