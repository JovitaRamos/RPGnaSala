
<div class="col-lg-6">
    <div class="login-form-1">
        <div class="card-header">
            <strong>Corrigir</strong> Desafios
        </div>
        <div class="card-body card-block">
            <form method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="row form-group">
                <div class="col-12 col-md-6">
                    <select name="reg_desafio" id="select" class="form-control">
                        <option value="0">Por favor escolha</option>
                        <?php
                        if (isset($Desafios) ) {
                            foreach ($Desafios as $Desafio):
                                if ($Desafio['id'] != $idDesafio)
                                {
                                    echo '<option value="' . $Desafio['id'] . '">'.$Desafio['nome'] . '</option>';
                                }
                                else
                                {
                                    echo '<option selected="selected" value="' . $Desafio['id'] . '">'.$Desafio['nome'] . '</option>';
                                }
                            endforeach;
                        }
                        ?>
                    </select>
                </div>
                </div>
                <div class="row form-group">
                <div class="login-button">
                    <?php
                    if (isset($ehCorrigir))
                    {
                        echo '<button type="submit" formaction="'.base_url("index.php/Desafios/buscarAlunosDesafio").'" class="btn btn-primary btn-sm">';
                    }
                    else
                    {
                        echo '<button type="submit" formaction="'.base_url("index.php/Desafios/buscarDesafioGerenciar").'" class="btn btn-primary btn-sm">';
                    }
                    ?>
                        <i class="fa fa-dot-circle-o"></i> Selecionar Desafio
                    </button>
                </div>
                </div>
                <?php
                if (isset($AlunosDesafios) ) {
                echo '<div class="row form-group"><div class="col-12 col-md-6">';
                echo '<select name="reg_aluno" id="select" class="form-control">';
                echo '<option value="0">Por favor escolha</option>';

                foreach ($AlunosDesafios as $AlunoDesafios):
                    echo '<option value="' . $AlunoDesafios['id'] . '">'.$AlunoDesafios['nome'] . '</option>';
                endforeach;

                echo '</select></div></div>';
                echo '<input type="hidden" id="reg_desafios" name="reg_desafios" value="'.$idDesafio.'">';
                echo '<div class="row form-group"><div class="login-button">';
                echo  '<button type="submit" formaction="'.base_url("index.php/Desafios/buscarRespostaAlunosDesafio").'" class="btn btn-primary btn-sm">';
                echo    '<i class="fa fa-dot-circle-o"></i> Selecionar Aluno';
                echo    '</button>';
                echo    '</div></div>';
                }
            ?>
            </form>
        </div>
    </div>
</div>