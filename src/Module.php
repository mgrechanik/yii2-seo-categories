<?php
/**
 * This file is part of the mgrechanik/yii2-seo-categories library
 *
 * @copyright Copyright (c) Mikhail Grechanik <mike.grechanik@gmail.com>
 * @license https://github.com/mgrechanik/yii2-seo-categories/blob/master/LICENCE.md
 * @link https://github.com/mgrechanik/yii2-seo-categories
 */

namespace mgrechanik\yii2seocategory;

use mgrechanik\yii2category\Module as CategoryModule;
use mgrechanik\yii2seocategory\overridden\models\activerecord\SeoCategory;
use mgrechanik\yii2seocategory\overridden\models\form\SeoCategoryForm;


/**
 * 
 * @author Mikhail Grechanik <mike.grechanik@gmail.com>
 * @since 1.0.0
 */
class Module extends CategoryModule
{
    // Overridden properties of the parent modules:
    
    /**
     * {@inheritdoc}
     */    
    public $categoryModelClass = SeoCategory::class;
    
    /**
     * {@inheritdoc}
     */    
    public $categoryFormModelClass = SeoCategoryForm::class;
    
    /**
     * {@inheritdoc}
     */    
    public $categoryIndexView = '@mgrechanik/yii2seocategory/overridden/views/index';

    /**
     * {@inheritdoc}
     */    
    public $categoryFormView = '@mgrechanik/yii2seocategory/overridden/views/_form';
    
    /**
     * {@inheritdoc}
     */    
    public $categoryViewView = '@mgrechanik/yii2seocategory/overridden/views/view';

    /**
     * {@inheritdoc}
     * This is the functionality of the universal module
     */    
    public $takeControllersFromParentModule = true;
    
    // end Overridden properties of the parent modules

    /**
     * @var boolean Whether to use Other meta tags field 
     * If false it will not be shown at seo category form
     */
    public $useMetaOtherField = false;

    /**
     * @var boolean Whether to use Slug field 
     * If false it will not be shown at seo category form
     */    
    public $useSlugField = true;
    
    /**
     * @var string Regular expression to validate slug value if it is used
     */    
    public $slugPattern = '/^([a-z0-9_\-\/\.])+$/iu';
    
    /**
     * @var boolean Whether to show Title column at Categories page
     */    
    public $showTitleColumnAtIndexPage = true;

    /**
     * @var boolean Whether to show Slug column at Categories page
     */        
    public $showSlugColumnAtIndexPage = false;    
    
}