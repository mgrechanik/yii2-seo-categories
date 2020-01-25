<?php
/**
 * This file is part of the mgrechanik/yii2-seo-categories library
 *
 * @copyright Copyright (c) Mikhail Grechanik <mike.grechanik@gmail.com>
 * @license https://github.com/mgrechanik/yii2-seo-categories/blob/master/LICENCE.md
 * @link https://github.com/mgrechanik/yii2-seo-categories
 */

namespace mgrechanik\yii2seocategory\tools;

use yii\base\BootstrapInterface;

/**
 * Bootstrap class for yii2 seo category extension
 * 
 * @author Mikhail Grechanik <mike.grechanik@gmail.com>
 * @since 1.0.0
 */
class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $i18n = $app->i18n;
        $i18n->translations['yii2seocategory'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@mgrechanik/yii2seocategory/resources/i18n',
        ];
    }
}

