<?php
use app\models\AutoriaProjeto;

 class AutoriaProjetoCest {
     public function test01CriarAutoriaProjeto(\FunctionalTester $I)
     {
         $I->amOnRoute('/autoria-projeto/create');
         $I->submitForm('form', [
             'AutoriaProjeto[id_autor]' => '2',
             'AutoriaProjeto[id_projeto]' => '3',
         ]);
         $I->canSee('2');
     }

     public function test02UpdateAutoriaProjeto(\FunctionalTester $I)
     {
        $autoriaprojeto= AutoriaProjeto::find()->orderBy(['id_projeto'=> SORT_DESC])->one();
        $I->amOnRoute('/autoria-projeto/update', ['id'=> $autoriaprojeto->id_projeto]);
        $I->submitForm('form', [
            'AutoriaProjeto[id_autor]' => '2',
            'AutoriaProjeto[id_projeto]' => '4',
        ]);
        $I->canSee('4');
     }

     public function test03ListarAutoriaProjeto(\FunctionalTester $I)
     {
        $I->amOnRoute('/autoria-publicacao');
        $I -> canSee('2');
     }

     public function test04DeleteAutoriaProjeto(\FunctionalTester $I)
     {
        $autoriaprojeto = AutoriaProjeto::find()->orderBy(['id_projeto'=> SORT_DESC])->one();
        $I->amOnRoute('/autoria-projeto/delete', ['id' => $autoriaprojeto->id_projeto]);
        $I->amOnRoute('/autoria-projeto');
        $I->canSee('id');
     
     }
 }