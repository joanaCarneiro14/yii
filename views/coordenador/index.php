<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CoordenadorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coordenadors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coordenador-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Coordenador', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_docente',
            'id_departamento',
            'data_inicio',
            'data_fim',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
