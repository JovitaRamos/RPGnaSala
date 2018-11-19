
<div class="col-lg-6">
    <div class="login-form-1">
        <div class="card-header">
            <strong>Gerenciar</strong> Materia
        </div>
        <div class="card-body card-block">
            <form action="<?= base_url("index.php/Materias/atualizar_materia")?>" method="post" enctype="multipart/form-data" class="form-horizontal">
                <input type="hidden" id="reg_id" name="reg_id" value="<?php echo $Materia->id; ?>">
                <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Nome Matéria</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="reg_nome" name="reg_nome" value="<?php echo$Materia->nome;?>" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Codigo da Matéria</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="reg_codMateria" name="reg_codMateria" value="<?php echo$Materia->codMateria;?>" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Numero de Alunos</label></div>
                    <div class="col-12 col-md-9"><input type="number" id="reg_quantidadeAlunos" name="reg_quantidadeAlunos" value="<?php echo$Materia->quantidadeAlunos;?>" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Objetivo da Matéria</label></div>
                    <div class="col-12 col-md-9"><textarea name="reg_objetivo" id="reg_objetivo" rows="9" class="form-control"><?php echo$Materia->objetivo;?></textarea></div>
                </div>
                <div class="login-button">
                    <button type="submit"  class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Atualizar
                    </button>
                </div>

            </form>
        </div>

    </div>

</div>
