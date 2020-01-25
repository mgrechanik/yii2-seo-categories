<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $categoryForm mgrechanik\yii2seocategory\overridden\models\form\SeoCategoryForm */

$modelClass = get_class($categoryForm->model);
$submitLabel = $categoryForm->model->isNewRecord ? Yii::t('yii2category', 'Create') : Yii::t('yii', 'Update');

?>

<div class="category-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($categoryForm, 'name')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($categoryForm, 'title')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($categoryForm, 'meta_description')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($categoryForm, 'meta_keywords')->textInput(['maxlength' => 255]) ?>
    <?php
        if ($categoryForm->isAttributeSafe('slug')) {
            print $form->field($categoryForm, 'slug')->textInput(['maxlength' => 255]);
        }
        if ($categoryForm->isAttributeSafe('meta_other')) {
            print $form->field($categoryForm, 'meta_other')->textarea(['cols' => 100, 'rows' => 4]);
        }        
    ?>
    <div class="row">
        <div class="col-xs-6">
    <?= $form->field($categoryForm, 'newParent')->listBox($categoryForm->getPositionItems(), ['encode' => false, 'encodeSpaces' => true, 'size' => 12]) ?>
        </div>
        <div class="col-xs-6">
            <?= $form->field($categoryForm, 'operation')->dropDownList($categoryForm->getOperationItems()) ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton($submitLabel, ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
