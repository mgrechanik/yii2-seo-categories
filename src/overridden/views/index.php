<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ArrayDataProvider */

$this->title = Yii::t('yii2seocategory', 'SEO categories');
$this->params['breadcrumbs'][] = $this->title;
$module = $this->context->module;
?>
<div class="category-index">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('yii2category', 'Create a category'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php
$columns = [
    ['class' => 'yii\grid\SerialColumn'],

    'id',
    [   // The field to display name of the category item  
        // along with the indent to show it's place in the category hierarchy
        'label' => Yii::t('yii2category', 'Name'),
        'value' => function($model, $key, $index, $column) use ($module) {
            return (is_callable($module->indentedNameCreatorCallback)) ?
                call_user_func($module->indentedNameCreatorCallback, $model, $key, $index, $column) 
                : '';
        },
        'format' => 'raw'
    ],
    [
        'attribute' => 'level',
        'label' => Yii::t('yii2category', 'Level')
    ],
    ['class' => 'yii\grid\ActionColumn']
];  
$skip = 3;        
if ($module->showTitleColumnAtIndexPage) {
    array_splice($columns, $skip, 0,     [
        ['attribute' => 'title', 'label' => Yii::t('yii2seocategory', 'Title tag')]
    ]);
    $skip++;
}        
if ($module->useSlugField && $module->showSlugColumnAtIndexPage) {
    array_splice($columns, $skip, 0,     [
        ['attribute' => 'slug', 'label' => Yii::t('yii2seocategory', 'Slug')]
    ]);
}        
?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $columns,
    ]); ?>
</div>

