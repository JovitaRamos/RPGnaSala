
<div class="col-lg-6">
    <div class="login-form-1">
        <div class="card-header">
            <strong>Cadastro</strong> Habilidade
        </div>
        <div class="card-body card-block">
                O aluno só conquista uma habilidade, após alcançar o nível 5.<br>
                A experiência para cada nível, é conquistada realizando os desafios.<br>
                Pode ser usada como pré-requisito de uma matéria.</p>
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url("index.php/Habilidades/cadastro_habilidade")?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nome da Habilidade</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="reg_nome" name="reg_nome" placeholder="ex: Apresentação de TCC" class="form-control"><small class="form-text text-muted">escreva o nome da habilidade</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Descrição</label></div>
                    <div class="col-12 col-md-9"><textarea name="reg_descricao" id="reg_descricao" rows="9" placeholder="descreva o que o aluno irá desenvolver" class="form-control"></textarea></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Materia</label></div>
                    <div class="col-12 col-md-9">
                        <select name="reg_materia" id="select" class="form-control">
                            <option value="0">Por favor escolha</option>
                            <?php
                                if ($materias) {
                                    foreach ($materias as $materia):
                                        echo '<option value="' . $materia['id'] . '">' . $materia['nome'] . '</option>';
                                    endforeach;
                                }
                            ?>
                        </select>
                    </div>
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