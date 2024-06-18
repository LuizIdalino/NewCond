<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<?php
    include 'conexao.php';

    if (!isset($_GET['editar'])) {
    ?>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="text-center">Inserir novo inquilino</h1>
                    <form method="post" action="processa_inquilino.php">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome do inquilino" oninput="formatarNome(this)">
                        </div>
                        <div class="form-group">
                            <label for="rg">RG:</label>
                            <input type="text" class="form-control" id="rg" name="rg" placeholder="Insira o RG do inquilino" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Insira o CPF do inquilino" maxlength="14">
                        </div>
                        <div class="form-group">
                            <label for="celular">Celular:</label>
                            <input type="text" class="form-control" id="celular" name="celular" placeholder="Insira o celular do inquilino" maxlength="15">
                        </div>
                        <div class="form-group">
                            <label for="bloco">Bloco:</label>
                            <input type="text" class="form-control" id="bloco" name="bloco" placeholder="Insira o bloco do inquilino" oninput="this.value = this.value.toUpperCase()">
                        </div>
                        <div class="form-group">
                            <label for="numeroapartamento">Número do apartamento:</label>
                            <input type="text" class="form-control" id="numeroapartamento" name="numap" placeholder="Insira o número do apartamento">
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary" value="Inserir inquilino">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    <?php } else {
        while ($linha = mysqli_fetch_array($consulta_inquilino)) {
            if ($linha['id'] == $_GET['editar']) {
    ?>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <h1 class="text-center">Editar inquilino</h1>
                            <form method="post" action="edita_inquilino.php">
                                <input type="hidden" name="id" value="<?php echo $linha['id']; ?>">
                                <div class="form-group">
                                    <label for="nome">Nome completo:</label>
                                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Insira o nome do inquilino" value="<?php echo $linha['nome']; ?>" oninput="formatarNome(this)">
                                </div>
                                <div class="form-group">
                                    <label for="rg">RG:</label>
                                    <input type="text" class="form-control" id="rg" name="rg" placeholder="Insira o RG do inquilino" value="<?php echo $linha['rg']; ?>" maxlength="10">
                                </div>
                                <div class="form-group">
                                    <label for="cpf">CPF:</label>
                                    <input type="text" class="form-control" id="cpf" name="cpf" placeholder="Insira o CPF do inquilino" value="<?php echo $linha['cpf']; ?>" maxlength="14">
                                </div>
                                <div class="form-group">
                                    <label for="celular">Celular:</label>
                                    <input type="text" class="form-control" id="celular" name="celular" placeholder="Insira o celular do inquilino" value="<?php echo $linha['celular']; ?>" maxlength="15">
                                </div>
                                <div class="form-group">
                                    <label for="bloco">Bloco:</label>
                                    <input type="text" class="form-control" id="bloco" name="bloco" placeholder="Insira o bloco do inquilino" value="<?php echo $linha['bloco']; ?>" oninput="this.value = this.value.toUpperCase()">
                                </div>
                                <div class="form-group">
                                    <label for="numeroapartamento">Número do apartamento:</label>
                                    <input type="text" class="form-control" id="numeroapartamento" name="numap" placeholder="Insira o número do apartamento" value="<?php echo $linha['numap']; ?>">
                                </div>
                                <div class="text-center">
                                    <input type="submit" class="btn btn-primary" value="Editar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

    <?php 
            }
        }
    }
    ?>

<script>
    $(document).ready(function() {
        $('#rg').mask('0.000.000');

        $('#cpf').mask('000.000.000-00');

        $('#celular').mask('(00) 00000-0000');
    });

    function formatarNome(input) {
        var nome = input.value.toLowerCase().split(' ');
        for (var i = 0; i < nome.length; i++) {
            nome[i] = nome[i].charAt(0).toUpperCase() + nome[i].slice(1);
        }
        input.value = nome.join(' ');
    }
</script>
