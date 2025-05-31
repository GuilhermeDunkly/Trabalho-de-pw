<form method="POST" action="actions/salvar.php">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cadastrar Candidato</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 form-floating">
                        <input name="nome" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" required>
                        <label for="exampleFormControlInput1">Nome</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input name="partido" type="text" class="form-control" id="exampleFormControlInput2" placeholder="">
                        <label for="exampleFormControlInput2">Partido</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input name="cargo" type="text" class="form-control" id="exampleFormControlInput3" placeholder="">
                        <label for="exampleFormControlInput3">Cargo</label>
                    </div>
          
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-x-circle-fill"></i> Fechar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-person-badge"></i> Salvar Candidato
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
