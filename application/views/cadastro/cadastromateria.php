
<div class="col-lg-6">
    <div class="login-form-1">
        <div class="card-header">
            <strong>Cadastro</strong> Matéria
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url("index.php/Materias/cadastro_materia")?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nome Matéria</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="reg_nome" name="reg_nome" placeholder="ex: Trabalho de Conclusão de Curso II" class="form-control"><small class="form-text text-muted">escreva o nome da matéria</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Codigo da Matéria</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="reg_codMateria" name="reg_codMateria" placeholder="ex: TCC2018" value="<?= rand(); ?>" class="form-control"><small class="form-text text-muted">seus alunos vão se matricular com este código</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Numero de Alunos</label></div>
                    <div class="col-12 col-md-9"><input type="number" id="reg_quantidadeAlunos" name="reg_quantidadeAlunos" placeholder="ex: 50" class="form-control"><small class="form-text text-muted">digite o numero máximo de alunos que podem se matricular</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Objetivo da Matéria</label></div>
                    <div class="col-12 col-md-9"><textarea name="reg_objetivo" id="reg_objetivo" rows="9" placeholder="digite o objetivo da matéria" class="form-control"></textarea></div>
                </div>
                <div class="login-button">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Cadastrar
                    </button>
                </div>
            </form>
        </div>

    </div>

</div>