<?php
use app\models\AutoriaPublicacao;
 class AutoriaPublicacaoCest {
     public function test01CriarAutoriaPublicacao(\FunctionalTester $I)
     {
         $I->amOnRoute('/autoria-publicacao/create');
         $I->submitForm('form', [
             'AutoriaPublicacao[id_autor]' => '2',
             'AutoriaPublicacao[id_publicacao]' => '3',
         ]);
         $I->canSee('2');
     }

     public function test02UpdateAutoriaPublicacao(\FunctionalTester $I)
     {
        $autoriapublicacao = AutoriaPublicacao::find()->orderBy(['id_publicacao'=> SORT_DESC])->one();
        $I->amOnRoute('/autoria-publicacao/update', ['id'=> $autoriapublicacao->id_publicacao]);
        $I->submitForm('form', [
            'AutoriaPublicacao[id_autor]' => '2',
            'AutoriaPublicacao[id_publicacao]' => '4',
        ]);
        $I->canSee('4');
     }
     public function test03ListarAutoriaPublicacao(\FunctionalTester $I)
     {
        $I->amOnRoute('/autoria-publicacao');
        $I -> canSee('2');
     }

     public function test04DeleteAutoriaPublicacao(\FunctionalTester $I)
     {
        $autoriapublicacao = AutoriaPublicacao::find()->orderBy(['id_publicacao'=> SORT_DESC])->one();
        $I->amOnRoute('/autoria-publicacao/delete', ['id' => $autoriapublicacao->id_publicacao]);
        $I->amOnRoute('/autoria-publicacao');
        $I->canSee('id');
     
     }
 }