<?php

use app\models\Diretor;

 class DiretorCest {
     public function test01CriarDiretor(\FunctionalTester $I)
     {
         $I->amOnRoute('/diretor/create');
         $I->submitForm('form', [
             'Diretor[id_docente]' => '10',
             'Diretor[id_escola]' => '2',
             'Diretor[data_incio]' => '2010-02-12',
             'Diretor[data_fim]' => '2010-03-12',
         ]);
         $I->canSee('10');
     }

     public function test02UpdateDiretor(\FunctionalTester $I)
     {
        $diretor = Diretor::find()->orderBy(['id_docente'=> SORT_DESC])->one();
        $I->amOnRoute('/diretor/update', ['id' => $diretor->id_docente]);
        $I->submitForm('form', [
            'Diretor[id_escola]' => '3',
            'Diretor[data_incio]' => '2010-02-12',
            'Diretor[data_fim]' => '2010-03-12',
        ]);
        $I->canSee('3');
     }

     public function test03ListarDiretor(\FunctionalTester $I)
     {
        $I->amOnRoute('/diretor');
        $I -> canSee('id');
     }

     public function test04DeleteDiretor(\FunctionalTester $I)
     {
        $diretor = Diretor::find()->orderBy(['id_docente'=> SORT_DESC])->one();
        $I->amOnRoute('/diretor/delete', ['id' => $diretor->id_docente]);
        $I->amOnRoute('/diretor');
        $I->canSee('id');
     
     }
 }