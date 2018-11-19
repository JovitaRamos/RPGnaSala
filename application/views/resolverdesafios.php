
<div class="col-lg-6">
    <div class="login-form-1">
        <div class="card-header">
            <strong>Resolver</strong> Desafio
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url("index.php/Desafios/downloadArquivo")?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-12"><label class=" form-control-label"><?php echo 'Valor da Experiência:  '.$desafiosResolver[0]['valorExperiencia'].' Pontos'; ?> </label></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12"><label for="textarea-input" class=" form-control-label">Questão do Desafio</label></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12"><p><?php echo $desafiosResolver[0]['questao'];?></p></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-12"><label for="textarea-input" class=" form-control-label">Sugestão Bibliografica:</label></div>
                    <div class="col col-md-12"><p><?php echo $desafiosResolver[0]['sugestaoBibliografica'];?></p></div>
                </div>
                <input type="hidden" id="reg_idArquivo" name="reg_idArquivo" value="<?php echo $desafiosResolver[0]['id']; ?>">

                <div class="login-button">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Baixar Arquivo Auxilio
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="login-form-1">
        <div class="card-header">
            <strong>Barema</strong>
        </div>
        <div class="card-body card-block">
            <?php
            if (isset($componentesBarema)){
                foreach ($componentesBarema as $componenteBarema):
                    echo '<div class="row form-group">';
                    echo '<div class="col col-md-3"><label for="text-input" class=" form-control-label">Tarefa</label></div>';
                    echo '<p>'.$componenteBarema['tarefa'].'</p>';
                    echo '</div>';
                    echo '<div class="row form-group">';
                    echo '<div class="col col-md-3"><label for="text-input" class=" form-control-label">Percentual</label></div>';
                    echo '<p>'.$componenteBarema['percentual'].'%</p>';
                    echo '</div>';
                endforeach;
            }
            ?>
        </div>
    </div>
</div>
<div class="col-lg-12">
    <div class="login-form-1">
        <div class="card-header">
            Sua <strong>Solução</strong>
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url("index.php/Desafios/salvar_resolucao")?>" method="post" enctype="multipart/form-data" class="form-horizontal">

                <input type="hidden" id="reg_id" name="reg_id" value="<?php echo $idDesafio; ?>">
                <?php
                if (isset($desafiosResolver) ) {
                    $idYoutube = 0;
                    $idArquivo = 0;
                    $idTitulo = 0;
                    $idTexto = 0;
                    foreach ($desafiosResolver as $Desafio):
                        switch ($Desafio['nome'])
                        {
                            case "Titulo":
                                $name = 'Titulo'.$idTitulo;
                                echo sprintf($Desafio['componente'],$name,$name);
                                echo '<input type="hidden" id="idTitulo" name="idTitulo" value="'.$idTitulo.'">';
                                $idTitulo = $idTitulo +1;
                                break;
                            case "Texto":
                                $name = 'Texto'.$idTexto;
                                echo sprintf($Desafio['componente'],$name,$name);
                                echo '<input type="hidden" id="idTexto" name="idTexto" value="'.$idTexto.'">';
                                $idTexto = $idTexto +1;
                                break;
                            case "Video Youtube":
                                $name = 'Youtube'.$idYoutube;
                                echo sprintf($Desafio['componente'],$name,$name);
                                echo '<input type="hidden" id="idYoutube" name="idYoutube" value="'.$idYoutube.'">';
                                $idYoutube = $idYoutube +1;
                                break;
                            case "Arquivo":
                                $name = 'Arquivo'.$idArquivo;
                                echo sprintf($Desafio['componente'],$name,$name);
                                echo '<input type="hidden" id="idArquivo" name="idArquivo" value="'.$idArquivo.'">';
                                $idArquivo = $idArquivo +1;
                                break;
                        }
                    endforeach;
                }
                ?>
                <div class="login-button">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>