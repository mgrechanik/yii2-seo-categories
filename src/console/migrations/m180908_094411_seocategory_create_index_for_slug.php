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
class m180908_094411_seocategory_create_index_for_slug extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
       
        $this->createIndex('{{%seocategory_slug_index}}', '{{%seocategory}}', 'slug', true);
       
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropIndex('{{%seocategory_slug_index}}');
    }
}
