<?php
use app\models\Publicacao;
 class PublicacoCest {
     public function test01CriarPublicacao(\FunctionalTester $I)
     {
         $I->amOnRoute('/publicacao/create');
         $I->submitForm('form', [
             'Publicacao[titulo]' => 'XPTO',
             'Publicacao[data_finalizacao]' => '2010-02-12',
             'Publicacao[local_realizacao]' => 'porto',
             'Publicacao[tipo]' => 'cientifico',
         ]);
         $I->canSee('XPTO');
     }

     public function test02UpdatePublicacao(\FunctionalTester $I)
     {
        $publicacao = Publicacao::find()->orderBy(['id'=> SORT_DESC])->one();
        $I->amOnRoute('/publicacao/update', ['id' => $publicacao->id]);
        $I->submitForm('form', [
            'Publicacao[titulo]' => 'XPTOOO',
            'Publicacao[data_finalizacao]' => '2010-02-12',
            'Publicacao[local_realizacao]' => 'porto',
            'Publicacao[tipo]' => 'cientifico',
        ]);
        $I->canSee('XPTOOO');
     }

     public function test03ListarPublicacao(\FunctionalTester $I)
     {
        $I->amOnRoute('/publicacao');
        $I -> canSee('XPTO');
     }

     public function test04DeletePublicacao(\FunctionalTester $I)
     {
        $publicacao = Publicacao::find()->orderBy(['id'=> SORT_DESC])->one();
        $I->amOnRoute('/publicacao/delete', ['id' => $publicacao->id]);
        $I->amOnRoute('/publicacao');
        $I->canSee('id');
     
     }
 }