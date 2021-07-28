<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AutoriaProjeto */

$this->title = 'Update Autoria Projeto: ' . $model->id_projeto;
$this->params['breadcrumbs'][] = ['label' => 'Autoria Projetos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_projeto, 'url' => ['view', 'id' => $model->id_projeto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="autoria-projeto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
