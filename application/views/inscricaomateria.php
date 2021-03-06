<?php 
    $errorMessage = $this->session->flashdata('error_msg');    
?>
<div class="col-lg-6">
    <div class="login-form-1">
        <div class="card-header">
            <strong>Inscrição</strong> Matéria
        </div>
        <?php if($errorMessage){ ?>
            <div class="alert alert-danger" role="alert">
                <?= $errorMessage; ?>
            </div>
        <?php } ?>
        
        <div class="card-body card-block">
            <form action="<?= base_url("index.php/Materias/buscarMateriasPorCodigo")?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3"><label class=" form-control-label"></label></div>
                    <div class="col-12 col-md-9">
                        <p class="form-control-static"><?php echo $user_name; ?></p>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Codigo da Matéria</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="reg_codMateria" name="reg_codMateria" <?php if(isset($codMateria)){echo 'placeholder="'.$codMateria.'"';} else { echo 'placeholder="ex: TCC2018"';} ?> <?php if(isset($readOnly) && $readOnly){ echo 'disabled=""';}?> class="form-control">
                        <?php if(!isset($codMateria)){ ?>
                        <small class="form-text text-muted">insira o código da materia fornecida pelo professor</small>
                        <?php } ?>
                    </div>
                </div>
            <?php if(!isset($readOnly) || !$readOnly){ ?>
                <div class="login-button">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Buscar
                    </button>
                </div>
            <?php } ?>
            </form>
        </div>

        <div class="card-body card-block">
            <form action="<?= base_url("index.php/Materias/inscreverAlunoMateria")?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Nome da Matéria</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="reg_nome" name="reg_nome" placeholder=
                        "<?php if(isset($nomemateria)){echo $nomemateria;}?>"
                                                        disabled="" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Objetivo da Matéria</label></div>
                    <div class="col-12 col-md-9"><textarea name="reg_objetivo" id="reg_objetivo" rows="9" placeholder=
                        "<?php if(isset($objetivomateria)){echo $objetivomateria     ;}?>"
                                                           disabled="" class="form-control"></textarea></div>
                </div>
                <input type="hidden" id="reg_idMateria" name="reg_idMateria" value="<?php if(isset($idmateria)){echo $idmateria;}?>" class="form-control">
                <input type="hidden" id="reg_idHabilidades" name="reg_idHabilidades" value="<?php if(isset($idHabilidades)){echo $idHabilidades;}?>" class="form-control">
                <?php if(!isset($readOnly) || !$readOnly){ ?>
                <div class="login-button">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Inscrever
                    </button>
                </div>
                <?php }?>
            </form>
        </div>
</div>