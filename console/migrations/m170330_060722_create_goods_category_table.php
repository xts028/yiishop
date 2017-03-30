<?php

use yii\db\Migration;

/**
 * Handles the creation of table `goods_category`.
 */
class m170330_060722_create_goods_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('goods_category', [
            'id' => $this->primaryKey()->comment('ID'),
            'tree' => $this->integer()->notNull()->comment('树'),
            'lft' => $this->integer()->notNull()->comment('左节点'),
            'rgt' => $this->integer()->notNull()->comment('右节点'),
            'depth' => $this->integer()->notNull()->comment('层级'),
            'name' => $this->string()->notNull()->comment('分类名称'),
            'parent_id'=>$this->integer()->notNull()->comment('父分类'),
            'intro'=>$this->text()->comment('简介'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('goods_category');
    }
}
