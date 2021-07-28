<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Desporto */

$this->title = 'Update Desporto: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Desportos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="desporto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
