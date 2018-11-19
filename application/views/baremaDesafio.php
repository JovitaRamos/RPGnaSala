
<div class="col-lg-6">
    <div class="login-form-1">
        <div class="card-header">
            <strong>Barema</strong> Desafio
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url("index.php/Desafios/cadastro_desafio")?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" id="reg_idDesafio" name="reg_idDesafio" value="<?php echo $idDesafio; ?>">
                <input type="hidden" id="reg_idAluno" name="reg_idAluno" value="<?php echo $idAluno; ?>">
                <?php
                if (isset($componentesBarema)){
                    echo '<table class="table">';
                    echo '<thead><tr>';
                    echo '<th scope="col">Tarefa</th>';
                    echo '<th scope="col">Percentual</th>';
                    echo '<th scope="col">#</th>';
                    echo '</tr></thead><tbody>';
                    foreach ($componentesBarema as $componenteBarema):
                        echo '<tr>';
                        echo '<td>'.$componenteBarema['tarefa'].'</td>';
                        echo '<td>'.$componenteBarema['percentual'].'</td>';
                        echo '<th scope="row"><input type="checkbox" name="reg_check'.$componenteBarema['id'].'"></th>';
                        echo '</tr>';
                    endforeach;
                    echo '</tbody></table>';
                }
                ?>
                <div class="login-button">
                    <button type="submit" formaction="<?= base_url("index.php/Desafios/corrigirDesafio")?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Corrigir
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>