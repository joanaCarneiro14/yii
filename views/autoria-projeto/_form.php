<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AutoriaProjeto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="autoria-projeto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_autor')->textInput() ?>

    <?= $form->field($model, 'id_projeto')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
