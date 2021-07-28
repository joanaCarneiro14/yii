<?php
use app\models\Coordenador;
 class CoordenadorCest {
        public function test01CriarCoordenador(\FunctionalTester $I)
        {
            $I->amOnRoute('/coordenador/create');
            $I->submitForm('form', [
            'Coordenador[id_docente]' => '2',
            'Coordenador[id_departamento]' => '2',
            'Coordenador[data_inicio]' => '2010-12-02',
            'Coordenador[data_fim]' => '2010-12-02',
            ]);
            $I -> canSee('2');
        }
        public function test02UpdaterCoordenador(\FunctionalTester $I)
        {
           $coordenador = Coordenador::find()->orderBy(['id_docente'=> SORT_DESC])->one();
           $I->amOnRoute('/coordenador/update', ['id' => $coordenador->id_docente]);
           $I->submitForm('form', [
            'Coordenador[id_departamento]' => '2',
            'Coordenador[data_inicio]' => '2010-12-01',
            'Coordenador[data_fim]' => '2010-12-02',
            ]);
            $I -> canSee('2010-12-01'); 
        }

        public function test03ListarCoordenador(\FunctionalTester $I)
     {
        $I->amOnRoute('/coordenador');
        $I -> canSee('2');
     }

     public function test04DeleteCoordenador(\FunctionalTester $I)
     {
        $coordenador = Coordenador::find()->orderBy(['id_docente'=> SORT_DESC])->one();
        $I->amOnRoute('/coordenador/delete', ['id' => $coordenador->id_docente]);
        $I->amOnRoute('/coordenador');
        $I->canSee('id');
     
     }
}