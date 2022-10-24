<?php
$titulos = "Novo Usuarios";
include "./cabecalho.php";

if (isset ($_POST)&& !empty($_POST))
{
    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";

    include "./conexao.php";
    $nome = $_POST["nome"];
    $login = $_POST["login"];
    $senha = hash("sha512", $_POST["senha"]);
    if(isset($_POST["ativo"])&&$_POST["ativo"]== "on")
    {
        $ativo = 1;
    }else
    {
        $ativo = 0;
    }

    $query = "insert into usuarios (nome, login, senha, ativo)";
    $query.="values('$nome', '$login', '$senha', '$ativo')";
    $resultado = mysqli_query($conexao,$query);
    if($resultado){
        header("Location: ./usuarios.php");
        exit();
        ?>
        <div class="alert alert-success">
            Cadastrado com sucesso
    </div>
    <?php
    }

}

?>

<div class = "row">
    <div class ="offset-4 col-md-4">
        <h2> Cadastro de Usuarios</h2>
        <form action="./usuarioscreate.php" method="post">
            <div class = "form-group">
                <label>Nome</label>
                <input type="text" 
                       name="nome" 
                       class="form-control"/>
            </div>

            <div class = "form-group">
                <label>Login</label>
                <input type="text" 
                       name="login" 
                       class="form-control"/>
            </div>

            <div class = "form-group">
                <label>Senha</label>
                <input type="password" 
                       name="senha" 
                       class="form-control"/>
            </div>

            <div class="form-group">
                Ativo: <input type="checkbox"
                              name="ativo"
                              class="form-check" />
            </div>

            <div class = "form-group">
                <button type="submit"
                class="btn btn-success">
                Salvar Usuário
</button>
            </div>

</form>
</div>
</div>

<?php include "./rodape.php";
?>