<?php
use PHPUnit\Framework\TestCase;

require 'assets/php/PetFunctions.php';


class PetTest extends TestCase {

    private $mysqli;

    // criação de um Mock para testes
    protected function setUp(): void {
        $this->mysqli = $this->createMock(mysqli::class);
    }

    // teste para verificar se o calculo da idade do pet está correto
    public function testCalcularIdade() {
        $dataNascimento = '2020-05-10';
        $idade = calcularIdade($dataNascimento);
        $this->assertEquals(4, $idade); 
    }

    // teste para verificar se está retornando o número correto de pets de um usuário.
    public function testObterPets() {
        $email = 'simonblack@gmail.com';

        $resultMock = $this->createMock(mysqli_result::class);
        $resultMock->method('fetch_assoc')->willReturnCallback(function() {
            static $calls = 0;
        
            $data = [
                ['apelido' => 'Mel', 'idade' => '2013-01-01', 'especie' => 'Gato', 'peso' => 4, 'altura' => 60],
                null
            ];
        
            return $data[$calls++] ?? null; 
        });
        
        // $this->mysqli->method('query')->willReturn($resultMock);

        $pets = obterPets($email, $this->mysqli);

        $this->assertCount(1, $pets);
        $this->assertEquals('Rex', $pets[0]['apelido']);
    }

    // teste para verificar sucesso na tentativa de adicionar um pet.
    public function testAdicionarPetSucesso() {
        $nome = 'Rex';
        $idade = '2020-01-01';
        $especie = 'Cachorro';
        $peso = 30;
        $altura = 60;
        $email = 'usuario@exemplo.com';

        $this->mysqli->method('query')->willReturn(true);

        $this->assertTrue(adicionarPet($nome, $idade, $especie, $peso, $altura, $email, $this->mysqli));
    }

     // teste para verificar falha na tentativa de adicionar um pet.
    public function testAdicionarPetFalha() {
        $nome = 'Rex';
        $idade = '2020-01-01';
        $especie = 'Cachorro';
        $peso = 30;
        $altura = 60;
        $email = 'usuario@exemplo.com';

        $this->mysqli->method('query')->willReturn(false);

        $this->assertFalse(adicionarPet($nome, $idade, $especie, $peso, $altura, $email, $this->mysqli));
    }
}
