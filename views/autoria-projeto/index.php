<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AutoriaProjetoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Autoria Projetos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autoria-projeto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Autoria Projeto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_autor',
            'id_projeto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
