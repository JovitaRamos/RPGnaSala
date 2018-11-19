
<div class="col-lg-6">
    <div class="login-form-1">
        <div class="card-header">
            <strong>Cadastro</strong> Tipo Desafio
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url("index.php/TiposDesafios/cadastro_tipoDesafio")?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nome Tipo Desafio</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="reg_nome" name="reg_nome" placeholder="ex: Apresentação Final" class="form-control"><small class="form-text text-muted">escreva o nome do desafio</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Valor da Experiência</label></div>
                    <div class="col-12 col-md-9"><input type="number" id="reg_valorExperiencia" name="reg_valorExperiencia" placeholder="ex: 50" class="form-control"><small class="form-text text-muted">escreva o valor da experiência ao conquistar o desafio</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Sugestão Bibliografica</label></div>
                    <div class="col-12 col-md-9"><textarea name="reg_sugestaoBibliografica" id="reg_sugestaoBibliografica" rows="9" placeholder="informe as sugestões bibliograficas para os alunos" class="form-control"></textarea></div>
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
