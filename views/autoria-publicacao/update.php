<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AutoriaPublicacao */

$this->title = 'Update Autoria Publicacao: ' . $model->id_publicacao;
$this->params['breadcrumbs'][] = ['label' => 'Autoria Publicacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_publicacao, 'url' => ['view', 'id' => $model->id_publicacao]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="autoria-publicacao-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
