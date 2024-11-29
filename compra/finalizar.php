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
                foreach ($selectedBooks as $livro) {
                    echo "<div class='item'><div class='livroImg'>";
                    echo "<img src='../" . htmlspecialchars($livro['arquivo_path']) . "'><br></div>";
                    echo "<div class='infosLivro'>Título: " . htmlspecialchars($livro['titulo']) . "<br>";
                    echo "Autor: " . htmlspecialchars($livro['autor']) . "<br>";
                    echo "Preço: R$ " . number_format($livro['preco'], 2, ',', '.') . "<br>";
                    echo "Quantidade: " . htmlspecialchars($livro['quantidade']) . "<br>";
                    echo "</div>";
                    $totalPreco += $livro['preco'] * $livro['quantidade'];
                }
                ?>
            </div>
            <div class="preco">
                <?php
                echo "Subtotal:&nbsp;&nbsp;&nbsp;&nbsp;R$" . $totalPreco;
                $valorAleatorio = rand(10, 30);
                echo "<br>Taxa de Envio:&nbsp;&nbsp;&nbsp;&nbsp;R$" . $valorAleatorio;
                echo "<br>Total:&nbsp;&nbsp;&nbsp;&nbsp;R$" . $valorAleatorio + $totalPreco;
                ?>
            </div></div>
        </div>
        <div class="coluna">
            <!-- Conteúdo da segunda coluna -->
            <p>MÉTODO DE PAGAMENTO:</p>
            <!--PARTE DO MERCADO PAGO, NÃO MEXER PELO AMOR DE CRISTO-->
            <div class="metodo_pagamento">
                <p>MÉTODO DE PAGAMENTO:</p>
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
                            <img src="https://img.icons8.com/?size=100&id=Dk4sj0EM4b20&format=png&color=000000" alt="PIX Icone">
                            PIX
                        </label>
                    </div>
                    <div class="boleto">
                        <input type="radio" name="metodo_pagamento" id="boleto">
                        <label for="boleto">
                            <img src="https://img.icons8.com/?size=100&id=F77TABNQzR3w&format=png&color=000000" alt="Boleto Icone">
                            Boleto bancário
                        </label>
                    </div>
                </div>
            </div>


            <!--PARTE DO MERCADO PAGO, NÃO MEXER PELO AMOR DE CRISTO-->
            
            <div class="finalizar_compra">
                <div class="dados_cliente">
                    <p><strong>Seus dados:</strong></p>
                    <p>Destinatário:<?php echo htmlspecialchars($nomeUsuario);?>  </p>
                    <p>Rua XXXXXXXXXX, XXX - XXXXX XXXXXXX</p>
                    <p>CEP: XXXXX-XXX &nbsp;&nbsp; CPF: XXX.XXX.XXX-XX</p>
                    <p>E-mail: <a href="mailto:jorgeval@gmail.com">jorgeval@gmail.com</a> &nbsp;&nbsp; Telefone: 11 XXXXX-XXXX</p>
                    <button class="alterar_btn" onclick="alterarDados()">Alterar...</button>
                </div>

                <div class="acoes">
                    <button class="cancelar_btn" type="button" onclick="cancelarCompra()">Cancelar</button>
                    <button class="finalizar_btn" type="submit" onclick="finalizarCompra()">Finalizar compra</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const mp = new MercadoPago("YOUR_PUBLIC_KEY");


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

    function finalizarCompra() {
        window.location.href="pix.php";
    }
</script>

</html>


<?php
include("../modulos/footer.php");
?>