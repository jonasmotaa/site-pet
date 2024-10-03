<?php
use PHPUnit\Framework\TestCase;

require 'assets/php/UsuarioFunctions.php';

class UsuarioTest extends TestCase {

    private $mysqli;

    protected function setUp(): void {
        $this->mysqli = $this->createMock(mysqli::class);
    }

    public function testLoginUsuarioSucesso() {
        $email = 'simonblack@gmail.com';
        $senha = '1234';

        $resultMock = $this->createMock(mysqli_result::class);
        $resultMock->num_rows = 1;

        $this->mysqli->method('query')->willReturn($resultMock);

        $this->assertTrue(loginUsuario($email, $senha, $this->mysqli));
    }

    public function testLoginUsuarioFalha() {
        $email = 'simonblack@gmail.com';
        $senha = '1234';

        $resultMock = $this->createMock(mysqli_result::class);
        $resultMock->num_rows = 0;

        $this->mysqli->method('query')->willReturn($resultMock);

        $this->assertFalse(loginUsuario($email, $senha, $this->mysqli));
    }

    public function testCadastroUsuarioSucesso() {
        $nome = 'Simon Black';
        $email = 'simonblack@gmail.com';
        $senha = '1234';

        $this->mysqli->method('query')->willReturn(true);

        $this->assertTrue(cadastrarUsuario($nome, $email, $senha, $this->mysqli));
    }

    public function testCadastroUsuarioDuplicado() {
        $nome = 'Simon Black';
        $email = 'simonblack@gmail.com';
        $senha = '1234';

        $this->mysqli->method('query')->willThrowException(new Exception('', 1062));

        $this->assertSame('duplicado', cadastrarUsuario($nome, $email, $senha, $this->mysqli));
    }

    public function testCadastroUsuarioFalha() {
        $nome = 'Simon Black';
        $email = 'simonblack@gmail.com';
        $senha = '';

        $this->mysqli->method('query')->willReturn(false);

        $this->assertFalse(cadastrarUsuario($nome, $email, $senha, $this->mysqli));
    }
}
?>
