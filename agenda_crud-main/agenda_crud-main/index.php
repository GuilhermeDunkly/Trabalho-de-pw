<?php
include_once("./config/database/database.php");

$por_pagina = 10;
$pagina = $_GET['pagina'] ?? 1;
$inicio = ($pagina - 1) * $por_pagina;

$sql = "SELECT * FROM candidatos ORDER BY id DESC LIMIT $inicio, $por_pagina";
$rows = $con->query($sql);
?>

<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <title>CRUD - Sistema Eleitoral</title>
</head>
<body class="container">
    <h1 class="text-center py-4">
        <i class="bi bi-ballot"></i>
        Sistema Eleitoral
    </h1>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <i class="bi bi-plus-circle"></i>
        Adicionar novo candidato
    </button>

    <table class="table table-striped table-hover table-bordered mt-4">
        <thead>
            <tr class="text-center">
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Partido</th>
                <th scope="col">Cargo</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($rows->num_rows > 0) {
                while ($row = $rows->fetch_assoc()) {
                    echo '
                    <tr class="text-center">
                        <th scope="row">' . $row['id'] . '</th>
                        <td>' . $row['nome'] . '</td>
                        <td>' . $row['partido'] . '</td>
                        <td>' . $row['cargo'] . '</td>
                        <td>
                            <a class="btn btn-danger" href="actions/deletar.php?id=' . $row['id'] . '">
                                <i class="bi bi-trash"></i>
                                Deletar
                            </a>
                            <a class="btn btn-primary" href="actions/editar.php?id=' . $row['id'] . '">
                                <i class="bi bi-pencil"></i>
                                Editar
                            </a>
                        </td>
                    </tr>';
                }
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="5">
                    <?php
                    $total = $con->query("SELECT COUNT(*) as total FROM candidatos")->fetch_assoc()['total'];
                    $total_paginas = ceil($total / $por_pagina);
                    echo '<nav>
                        <ul class="pagination justify-content-center">';
                    for ($i = 1; $i <= $total_paginas; $i++) {
                        $active = ($i == $pagina) ? 'active' : '';
                        echo '<li class="page-item ' . $active . '"><a class="page-link" href="?pagina=' . $i . '">' . $i . '</a></li>';
                    }
                    echo '</ul></nav>';
                    ?>
                </td>
            </tr>
        </tfoot>
    </table>

    <form method="POST" action="actions/salvar.php">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Novo Candidato</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 form-floating">
                            <input name="nome" type="text" class="form-control" id="nome" placeholder="Nome" required>
                            <label for="nome">Nome</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input name="partido" type="text" class="form-control" id="partido" placeholder="Partido" required>
                            <label for="partido">Partido</label>
                        </div>
                        <div class="mb-3 form-floating">
                            <input name="cargo" type="text" class="form-control" id="cargo" placeholder="Cargo" required>
                            <label for="cargo">Cargo</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-circle-fill"></i>
                            Fechar
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-person-badge"></i>
                            Salvar Candidato
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.modal').on('hidden.bs.modal', function () {
                $(this).find('input').val('');
            });
        });
    </script>
</body>
</html>
