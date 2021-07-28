<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coordenador */

$this->title = 'Update Coordenador: ' . $model->id_docente;
$this->params['breadcrumbs'][] = ['label' => 'Coordenadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_docente, 'url' => ['view', 'id' => $model->id_docente]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coordenador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
