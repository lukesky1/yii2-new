<?php

use yii\db\Migration;

class m170427_173757_create_table_album extends Migration
{

    public function up()
    {
        $this->createTable('album', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'access' => $this->smallInteger()->notNull(),
            'name' => $this->string()->notNull(),
            'sort_order' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable('album');
    }

}
