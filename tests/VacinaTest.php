<?php
use PHPUnit\Framework\TestCase;

require 'assets/php/VacinaFunctions.php';

class VacinaTest extends TestCase {

    private $mysqli;
    private $vacinaFunctions;

    protected function setUp(): void {
        // simulando a conexão com o banco de dados para os testes
        $this->mysqli = $this->createMock(mysqli::class);
        $this->vacinaFunctions = new VacinaFunctions();
    }

    public function testVerificarSessao() {
        $email = 'simonblack@gmail.com';
        $senha = '1234';
        $this->assertTrue($this->vacinaFunctions->verificarSessao(['email' => $email, 'senha' => $senha]));
        $this->assertFalse($this->vacinaFunctions->verificarSessao([]));
    }

    public function testBuscarPetsDoUsuario() {
        $email = 'simonblack@gmail.com';

        $resultMock = $this->createMock(mysqli_result::class);
        // $resultMock->num_rows = 2;

        $this->mysqli->method('query')->willReturn($resultMock);

        $this->assertSame($resultMock, $this->vacinaFunctions->buscarPetsDoUsuario($email, $this->mysqli));
    }

    public function testRegistrarVacinaSucesso() {
        $dados_validos = [
            'nome' => 'V4 felina',
            'descricao' => '',
            'data' => '2024-01-01',
            'vencimento' => '2027-01-01',
            'pet' => 'Mel'
        ];

        $email = 'simonblack@gmail.com';

        $resultMock = $this->createMock(mysqli_result::class);
        $resultMock->method('fetch_assoc')->willReturn(['id' => 1]);
        // $this->mysqli->method('query')->willReturn($resultMock);

        $resultRegVac = $this->vacinaFunctions->registrarVacina($dados_validos, $email, $this->mysqli);
        
        $this->assertTrue($resultRegVac);
    }


    public function testRegistrarVacinaFalha() {
        $dados_invalidos = [
            'nome' => '',
            'descricao' => '',
            'data' => '',
            'vencimento' => '',
            'pet' => 'Mel'
        ];

        $email = 'simonblack@gmail.com';
        $resultRegVac = $this->vacinaFunctions->registrarVacina($dados_invalidos, $email, $this->mysqli);
        $this->assertFalse($resultRegVac);
    }


    public function testCarregarVacinasDoUsuario() {
        $email = 'simonblack@gmail.com';

        $resultMock = $this->createMock(mysqli_result::class);
        $vacinas = [
            ['id' => 1, 'nome' => 'Vacina A'],
            ['id' => 2, 'nome' => 'Vacina B'],
        ];
        $index = 0;
        $resultMock->method('fetch_assoc')->willReturnCallback(function() use (&$index, $vacinas) {
            if ($index < count($vacinas)) {
                return $vacinas[$index++];
            }
            return null;
        });

        $this->mysqli->method('query')->willReturn($resultMock);
        $resultRegVac =  $this->vacinaFunctions->carregarVacinasDoUsuario($email, $this->mysqli);
        $this->assertSame($resultMock, $resultRegVac);
    }

    public function testRegistrarVacinaSemPets() {
        $dadosVacina = [
            'nome' => 'Vacina Qualquer',
            'descricao' => '',
            'data' => '2024-10-01',
            'vencimento' => '2027-10-01',
            'pet' => ''
        ];
        $email = 'usuario@exemplo.com';

      
        $resultMock = $this->createMock(mysqli_result::class);
        $resultMock->method('fetch_assoc')->willReturn(null);

       
        $this->mysqli->method('query')->willReturn($resultMock);

        $resultado = $this->vacinaFunctions->registrarVacina($dadosVacina, $email, $this->mysqli);
        $this->assertFalse($resultado);
    }
}

?>
