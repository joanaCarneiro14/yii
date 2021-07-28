<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Diretor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="diretor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_docente')->textInput() ?>

    <?= $form->field($model, 'id_escola')->textInput() ?>

    <?= $form->field($model, 'data_inicio')->textInput() ?>

    <?= $form->field($model, 'data_fim')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
