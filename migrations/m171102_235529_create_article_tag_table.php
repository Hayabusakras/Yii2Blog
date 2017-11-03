<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article_tag`.
 */
class m171102_235529_create_article_tag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('article_tag', [
            'id' => $this->primaryKey(),
            'article_id'=>$this->integer(),
            'tag_id'=>$this->integer()
        ]);

        $this->createIndex(
            'tag_article_article_id',
            'article_tag',
            'article_id'
        );

        $this->addForeignKey(
            'tag_article_article_id',
            'article_tag',
            'article_id',
            'article',
            'id',
            'CASCADE'
        );

        $this->createIndex(
            'idx_tag_id',
            'article_tag',
            'tag_id'
        );

        $this->addForeignKey(
            'fk-tag_id',
            'article_tag',
            'tag_id',
            'tag',
            'id',
            'CASCADE'
        );
    }


    public function down()
    {
        $this->dropTable('article_tag');
    }
}
