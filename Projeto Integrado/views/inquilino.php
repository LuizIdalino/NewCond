<div class="btn-container">
    <a href="?pagina=inserir_inquilino" class="btn btn-custom">Novo Inquilino</a>
</div>

<div class="table-container">
    <div class="conteudo_cliente">
        <table class="table table-success table-striped">
            <tr>
                <th>Nome</th>
                <th style="width: 10%;">RG</th>
                <th style="width: 15%;">CPF</th>
                <th style="width: 15%;">Celular</th>
                <th>Bloco</th>
                <th>Número do apartamento</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>

            <?php
            $consulta_inquilino = mysqli_query($conexao, "SELECT * FROM cadastrocondominio");

            while ($linha = mysqli_fetch_array($consulta_inquilino)) {
                echo '<tr>';
                echo '<td>' . $linha['nome'] . '</td>';
                echo '<td>' . $linha['rg'] . '</td>';
                echo '<td>' . $linha['cpf'] . '</td>';
                echo '<td>' . $linha['celular'] . '</td>';
                echo '<td>' . $linha['bloco'] . '</td>';
                echo '<td>' . $linha['numap'] . '</td>';
                echo '<td><a href="?pagina=inserir_inquilino&editar=' . $linha['id'] . '">Editar</a></td>';
                echo '<td><a href="deleta_inquilino.php?id=' . $linha['id'] . '">Deletar</a></td>';
                echo '</tr>';
            }
            ?>
        </table>
    </div>
</div>
