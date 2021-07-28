<?php
use app\models\Docente;

 class DocenteCest {
     public function test01CriarDocente(\FunctionalTester $I)
     {
         $I->amOnRoute('/docente/create');
         $I->submitForm('form', [
             'Docente[id_utilizador]' => '5',
             'Docente[nome]' => 'Pedro',
             'Docente[id_departamento]' => '2',
         ]);
         $I->canSee('Pedro');
     }

     public function test02UpdateDocente(\FunctionalTester $I)
     {
        $docente = Docente::find()->orderBy(['id_utilizador'=> SORT_DESC])->one();
        $I->amOnRoute('/docente/update', ['id' => $docente->id_utilizador]);
        $I->submitForm('form', [
            'Docente[nome]' => 'Rafaele',
            'Docente[id_departamento]' => '2',
        ]);
        $I->canSee('Rafaele');
     }

     public function test03ListarDocentes(\FunctionalTester $I)
     {
        $I->amOnRoute('/docente');
        $I -> canSee('id');
     }

     public function test04DeleteDocentes(\FunctionalTester $I)
     {
        $docente = Docente::find()->orderBy(['id'=> SORT_DESC])->one();
        $I->amOnRoute('/docente/delete', ['id' => $docente->id]);
        $I->amOnRoute('/docente');
        $I->canSee('id');
     
     }
 }