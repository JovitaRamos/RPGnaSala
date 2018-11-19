
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
                                    if ($tipoDesafio['id'] != $Desafio[0]['idTipo'])
                                    {
                                        echo '<option value="' . $tipoDesafio['id'] . '">'.$tipoDesafio['nome'] . '</option>';
                                    }
                                    else
                                    {
                                        echo '<option selected="selected" value="' . $tipoDesafio['id'] . '">'.$tipoDesafio['nome'] . '</option>';
                                    }
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
                    <div class="col-12 col-md-9"><input type="text" id="reg_nome" name="reg_nome" value="<?echo $Desafio[0]['nome'];?>" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Questão</label></div>
                    <div class="col-12 col-md-9"><textarea name="reg_questao" id="reg_questao" rows="9" class="form-control"><?echo $Desafio[0]['questao'];?></textarea></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="date-input" class=" form-control-label">Data de Início</label></div>
                    <div class="col-12 col-md-9"><input type="date" id="reg_dataInicio" name="reg_dataInicio" value="<?echo $Desafio[0]['dataInicio'];?>" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="date-input" class=" form-control-label">Data do Final</label></div>
                    <div class="col-12 col-md-9"><input type="date" id="reg_dataFim" name="reg_dataFim" value="<?echo $Desafio[0]['dataFim'];?>" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Habilidades</label></div>
                    <div class="col-12 col-md-9">
                        <select name="reg_habilidades" id="select" class="form-control">
                            <option value="0">Por favor escolha</option>
                            <?php
                            if (isset($habilidades) ) {
                                foreach ($habilidades as $habilidade):
                                    if ($habilidade['id'] != $Desafio[0]['idHabilidades'])
                                    {
                                        echo '<option value="'.$habilidade['id'].'">'.$habilidade['nome'].'</option>';
                                    }
                                    else
                                    {
                                        echo '<option selected="selected" value="'.$habilidade['id'].'">'.$habilidade['nome'].'</option>';
                                    }
                                endforeach;
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <br>
                <?
                if ($Desafio[0]['idArquivo'] != null)
                {
                    echo '<input type="hidden" id="reg_idArquivo" name="reg_idArquivo" value="'.$Desafio[0]['idArquivo'].'">';
                    echo '<div class="login-button">';
                    echo '<button type="submit" formaction="'.base_url("index.php/Desafios/downloadArquivo").'" class="btn btn-primary btn-sm">';
                    echo '<i class="fa fa-dot-circle-o"></i> Baixar Arquivo Auxilio';
                    echo '</button></div>';
                }
                ?>
                <br>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Arquivo de Auxílio</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input" class="form-control-file"></div>
                </div>
                <br>
                <div class="login-button">
                    <button type="submit" formaction="<?= base_url('index.php/BaremaDesafios/cadastro?idDesafio='.urlencode($idDesafio))?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> CadastroBarema
                    </button>
                </div>
                <br>
                <div class="login-button">
                    <button type="submit"  class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Atualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
