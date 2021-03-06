<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CoordenadorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coordenador-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_docente') ?>

    <?= $form->field($model, 'id_departamento') ?>

    <?= $form->field($model, 'data_inicio') ?>

    <?= $form->field($model, 'data_fim') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
