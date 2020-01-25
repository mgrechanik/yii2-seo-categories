<?php
/**
 * This file is part of the mgrechanik/yii2-seo-categories library
 *
 * @copyright Copyright (c) Mikhail Grechanik <mike.grechanik@gmail.com>
 * @license https://github.com/mgrechanik/yii2-seo-categories/blob/master/LICENCE.md
 * @link https://github.com/mgrechanik/yii2-seo-categories
 */

namespace mgrechanik\yii2seocategory\overridden\models\activerecord;

use Yii;
use mgrechanik\yii2category\models\BaseCategory;

/**
 * This is the model class for table "{{%seocategory}}".
 *
 * @property int $id
 * @property string $path Path to parent node
 * @property int $level Level of the node in the tree
 * @property int $weight Weight among siblings
 * @property string $name Name
 * @property string $slug Slug
 * @property string $title Title
 * @property string $meta_description Meta description
 * @property string $meta_keywords Meta keywords
 * @property string $meta_other Other meta data
 * 
 * @author Mikhail Grechanik <mike.grechanik@gmail.com>
 * @since 1.0.0
 */
class SeoCategory extends BaseCategory
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%seocategory}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['name', 'title'], 'required'],
            [['meta_other'], 'string'],
            [['name', 'slug', 'title', 'meta_description', 'meta_keywords'], 'string', 'max' => 255],
            [['slug'], 'unique'],        
        ]);        
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'name' => Yii::t('yii2seocategory', 'Name'),
            'slug' => Yii::t('yii2seocategory', 'Slug'),
            'title' => Yii::t('yii2seocategory', 'Title tag'),
            'meta_description' => Yii::t('yii2seocategory', 'Meta description'),
            'meta_keywords' => Yii::t('yii2seocategory', 'Meta keywords'),
            'meta_other' => Yii::t('yii2seocategory', 'Other meta tags'),
        ]);        
    }
}
