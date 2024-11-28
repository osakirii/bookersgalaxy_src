        <?php
        include_once(__DIR__ . '/../config.php'); // Inclui todas as configurações e funções globais

        $con = Connect::getInstance();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {

                //RECUPERANDO OS     DA EDITORA
                $nome = $_POST['nome'];
                $pais = $_POST['pais'];
                $email = $_POST['email'];
                $telefone = $_POST['telefone'];
                $cnpj = $_POST['CNPJ'];
                $tipo_imagem = $_POST['tipo_imagem'];  


                // Dados do endereço
                $cep = $_POST['cep'];
                $rua = $_POST['rua'];
                $numero = $_POST['numero'];
                $bairro = $_POST['bairro'];
                $estado = $_POST['estado'];
                $cidade = $_POST['cidade'];
                $tipo_endereco = $_POST['tipo_endereco'];
                // <!--INSERINDO OS DADOS NO BANCO DE DADOS-->?
                $stmt = $con->prepare("INSERT INTO editora (nome, pais,email,telefone,cnpj) VALUES (?,?,?,?,?)");
                $stmt->execute([$nome, $pais,$email, $telefone,$cnpj ]);

                //OBTÉM O ÚLTIMO ID INSERIDO DA EDITORA
                $id_editora = $con->lastInsertId();

                if ($id_editora === "0") {
                    echo "Erro: Não foi possível obter o ID da editora.";
                    exit;
                }

                $stmtEndereco = $con->prepare("INSERT INTO enderecos_editora (id_editora, tipo_endereco, endereco_rua, endereco_numero, endereco_bairro, endereco_cep, estado, cidade) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmtEndereco->execute([$id_editora, $tipo_endereco, $rua, $numero, $bairro, $cep, $estado, $cidade]);


                // Verifica se foram enviadas imagens
                if (isset($_FILES['arquivo']) && $_FILES['arquivo']['error'][0] === 0) {
                    foreach ($_FILES['arquivo']['tmp_name'] as $key => $tmp_name) {
                        $arquivo = $_FILES['arquivo'];
                        var_export($arquivo, true);
                        $folder = "../img/";
                        $archiveName = $arquivo['name'][$key];
                        $newArchiveName = uniqid();
                        $extension = strtolower(pathinfo($archiveName, PATHINFO_EXTENSION));

                        if ($extension != 'jpg' && $extension != 'png' && $extension != 'jpeg' && $extension != 'gif') {
                            die("Tipo de arquivo inaceitável para arquivo " . $arquivo['name'][$key] . "!! Apenas .jpg, .png, .jpeg ou .gif");
                        }

                        $path = $folder . $newArchiveName . "." . $extension;

                        $accepted = move_uploaded_file($tmp_name, $path);
                        if ($accepted) {
                            $stmt = $con->prepare("INSERT INTO imagens_editoras (id_editora, path, tipo_imagem, data_upload) VALUES (?, ?, ?, NOW())");
                            $stmt->execute([$id_editora, $path, $tipo_imagem]);
                        } else {
                            echo "<p>Falha ao enviar arquivo." . $arquivo['name'][$key] . "</p>";
                        }
                    }
                } else {
                    echo "Nenhuma imagem enviada ou ocorreu um erro no envio da imagem.";
                }

                echo "Editora cadastrado com sucesso!";
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
        }
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../css/upload.css">
            <link rel="stylesheet" href="../css/modulos.css">
            <title>Cadastro de Livro</title>
        </head>

        <body>

            <main>
                <form id="formLivro" method="POST" enctype="multipart/form-data" action="uploadEditora.php">
                    <label>Insira as informações da Editora:</label>
                    <input type="text" name="nome" placeholder="Nome da Editora" required>
                    <input type="text" name="pais" placeholder="País da Editora" required>
                    <input type="text" name="CNPJ" placeholder="CNPJ" required>
                    <input type="text" name="email" placeholder="E-mail de contato" required>
                    <input type="text" name="telefone" placeholder="Número de Telefone" required >
                    <input type="text" placeholder="CEP" id="cep" name="cep" onblur="buscarEndereco()" required>
                    <input type="text" placeholder="Rua" id="rua" name="rua" required>
                    <input type="text" placeholder="Número" id="numero" name="numero" required>
                    <input type="text" placeholder="Bairro" id="bairro" name="bairro" required>
                    <input type="text" placeholder="Cidade" id="cidade" name="cidade" required>
                    <input type="text" placeholder="Estado" id="estado" name="estado" required>

                    <!-- DROPDOWN PARA ESCOLHER A CAPA -->
                    <label>Selecione o tipo de imagem para a editora:</label>
                        <select name="tipo_endereco" required>
                            <option value="">Selecione o tipo de endereço</option>
                            <option value="principal">Principal</option>
                            <option value="filial">Filial</option>
                            <option value="correspondência">Correspondência</option>
                            <option value="comercial">Comercial</option>
                        </select>
                    <input type="file" name="arquivo[]" required>

                        <label>Selecione o tipo de imagem para a editora:</label>
                        <select name="tipo_imagem" required>
                            <option value="">Selecione o tipo de imagem</option>
                            <option value="logo">Logo</option>
                            <option value="banner">Banner</option>
                            <option value="promocao">Promoção</option>
                            <option value="outra">Outra</option>
                        </select>

                    <center><button type="submit">Cadastrar Livro</button></center>

                </form>
                <a id="voltar" onclick="history.back()">Voltar</a></button>
                </div>
            </main>

            <script>
                //JAVASCRIPT PARA PREENCHER O SELECT BASEADO NA QUANTIDADE DE IMAGENS
                const fileInput = document.querySelector('input[name="arquivo[]"]');
                const capaSelect = document.querySelector('select[name="capa"]');

                fileInput.addEventListener('change', function() {
                    // Limpa as opções anteriores
                    capaSelect.innerHTML = '<option value="">Selecione uma imagem como capa</option>';

                    // Adiciona uma opção para cada imagem
                    Array.from(fileInput.files).forEach((file, index) => {
                        const option = document.createElement('option');
                        option.value = index;
                        option.textContent = `Imagem ${index + 1} - ${file.name}`;
                        capaSelect.appendChild(option);
                    });
                });

                function buscarEndereco() {
                    const cep = document.getElementById('cep').value.replace(/\D/g, '');

                    if (cep.length === 8) {
                        fetch(`https://viacep.com.br/ws/${cep}/json/`)
                            .then(response => response.json())
                            .then(data => {
                                if (!data.erro) {
                                    document.getElementById('rua').value = data.logradouro;
                                    document.getElementById('bairro').value = data.bairro;
                                    document.getElementById('cidade').value = data.localidade;
                                    document.getElementById('estado').value = data.uf;
                                } else {
                                    alert('CEP não encontrado.');
                                }
                            })
                            .catch(error => {
                                alert('Erro ao buscar o CEP.');
                                console.error(error);
                            });
                    } else {
                        alert('CEP inválido.');
                    }
                }
            </script>
            <?php

            ?>
        </body>

        </html>