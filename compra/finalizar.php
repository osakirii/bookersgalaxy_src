<?php
session_start();
include_once(__DIR__ . '/../config.php');

// Verifique se a sessão do carrinho está configurada corretamente
if (!isset($_SESSION['carrinho'])) {
    $_SESSION['carrinho'] = [];
}

if (isset($_POST['selected_books'])) {
    // Decodifica o JSON para um array associativo em PHP
    $selectedBooks = json_decode($_POST['selected_books'], true);
} else {
    echo "<p>Erro: Nenhum livro selecionado foi enviado.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalizar Compra</title>
    <script src="https://sdk.mercadopago.com/js/v2"></script>
    <link rel="stylesheet" href="../css/finish.css">
</head>

<body>
    <div class="containerPai">
        <div class="coluna">
            <!-- Conteúdo da primeira coluna -->
            <p>SELECIONADOS</p>
            <div class="livros_selecionados">
                <?php
                $totalPreco = 0;
                if(isset($selectedBooks)) {
                foreach ($selectedBooks as $livro) {
                    echo "<div class='item'><div class='livroImg'>";
                    echo "<img src='../" . htmlspecialchars($livro['arquivo_path']) . "'><br></div>";
                    echo "<div class='infosLivro'>Título: " . htmlspecialchars($livro['titulo']) . "<br>";
                    echo "Autor: " . htmlspecialchars($livro['autor']) . "<br>";
                    echo "Preço: R$ " . number_format($livro['preco'], 2, ',', '.') . "<br>";
                    echo "Quantidade: " . htmlspecialchars($livro['quantidade']) . "<br>";
                    echo "</div></div>";
                    $totalPreco += $livro['preco'] * $livro['quantidade'];
                }
            }
                ?>
            </div>
            <hr>
            <div class="preco">
                <?php
                echo "Subtotal:&nbsp;&nbsp;&nbsp;&nbsp;R$" . $totalPreco;
                $valorAleatorio = rand(10, 30);
                echo "<br>Taxa de Envio:&nbsp;&nbsp;&nbsp;&nbsp;R$" . $valorAleatorio;
                echo "<br>Total:&nbsp;&nbsp;&nbsp;&nbsp;R$" . $valorAleatorio + $totalPreco;
                ?>
            </div>
            <div class="cupom">
                <select name="cupomzin" id="cupomm">
                    <option>Escolha seu cupom</option>
                    <option>Primeira Compra</option>
                    <option>Black Friday</option>
                    <option>Frete Grátis</option>
                </select>
            </div>
        </div>
        <div class="coluna">
            <!-- Conteúdo da segunda coluna -->
            <p>MÉTODO DE PAGAMENTO:</p>
            <!--PARTE DO MERCADO PAGO, NÃO MEXER PELO AMOR DE CRISTO-->
            <div class="metodo_pagamento">
                <div class="select_metodo" onclick="toggleOpcoesPagamento()">
                    Escolha o método
                </div>
                <div class="opcoes_pagamento" id="opcoes_pagamento" style="display: none;">
                    <div class="cartao">
                        <input type="radio" name="metodo_pagamento" id="cartao1">
                        <label for="cartao1">
                            <img src="../images/cartao_icon.png" alt="Cartão Icone">
                            Cartão 1: •••• XXXX
                        </label>
                    </div>
                    <div class="cartao">
                        <input type="radio" name="metodo_pagamento" id="cartao2">
                        <label for="cartao2">
                            <img src="../images/cartao_icon.png" alt="Cartão Icone">
                            Cartão 2: •••• YYYY
                        </label>
                    </div>
                    <div class="adicionar_cartao">
                        <a href="#">+ adicionar cartão...</a>
                    </div>

                    <div class="pix">
                        <input type="radio" name="metodo_pagamento" id="pix">
                        <label for="pix">
                            <img src="https://img.icons8.com/?size=100&id=Dk4sj0EM4b20&format=png&color=000000"
                                alt="PIX Icone">
                            PIX
                        </label>
                    </div>
                    <div class="boleto">
                        <input type="radio" name="metodo_pagamento" id="boleto">
                        <label for="boleto">
                            <img src="https://img.icons8.com/?size=100&id=F77TABNQzR3w&format=png&color=000000"
                                alt="Boleto Icone">
                            Boleto bancário
                        </label>
                    </div>
                </div>
            </div>

            <hr>
            <!--PARTE DO MERCADO PAGO, NÃO MEXER PELO AMOR DE CRISTO-->

            <div class="finalizar_compra">
                <div class="dados_cliente">
                    <p><strong>Seus dados:</strong></p>
                    <p>Destinatário: <?php echo htmlspecialchars($nomeUsuario); ?> </p>
                    <p>Rua XXXXXXXXXX, XXX - XXXXX XXXXXXX</p>
                    <p>CEP: XXXXX-XXX &nbsp;&nbsp; CPF: XXX.XXX.XXX-XX</p>
                    <p>E-mail: <a href="mailto:jorgeval@gmail.com">jorgeval@gmail.com</a> </p>
                    <p>Telefone: (11) XXXXX-XXXX</p>
                    <button class="alterar_btn" onclick="alterarDados()">Alterar</button>
                </div>
            </div>
            <div class="acoes">
                <button class="cancelar_btn" type="button" onclick="cancelarCompra()">Cancelar</button>
                <button class="finalizar_btn" type="submit" onclick="finalizarCompra()">Finalizar compra</button>
            </div>
            <div class="escuro" id="Escuro"></div>

            <!-- Modal para cadastro de endereço -->
            <div class="alert-End" id="alertEnd">
                <h2>VOCÊ NÃO POSSUI UM ENDEREÇO CADASTRADO!!</h2>
                <p>Para Finalizar sua compra, você deverá cadastrar um endereço. Insira os dados abaixo para prosseguir:
                </p><br><br>
                <form action="/bookersgalaxy/perfil/pedidos.php" method="POST">
                    <div class="grid-container">
                        <p>Estado<br><input required id="Estado" name="Estado" type="text" size="20"></p>
                        <p>Cidade<br><input required id="Cidade" name="Cidade" type="text" size="20"></p>
                        <p>Rua<br><input required id="Rua" name="Rua" type="text" size="20"></p>
                        <p>CEP<br><input required id="CEP" name="CEP" type="text" size="20" onblur="buscarEndereco()">
                        </p>
                        <p>Número<br><input required id="Numero" name="Numero" type="text" size="20"></p>
                        <p>Complemento<br><input required id="Complemento" name="complemento" type="text" size="20"></p>
                    </div><br><br>
                    <div id="alertEnd-Button">
                        <center>
                            <button type="button" class="NAO" onclick="fecharModal()">Cancelar</button>
                            <button type="submit" class="SIM" onclick="AlertaSi()">Cadastrar</button>
                        </center>
                    </div>
                </form>
            </div>
            <div class="alert-box" id="alertBox">
                <h2>DESEJA MESMO SAIR??</h2>
                <p>Sentimos muito por não cumprir com suas expectativas, mas foi bom enquanto durou. Até a próxima!!!
                </p>
                <div id="alertBox-Button">
                    <button class="NAO" onclick="AlertaNo()">NÃO</button>
                    <button class="SIM" onclick="AlertaSi()">SIM</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>


    function toggleOpcoesPagamento() {
        const opcoes = document.getElementById('opcoes_pagamento');
        // Toggle the display between 'none' and 'block'
        opcoes.style.display = opcoes.style.display === 'none' ? 'block' : 'none';
    }

    function alterarDados() {
        alert("Função para alterar dados ainda não implementada.");
    }

    function cancelarCompra() {
        if (confirm("Tem certeza de que deseja cancelar a compra?")) {
            window.location.href = "/bookersgalaxy/index.php";

        }
    }

    function fecharModal() {
        document.getElementById('enderecoModal').classList.remove('show');
    }

    function finalizarCompra() {
        // Faz uma requisição AJAX para verificar se o cliente tem um endereço registrado
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'http://localhost/bookersgalaxy/perfil/verificarEndereco.php', true)
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var resposta = xhr.responseText
                console.log(resposta)

                // Se o cliente tem um endereço registrado, continua com a compra
                if (resposta.temEndereco) {
                    // Aqui pode incluir a lógica para finalizar a compra, redirecionar, ou algo mais
                    alert("Compra finalizada com sucesso!");
                    window.location.href = '/bookersgalaxy/perfil/pedidos.php'; // Exemplo de redirecionamento para a página inicial
                } else {
                    // Se não tiver endereço, exibe o modal para cadastrar o endereço
                    document.getElementById('alertEnd').style.display = 'block'; // Corrigido: 'alertEnd' em vez de 'enderecoModal'
                }
            }
        };
        xhr.send();
    }

    function fecharModal() {
        // Fechar o modal
        document.getElementById('alertEnd').style.display = 'none'; // Corrigido: 'alertEnd' em vez de 'enderecoModal'
    }

    // Função chamada ao clicar em "Cadastrar" para confirmar o cadastro
    function AlertaSi() {
        alert("Endereço cadastrado com sucesso!");
        // Enviar o formulário ou redirecionar para a próxima etapa
        // Se for enviar o formulário, a ação já será realizada pelo submit
    }

    // Função chamada ao clicar em "Cancelar" para fechar o modal
    function AlertaNo() {
        fecharModal();
    }

    function buscarEndereco() {
        const cep = document.getElementById('CEP').value.replace(/\D/g, ''); // Remove caracteres não numéricos
        if (cep.length === 8) { // Verifica se o CEP tem 8 dígitos
            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                .then(response => {
                    if (!response.ok) throw new Error('Erro ao consultar o CEP.');
                    return response.json();
                })
                .then(data => {
                    if (data.erro) {
                        alert('CEP não encontrado.');
                        return;
                    }
                    // Preenche os campos com os dados da API
                    document.getElementById('Estado').value = data.uf;
                    document.getElementById('Cidade').value = data.localidade;
                    document.getElementById('Rua').value = data.logradouro;
                    document.getElementById('Complemento').value = data.complemento || '';
                })
                .catch(error => {
                    console.error('Erro na consulta do CEP:', error);
                    alert('Erro ao buscar o endereço. Verifique o CEP e tente novamente.');
                });
        } else {
            alert('CEP inválido. Verifique e tente novamente.');
        }
    }
</script>

</html>


<?php
include("../modulos/footer.php");
?>