<div class="btn-container">
    <a href="?pagina=inserir_visitante" class="btn btn-custom">Novo Visitante</a>
</div>

<div class="table-container">
    <div class="conteudo_cliente">
        <table class="table table-success table-striped">
            <tr>
                <th>Nome completo</th>
                <th>RG</th>
                <th>Placa do Veículo</th>
                <th>Inquilino</th>
                <th>Entrada</th>
                <th>Saída</th>
                <th>Editar</th>
                <th>Deletar</th>
                <th>Saída</th>
            </tr>

            <?php
            while ($linha = mysqli_fetch_array($consulta_visitante)) {
                echo '<tr><td>' . $linha['nome'] . '</td>';
                echo '<td>' . $linha['rg'] . '</td>';
                echo '<td>' . $linha['placaveiculo'] . '</td>';

                $id_inquilino = $linha['id_cadastrocondominio'];
                $query_inquilino = "SELECT nome FROM cadastrocondominio WHERE id = $id_inquilino";
                $resultado_inquilino = mysqli_query($conexao, $query_inquilino);
                $linha_inquilino = mysqli_fetch_array($resultado_inquilino);
                $nome_inquilino = $linha_inquilino['nome'];

                echo '<td>' . $nome_inquilino . '</td>';
                echo '<td>' . $linha['datahora'] . '</td>';
                echo '<td class="data-saida">' . $linha['datahora_saida'] . '</td>';

                echo '<td><a href="?pagina=inserir_visitante&editar=' . $linha['id'] . '">Editar</a></td>';
                echo '<td><a href="deleta_visitante.php?id=' . $linha['id'] . '">Deletar</a></td>';

                echo '<td>';
                if (empty($linha['datahorasaida'])) {
                    echo '<a href="#" class="btn btn-saida" data-visitante-id="' . $linha['id'] . '">Saída</a>';
                }
                echo '</td>';

                echo '</tr>';
            }
            ?>

        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script>
$(document).ready(function () {
    $('.btn-saida').click(function () {
        var id = $(this).data('visitante-id');
        var dataHoraSaida = getCurrentDateTime();

        var dataSaidaCell = $(this).closest('tr').find('.data-saida');
        dataSaidaCell.text(dataHoraSaida);

        $.ajax({
            type: 'POST',
            url: 'registrar_saida.php',
            data: {
                id: id
            },
            success: function (response) {
                // Processar a resposta do servidor, se necessário
            },
            error: function (xhr, status, error) {
                // Lidar com erros durante a requisição AJAX
            }
        });
    });

    function getCurrentDateTime() {
        var currentDateTime = new Date();
        var year = currentDateTime.getFullYear();
        var month = ('0' + (currentDateTime.getMonth() + 1)).slice(-2);
        var day = ('0' + currentDateTime.getDate()).slice(-2);
        var hours = ('0' + currentDateTime.getHours()).slice(-2);
        var minutes = ('0' + currentDateTime.getMinutes()).slice(-2);
        var seconds = ('0' + currentDateTime.getSeconds()).slice(-2);
        return year + '-' + month + '-' + day + ' ' + hours + ':' + minutes + ':' + seconds;
    }

    // Preencher as datas e horas de saída já registradas ao carregar a página
    $('.data-saida').each(function () {
        var visitanteId = $(this).closest('tr').find('.btn-saida').data('visitante-id');
        var dataSaidaCell = $(this);

        $.ajax({
            type: 'GET',
            url: 'obter_datahora_saida.php', // Arquivo PHP para obter a data e hora de saída do visitante
            data: {
                id: id
            },
            success: function (response) {
                if (response) {
                    dataSaidaCell.text(response);
                }
            },
            error: function (xhr, status, error) {
                // Lidar com erros durante a requisição AJAX
            }
        });
    });
});
</script>
