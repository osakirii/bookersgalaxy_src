<?php
    session_start();
    include_once(__DIR__ . '/../config.php'); // Inclui todas as configurações e funções globais
    $con = Connect::getInstance();
    if (isset($_SESSION['cliente_id'])) {
        $userId = $_SESSION['cliente_id'];
        echo $userId;
    }
?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfil.css">
    <title>Editar Perfil</title>
</head>
<body>
    <main id="corpo">
        <h1>MEU PERFIL > Editar Perfil</h1>
        <section id="editarPerfil">
            <img src="../img/usuario/placeholder.png" alt="placeholder.png">
            <form action="">
                Nome: <i class="fas fa-pen"></i>
                <input type="text" placeholder="" maxlength="100">
                Biografia (Opcional): <i class="fas fa-pen" id="dois"></i>
                <textarea placeholder="" rows="5"></textarea>
            </form>
        </section>

        <div id="mudarEdit">
            <p class="active">Meu Perfil</p>
            <p>Endereços</p>
        </div>
        <section id="editarUsuario">
            <form action="" class="active">
                <div>
                    Email
                    <input type="text" placeholder="" maxlength="100">
                    Sexo
                    <select name="" id="">
                        <option value="">Prefiro não informar</option>
                        <option value="">Feminino</option>
                        <option value="">Masculino</option>
                        <option value="">Outro</option>
                    </select>
                    Telefone
                    <input type="text" placeholder="" maxlength="15">
                    Tem daltonismo?
                    <select name="" id="">
                        <option value="">Não tenho daltonismo</option>
                        <option value="">Tenho Protanopia</option>
                        <option value="">Tenho Deuteranopia</option>
                        <option value="">Tenho Tritanopia</option>
                        <option value="">Tenho Monocromacia</option>
                    </select>
                </div>
                <div class="linha"></div>
                <div>
                    Senha
                    <input type="password" maxlength="255">
                    Confirmar Senha
                    <input type="password" maxlength="255">
                </div>
            </form>
            <form action="" class="active">
                <div>
                    Endereço Principal
                    <input type="text" maxlength="">
                    Cidade e Estado
                    <input type="text">
                    CEP
                    <input type="text" placeholder="" maxlength="">
                    <br><br>
                    <i class="fas fa-plus"></i>Adicionar mais endereços
                </div>
                <div class="linha"></div>
                <div>
                    Endereço Secundário (Opcional)
                    <input type="text" maxlength="">
                    Cidade e Estado
                    <input type="text">
                    CEP
                    <input type="text" placeholder="" maxlength="">
                    <br><br>
                </div>
            </form>
            </div>
        </section>
        <div id="botoesEditar">
        <a href="perfil.php"><button id="cancelar">Voltar ao Perfil</button></a>
            <button type="submit">Salvar Alterações</button>
        </div>
    </main>
</body>
</html>