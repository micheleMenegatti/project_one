<?php

use yii\db\Schema;
use yii\db\Migration;

class m150805_193336_add_create_update_time extends Migration
{
    public function safeUp()
    {
        $connection = Yii::$app->db;
        $dbSchema = $connection->schema;
        $tables = $dbSchema->tableNames;

        foreach ($tables as $t) {
            if (!strcmp($t, 'migration')) {
                continue;
            }
            $this->addColumn($t, 'create_time', 'time');
            $this->addColumn($t, 'update_time', 'time');
        }

        Yii::$app->cache->flush();
    }
    
    public function safeDown()
    {
        $connection = Yii::$app->db;
        $dbSchema = $connection->schema;
        $tables = $dbSchema->tableNames;

        foreach ($tables as $t) {
            if (!strcmp($t, 'migration')) {
                continue;
            }
            $this->dropColumn($t, 'create_time', 'time');
            $this->dropColumn($t, 'update_time', 'time');
        }

        Yii::$app->cache->flush();
    }
}
