<?php
/**
 * This file is part of the mgrechanik/yii2-seo-categories library
 *
 * @copyright Copyright (c) Mikhail Grechanik <mike.grechanik@gmail.com>
 * @license https://github.com/mgrechanik/yii2-seo-categories/blob/master/LICENCE.md
 * @link https://github.com/mgrechanik/yii2-seo-categories
 */

use yii\db\Migration;

/**
 * Handles the creation of table `seocategory`.
 */
class m180908_094410_create_seocategory_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%seocategory}}', [
            'id' => $this->primaryKey(),
            'path' => $this->string(255)->notNull()->defaultValue('')->comment('Path to parent node'),
            'level' => $this->integer(4)->notNull()->defaultValue(1)->comment('Level of the node in the tree'),
            'weight' => $this->integer(11)->notNull()->defaultValue(1)->comment('Weight among siblings'),
            'name' => $this->string()->notNull()->comment('Name'),
            'slug' => $this->string(255)->comment('Slug'),
            'title' => $this->string(255)->notNull()->comment('Title'),
            'meta_description' => $this->string(255)->comment('Meta description'),
            'meta_keywords' => $this->string(255)->comment('Meta keywords'),
            'meta_other' => $this->text()->comment('Other meta data'),
        ]);
        
        $this->createIndex('{{%seocategory_path_index}}', '{{%seocategory}}', 'path');
        $this->createIndex('{{%seocategory_level_index}}', '{{%seocategory}}', 'level');
        $this->createIndex('{{%seocategory_weight_index}}', '{{%seocategory}}', 'weight');        
        
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%seocategory}}');
    }
}
