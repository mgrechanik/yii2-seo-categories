<?php
/**
 * This file is part of the mgrechanik/yii2-seo-categories library
 *
 * @copyright Copyright (c) Mikhail Grechanik <mike.grechanik@gmail.com>
 * @license https://github.com/mgrechanik/yii2-seo-categories/blob/master/LICENCE.md
 * @link https://github.com/mgrechanik/yii2-seo-categories
 */

namespace mgrechanik\yii2seocategory\overridden\models\form;

use Yii;
use mgrechanik\yii2category\ui\forms\backend\BaseCategoryForm;
use mgrechanik\yii2seocategory\overridden\models\activerecord\SeoCategory;
use yii\db\ActiveQuery;

/**
 * This is the Form which fits [[SeoCategory]] Active Record model.
 * 
 * It is implementation of [[BaseCategoryForm]] with additional 
 * 'name' and seo  fields added to it.
 * 
 * @author Mikhail Grechanik <mike.grechanik@gmail.com>
 * @since 1.0.0
 */
class SeoCategoryForm extends BaseCategoryForm
{
    // custom form fields:
    
    public $name;
    
    public $title;
    
    public $slug;    
    
    public $meta_description;
    
    public $meta_keywords;
    
    public $meta_other;

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        $useSlug = $this->module->useSlugField;
        $useMetaOther = $this->module->useMetaOtherField;
        
        $scenarios = parent::scenarios();
        foreach ($scenarios as $key => $val) {
            $scenarios[$key][] = 'name';
            $scenarios[$key][] = 'title';
            $scenarios[$key][] = 'meta_description';
            $scenarios[$key][] = 'meta_keywords';
            if ($useSlug) {
                $scenarios[$key][] = 'slug';
            }
            if ($useMetaOther) {
                $scenarios[$key][] = 'meta_other';
            }            
        }
        return $scenarios;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        $useSlug = $this->module->useSlugField;
        $useMetaOther = $this->module->useMetaOtherField;        
        $rules =  array_merge(parent::rules(), [
            [['name', 'title'], 'required'],
            [['name', 'title', 'meta_description', 'meta_keywords'], 'string', 'max' => 255],
        ]);
        if ($useSlug) {
            $rules[] = [['slug'], 'string', 'max' => 255];
            $rules[] = [['slug'], 'required'];
            $rules[] = [['slug'], 'match', 'pattern' => $this->module->slugPattern];
            $rules[] = [
                ['slug'], 
                'unique', 
                'targetClass' => SeoCategory::class,
                'targetAttribute' => 'slug',
                'filter' => function(ActiveQuery $query) {
                    if (!$this->model->isNewRecord) {
                        $query->andWhere(['!=', 'id', $this->model->id]);
                    }
                }
            ];
        }
        if ($useMetaOther) {
            $rules[] = [['meta_other'], 'string'];
        }        
        return $rules;
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