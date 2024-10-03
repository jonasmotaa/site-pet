<?php
use PHPUnit\Framework\TestCase;

require 'assets/php/PetFunctions.php';


class PetTest extends TestCase {

    private $mysqli;

    protected function setUp(): void {
        $this->mysqli = $this->createMock(mysqli::class);
    }

    public function testCalcularIdade() {
        $dataNascimento = '2020-05-10';
        $idade = calcularIdade($dataNascimento);
        $this->assertEquals(4, $idade); 
    }

    public function testObterPets() {
        $email = 'simonblack@gmail.com';

        $resultMock = $this->createMock(mysqli_result::class);
        $resultMock->method('fetch_assoc')->willReturnCallback(function() {
            static $calls = 0;
        
            $data = [
                ['apelido' => 'Rex', 'idade' => '2019-01-10', 'especie' => 'Cachorro', 'peso' => 20, 'altura' => 50],
                null
            ];
        
            return $data[$calls++] ?? null; 
        });

        //$this->mysqli->method('query')->willReturn($resultMock);

        $pets = obterPets($email, $this->mysqli);

        $this->assertCount(1, $pets);
        $this->assertEquals('Rex', $pets[0]['apelido']);
    }

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
