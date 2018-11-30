
<div class="col-lg-6">
    <div class="login-form-1">
        <div class="card-header">
            <strong>Cadastro</strong> Barema
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url("index.php/Desafios/cadastro_barema")?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Tarefa</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="reg_tarefa" name="reg_tarefa"  placeholder="ex: formatação" class="form-control"><small class="form-text text-muted">informe a tarefa que deve ser realizada no desafio</small></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Percentual</label></div>
                    <div class="col-12 col-md-9"><input type="number" id="reg_percentual"  name="reg_percentual" placeholder="ex: 10" class="form-control"><small class="form-text text-muted">valor percentual da tarefa</small></div>
                </div>
                <input type="hidden" id="reg_idDesafio" name="reg_idDesafio" value="<?php echo $idDesafio ?>">
                <div class="login-button">
                    <button type="submit" formaction="<?= base_url("index.php/Barema/adicionarAoBarema")?>" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Adicionar
                    </button>
                </div>
                <br/>
                <?php
                    echo '<table class="table table-striped">';
                    echo '<tr><thead>';
                    echo '<th scope="col">Terfa</th>';
                    echo '<th scope="col">Percentual:</th>';
                    echo '<th scope="col">#</th>';
                    echo '</tr></thead><tbody>';
                    if (isset($componentesBarema)){
                        foreach ($componentesBarema as $componenteBarema):
                        {
                            echo '<tr>';
                            echo '<td>'.$componenteBarema['tarefa'].'</td>';
                            echo '<td>'.$componenteBarema['percentual'].'%</td>';
                            echo '<td>';
                                echo '<div class="login-button">';
                                echo '	<button type="submit" formaction="'.base_url("index.php/Barema/excluirDoBarema/").$componenteBarema['id'].'" class="btn btn-danger btn-sm">';
                                echo '		<i class="fa fa-dot-circle-o"></i> Excluir';
                                echo '	</button>';
                                echo '</div>';
                                echo'</td>';
                            echo '</tr>';
                        }
                        endforeach;
                    }
                    echo '</tbody>';                                
                    echo '</table>';
                ?>
            </form>
        </div>
    </div>
</div>
