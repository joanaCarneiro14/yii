<?php
use app\models\Departamento;
 class DepartamentoCest {
        public function test01CriarDepartamento(\FunctionalTester $I)
        {
            $I->amOnRoute('/departamento/create');
            $I->submitForm('form', [
            'Departamento[id_escola]' => '2',
            'Departamento[nome]' => 'xptoooo',
            ]);
            $I -> canSee('2');
        }
        public function test02UpdaterDepartamento(\FunctionalTester $I)
        {
           $departamento = Departamento::find()->orderBy(['id'=> SORT_DESC])->one();
           $I->amOnRoute('/departamento/update', ['id' => $departamento->id]);
           $I->submitForm('form', [
            'Departamento[id_escola]' => '2',
            'Departamento[nome]' => 'xpto',
            ]);
            $I -> canSee('xpto');
        }

    public function test03ListarDepartamento(\FunctionalTester $I)
     {
        $I->amOnRoute('/projeto');
        $I -> canSee('2');
     }

     public function test04DeleteDepartamento(\FunctionalTester $I)
     {
        $departamento = Departamento::find()->orderBy(['id'=> SORT_DESC])->one();
        $I->amOnRoute('/departamento/delete', ['id' => $departamento->id]);
        $I->amOnRoute('/departamento');
        $I->canSee('2');
     
     }
}