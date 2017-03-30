<?php

use yii\db\Migration;

class m170328_031013_create_table_brand extends Migration
{
    public function up()
    {
        $this->createTable('brand', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(100)->notNull()->comment('品牌名称'),
            'intro'=>$this->text()->comment('品牌简介'),
            'logo'=>$this->string(255)->notNull()->comment('LOGO'),
            'sort'=>$this->integer()->defaultValue(1)->comment("排序"),
            'status'=>$this->integer()->defaultValue(1)->comment('状态')
        ]);
    }

    public function down()
    {
        $this->dropTable('brand');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
