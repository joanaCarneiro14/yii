<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\AutoriaProjeto */

$this->title = 'Create Autoria Projeto';
$this->params['breadcrumbs'][] = ['label' => 'Autoria Projetos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autoria-projeto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
