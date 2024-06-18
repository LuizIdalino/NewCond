<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<?php
include 'conexao.php';

if (!isset($_GET['editar'])) {
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">Inserir novo visitante</h1>
            <form method="post" action="processa_visitante.php">
                <br>
                <div class="form-group">
                    <label for="nome">Nome completo:</label><br>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo do visitante" oninput="formatarNome(this)">
                </div>
                <br>
                <div class="form-group">
                    <label for="rg">RG:</label><br>
                    <input type="text" class="form-control" id="rg" name="rg" placeholder="RG do visitante" maxlength="9" oninput="formatarRG(this)">
                </div>
                <br>
                <div class="form-group">
                    <label for="placaveiculo">Placa veicular:</label><br>
                    <input type="text" class="form-control" id="placaveiculo" name="placaveiculo" placeholder="Placa do veículo" oninput="formatarPlaca(this)">
                </div>
                <br>
                <div class="form-group">
                    <label for="id_cadastrocondominio">Inquilino visitado:</label>
                    <select class="form-control" id="id_cadastrocondominio" name="id_cadastrocondominio">
                        <option value="">Selecione o Inquilino</option>
                        <?php
                        $query = "SELECT id, nome FROM cadastrocondominio";
                        $resultado = mysqli_query($conexao, $query);
                        while ($linha = mysqli_fetch_array($resultado)) {
                            echo '<option value="' . $linha['id'] . '">' . $linha['nome'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <br>
                <input type="hidden" name="datahora" value="<?php echo date('Y-m-d H:i:s'); ?>">
                <br><br>

                <input type="submit" class="btn btn-primary" value="Inserir visitante">
            </form>
        </div>
    </div>
</div>

<?php
} else {
    $id_visitante = $_GET['editar'];
    $query = "SELECT * FROM cadastrovisita WHERE id = $id_visitante";
    $consulta_visitante = mysqli_query($conexao, $query);
    while ($linha_visitante = mysqli_fetch_array($consulta_visitante)) {
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h1 class="text-center">Editar visitante</h1>
            <form method="post" action="edita_visitante.php">
                <input type="hidden" name="id" value="<?php echo $linha_visitante['id']; ?>">
                <br>

                <div class="form-group">
                    <label for="nome">Nome completo:</label><br>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Nome completo do visitante" value="<?php echo $linha_visitante['nome']; ?>" oninput="formatarNome(this)">
                </div>
                <br>
                <div class="form-group">
                    <label for="rg">RG:</label><br>
                    <input type="text" class="form-control" id="rg" name="rg" placeholder="RG do visitante" value="<?php echo $linha_visitante['rg']; ?>" maxlength="10" oninput="formatarRG(this)">
                </div>
                <br>
                <div class="form-group">
                    <label for="placaveiculo">Placa veicular:</label><br>
                    <input type="text" class="form-control" id="placaveiculo" name="placaveiculo" placeholder="Placa do veículo" value="<?php echo $linha_visitante['placaveiculo']; ?>" oninput="formatarPlaca(this)">
                </div>
                <br>
                <div class="form-group">
                    <label for="id_cadastrocondominio">Inquilino visitado:</label>
                    <select class="form-control" id="id_cadastrocondominio" name="id_cadastrocondominio">
                        <option value="">Selecione o Inquilino</option>
                        <?php
                        $query = "SELECT id, nome FROM cadastrocondominio";
                        $resultado = mysqli_query($conexao, $query);
                        while ($linha = mysqli_fetch_array($resultado)) {
                            $selecionado = ($linha['id'] == $linha_visitante['id_cadastrocondominio']) ? 'selected' : '';
                            echo '<option value="' . $linha['id'] . '" ' . $selecionado . '>' . $linha['nome'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <br>
                <input type="hidden" name="datahora" value="<?php echo $linha_visitante['datahora']; ?>">
                <br><br>

                <input type="submit" class="btn btn-primary" value="Editar visitante">
            </form>
        </div>
    </div>
</div>

<?php
    }
}
?>

<script>
    function formatarNome(input) {
        input.value = input.value.replace(/[^a-zA-Zà-úÀ-Ú ]/g, '');
    }

    function formatarRG(input) {
        input.value = input.value.replace(/[^0-9]/g, '');
    }

    function formatarPlaca(input) {
        input.value = input.value.replace(/[^a-zA-Z0-9]/g, '').toUpperCase();
    }

    $(document).ready(function () {
        $('#rg').mask('0.000.000');
        $('#placaveiculo').mask('AAA-9999');
    });

    function formatarNome(input) {
        var nome = input.value.toLowerCase().split(' ');
        for (var i = 0; i < nome.length; i++) {
            nome[i] = nome[i].charAt(0).toUpperCase() + nome[i].slice(1);
        }
        input.value = nome.join(' ');
    }
</script>