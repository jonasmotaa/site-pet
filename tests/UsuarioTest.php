<?php
use PHPUnit\Framework\TestCase;

require 'assets/php/UsuarioFunctions.php';

class UsuarioTest extends TestCase {

    private $mysqli;

    // criação de um Mock para testes
    protected function setUp(): void {
       
        $this->mysqli = $this->createMock(mysqli::class);
    }

    // teste para verificar sucesso no LogIn
    public function testLoginUsuarioSucesso() {
        $email = 'simonblack@gmail.com';
        $senha = '1234';

        $resultMock = $this->createMock(mysqli_result::class);
        // $resultMock->num_rows = 1;
        $resultMock->method('fetch_assoc')->willReturn(['id' => 1]);

        // $this->mysqli->method('query')->willReturn($resultMock);

        $this->assertTrue(loginUsuario($email, $senha, $this->mysqli));
    }


    // teste para verificar falha no LogIn
    public function testLoginUsuarioFalha() {
        $email = 'simonblack@gmail.com';
        $senha = '12345';

        $resultMock = $this->createMock(mysqli_result::class);
        $resultMock->method('fetch_assoc')->willReturn(null);

        // $this->mysqli->method('query')->willReturn($resultMock);

        $this->assertFalse(loginUsuario($email, $senha, $this->mysqli));
    }

    // teste para verificar sucesso no registro de novo usuário
    public function testCadastroUsuarioSucesso() {
        $nome = 'Simon';
        $email = 'simonblack0@gmail.com';
        $senha = '1234';

        // $this->mysqli->method('query')->willReturn(true);

        $this->assertTrue(cadastrarUsuario($nome, $email, $senha, $this->mysqli));
    }

    // teste para verificar se há duplicação de cadastro (criar um usuário que já existe)
    public function testCadastroUsuarioDuplicado() {
        $nome = 'Simon Black';
        $email = 'simonblack@gmail.com';
        $senha = '1234';

        $this->mysqli->method('query')->willThrowException(new Exception('', 1062));

        $this->assertSame('duplicado', cadastrarUsuario($nome, $email, $senha, $this->mysqli));
    }

    // teste para verificar falha no cadastro (dados incompletos)
    public function testCadastroUsuarioFalha() {
        $nome = 'Simon Black';
        $email = 'simonblack@gmail.com';
        $senha = '';

        // $this->mysqli->method('query')->willReturn(false);

        $this->assertFalse(cadastrarUsuario($nome, $email, $senha, $this->mysqli));
    }
}
?>
