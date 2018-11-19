
<div class="col-lg-6">
    <div class="login-form-1">
        <div class="card-header">
            <strong>Cadastro</strong> Desafio
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url("index.php/Desafios/cadastro_desafio")?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Tipo de Desafio</label></div>
                    <div class="col-12 col-md-9">
                        <select name="reg_tipoDesafio" id="select" class="form-control">
                            <option value="0">Por favor escolha</option>
                            <?php
                            if (isset($tiposDesafios) ) {
                                foreach ($tiposDesafios as $tipoDesafio):
                                    echo '<option value="' . $tipoDesafio['id'] . '">'.$tipoDesafio['nome'] . '</option>';
                                endforeach;
                            }
                            else{
                                if($ehCadastroDesafio)
                                {
                                    redirect('TiposDesafios/view', 'refresh');
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="login-button">
                    <button type="submit" formaction="<?= base_url("index.php/TiposDesafios/view")?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Novo Tipo Desafio
                    </button>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nome Desafio</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="reg_nome" name="reg_nome" placeholder="ex: Defesa de TCC" class="form-control"><small class="form-text text-muted">escreva o nome do desafio</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Questão</label></div>
                    <div class="col-12 col-md-9"><textarea name="reg_questao" id="reg_questao" rows="9" placeholder="digite o objetivo do desafio" class="form-control"></textarea></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="date-input" class=" form-control-label">Data de Início</label></div>
                    <div class="col-12 col-md-9"><input type="date" id="reg_dataInicio" name="reg_dataInicio" class="form-control"><small class="form-text text-muted">data iniciod das atividades</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="date-input" class=" form-control-label">Questão</label></div>
                    <div class="col-12 col-md-9"><input type="date" id="reg_dataFim" name="reg_dataFim" class="form-control"><small class="form-text text-muted">data final das atividades</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Habilidades</label></div>
                    <div class="col-12 col-md-9">
                        <select name="reg_habilidades" id="select" class="form-control">
                            <option value="0">Por favor escolha</option>
                            <?php
                            if (isset($habilidades) ) {
                                foreach ($habilidades as $habilidade):
                                    echo '<option value="'.$habilidade['id'].'">'.$habilidade['nome'].'</option>';
                                endforeach;
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Arquivo de Auxílio</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>
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
