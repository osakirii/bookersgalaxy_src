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
                        <img src="../img/usuario/placeholder.png" alt="Foto de Perfil" id="fotoPerfil">
                        <input type="file" id="inputFotoPerfil" style="display: none;" name="fotoPerfil">
                        <form action="salvar_perfil.php" method="post" enctype="multipart/form-data" id="formPerfil">
                            Nome: <i class="fas fa-pen"></i>
                            <input type="text" placeholder="<?php echo $nomeUsuario ?>" maxlength="100">
                            Biografia (Opcional): <i class="fas fa-pen" id="dois"></i>
                            <textarea placeholder="" rows="5"></textarea>
                        </form>
                    </section>

                    <div id="mudarEdit">
                        <!-- Adicionando classes e atributos data-tab para cada aba -->
                        <p class="tab active" data-tab="perfil">Meu Perfil</p>
                        <p class="tab" data-tab="enderecos">Endereços</p>
                    </div>

                    <section id="editarUsuario">
                        <!-- Formulário "Meu Perfil" com a classe active por padrão -->
                        <form action="" class="form-perfil active">
                            <div>
                                Email: <input type="text" name="email" maxlength="100">

                                Sexo
                                Sexo: <select name="sexo">
                                    <option value="">Prefiro não informar</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Outro">Outro</option>
                                </select>
                                Telefone: <input type="text" name="telefone" maxlength="15">
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
                                Senha: <input type="password" name="senha" maxlength="255">
                                Confirmar Senha: <input type="password" name="confirmarSenha" maxlength="255">
                            </div>
                        </form>

                        <!-- Formulário "Endereços" sem a classe active inicialmente -->
                        <form action="" class="form-enderecos">
                            <div>
                                <label>Endereço/Rua:</label>
                                <input type="text" id="logradouro_principal" name="logradouro_principal">
                                <label>N°:</label>
                                <input type="number" id="numero_casa" name="numero_casa">
                                Cidade e Estado: <input type="text" id="cidade_estado_principal" name="cidade_estado_principal">
                                CEP: <input type="text" id="cep_principal" name="cep_principal">
                                <span>
                                    <i class="fas fa-plus" style="font-size: 20px;"></i>Adicionar mais endereços
                                </span>
                            </div>
                            <div class="linha"></div>
                            <div>
                                <h4>Endereço Secundário (Opcional)</h4>
                                <label>Endereço/Rua:</label>
                                <input type="text" id="logradouro_principal" name="logradouro_principal">
                                <label>N°:</label>
                                <input type="number" id="numero_casa" name="numero_casa">
                                Cidade e Estado: <input type="text" id="cidade_estado_principal" name="cidade_estado_principal">
                                CEP: <input type="text" id="cep_principal" name="cep_principal">
                                <span>
                                    <i class="fas fa-plus" style="font-size: 20px;"></i>Adicionar mais endereços
                                </span>
                            </div>
                        </form>
                    </section>

                    <div id="botoesEditar">
                        <a href="perfil.php"><button id="cancelar">Voltar ao Perfil</button></a>
                        <button type="button" onclick="submitProfile()">Salvar Alterações</button>
                    </div>
                </main>

                <script>
                    //--------------------------------------------------------------//
                    //NAO MEXER, LÓGICA PARA PODER ALTERAR ENTRE ENDEREÇO E MEU PERFIL
                    const tabs = document.querySelectorAll('#mudarEdit .tab');
                    const forms = document.querySelectorAll('#editarUsuario form');

                    // Adiciona evento de clique para cada aba
                    tabs.forEach(tab => {
                        tab.addEventListener('click', () => {
                            // Remove a classe active de todas as abas e formulários
                            tabs.forEach(t => t.classList.remove('active'));
                            forms.forEach(form => form.classList.remove('active'));

                            // Adiciona a classe active apenas à aba clicada e ao formulário correspondente
                            tab.classList.add('active');
                            const targetFormClass = `.form-${tab.getAttribute('data-tab')}`;
                            const targetForm = document.querySelector(targetFormClass);
                            targetForm.classList.add('active');
                        });
                    });
                    //NAO MEXER, LÓGICA PARA PODER ALTERAR ENTRE ENDEREÇO E MEU PERFIL
                    //--------------------------------------------------------------//

                    document.getElementById('fotoPerfil').addEventListener('click', () => {
                        document.getElementById('inputFotoPerfil').click();
                    });

                    document.getElementById('inputFotoPerfil').addEventListener('change', function() {
                        const file = this.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                document.getElementById('fotoPerfil').src = e.target.result;
                            };
                            reader.readAsDataURL(file);
                        }
                    });

                    function submitProfile() {
    console.log("submitProfile function called");

    const formData = new FormData();

    // Coleta dados de todos os formulários
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        const inputs = form.querySelectorAll('input, select, textarea');
        inputs.forEach(input => {
            if (input.type === 'file' && input.files[0]) {
                formData.append(input.name, input.files[0]);
            } else if (input.name) {
                formData.append(input.name, input.value);
            }
        });
    });

    // Log do FormData para depuração
    for (let [key, value] of formData.entries()) {
        console.log(key, value);
    }

    // Envio dos dados para o servidor
    fetch('salvarperfil.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        console.log("Resposta do servidor:", data);
        if (data.success) {
            alert('Perfil atualizado com sucesso!');
        } else {
            alert('Erro ao atualizar o perfil.');
        }
    })
    .catch(error => console.error('Erro no envio:', error));
}

// Evento para o botão de envio
document.querySelector('#botoesEditar button[type="button"]').addEventListener('click', submitProfile);

                    document.getElementById('inputFotoPerfil').addEventListener('change', function() {
                        const file = this.files[0];
                        if (file) {
                            // Pré-visualização no <img> localmente
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                document.getElementById('fotoPerfil').src = e.target.result;
                            };
                            reader.readAsDataURL(file);

                            // Envio da imagem ao servidor via AJAX
                            const formData = new FormData();
                            formData.append('fotoPerfil', file);

                            fetch('salvarimagem.php', {
                                    method: 'POST',
                                    body: formData
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (!data.success) {
                                        alert('Erro ao atualizar a imagem de perfil.');
                                    }
                                })
                                .catch(error => console.error('Erro:', error));
                        }
                    });
                    document.getElementById('cep_principal').addEventListener('blur', function() {
                        const cep = this.value.replace(/\D/g, ''); // Remove caracteres não numéricos
                        if (cep.length === 8) { // Validação simples para CEP de 8 dígitos
                            fetch(`https://viacep.com.br/ws/${cep}/json/`)
                                .then(response => response.json())
                                .then(data => {
                                    if (!data.erro) {
                                        // Preenche os campos cidade e estado automaticamente
                                        document.getElementById('logradouro_principal').value = data.logradouro;
                                        document.getElementById('cidade_estado_principal').value = data.localidade;
                                        document.getElementById('estado_principal').value = data.uf;
                                    } else {
                                        alert('CEP não encontrado.');
                                    }
                                })
                                .catch(error => console.error('Erro ao consultar o CEP:', error));
                        } else {
                            alert('Por favor, insira um CEP válido.');
                        }
                    });
                </script>
                </script>
            </body>

            </html>