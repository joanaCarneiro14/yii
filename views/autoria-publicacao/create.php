<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AutoriaPublicacao */

$this->title = 'Create Autoria Publicacao';
$this->params['breadcrumbs'][] = ['label' => 'Autoria Publicacaos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autoria-publicacao-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
