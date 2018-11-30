
<div class="col-lg-6">
    <div class="login-form-1">
        <div class="card-header">
            <strong>Cadastro</strong> Tipo Desafio
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url("index.php/TiposDesafios/cadastro_tipoDesafioModeloResposta")?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" id="reg_id" name="reg_id" value="<?php echo $tipoDesafio->id; ?>">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nome Tipo Desafio</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="reg_nome" name="reg_nome" value="<?php echo $tipoDesafio->nome; ?>" placeholder="<?php echo $tipoDesafio->nome;; ?>" disabled="" class="form-control"><small class="form-text text-muted">escreva o nome do desafio</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Valor da Experiência</label></div>
                    <div class="col-12 col-md-9"><input type="number" id="reg_valorExperiencia" value="<?php echo $tipoDesafio->valorExperiencia; ?>" name="reg_valorExperiencia" placeholder="<?php echo $tipoDesafio->valorExperiencia; ?>" disabled="" class="form-control"><small class="form-text text-muted">escreva o valor da experiência ao conquistar o desafio</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Sugestão Bibliografica</label></div>
                    <div class="col-12 col-md-9"><textarea name="reg_sugestaoBibliografica" id="reg_sugestaoBibliografica" value="<?php echo $tipoDesafio->sugestaoBibliografica; ?>" rows="9" placeholder="<?php echo $tipoDesafio->sugestaoBibliografica; ?>" disabled="" class="form-control"></textarea></div>
                </div>

                <div class="row form-group">
                    <div class="col col-md-3"><label for="select" class=" form-control-label">Modelo de Resposta:</label></div>
                    <div class="col-12 col-md-9">
                        <select name="reg_inserirmodelo" id="select" class="form-control">
                            <option value="0">Por favor escolha</option>
                            <?php
                            if ($modelosDesafios){
                                foreach ($modelosDesafios as $modeloDesafio):
                                    echo '<option value='.$modeloDesafio['id'].'>'.$modeloDesafio['nome'].'</option>';
                                endforeach;
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="login-button">
                    <button type="submit" formaction="<?= base_url("index.php/TiposDesafios/adicionarAoModelo")?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Adicionar
                    </button>
                </div>
                <br>
                <?php
                if (isset($componentesModelo)){
                    foreach ($componentesModelo as $componenteModelo):
                        echo '<div class="form-group">';
                            echo $componenteModelo['componente'];
                            echo '<div class="login-button">';
                            echo '	<button type="submit" formaction="'.base_url("index.php/TiposDesafios/excluirDoModelo/").$componenteModelo['id'].'" class="btn btn-danger btn-sm">';
                            echo '		<i class="fa fa-dot-circle-o"></i> Excluir';
                            echo '	</button>';
                            echo '</div>';
                        echo '</div>';
                    endforeach;
                }
                ?>

                <div class="login-button">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Cadastrar
                    </button>
                </div>
            </form>
        </div>

    </div>

</div>
