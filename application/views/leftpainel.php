
        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href=<?= base_url("index.php/Materias/view")?>><img src="<?php echo base_url(); ?>assets/img/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href=<?= base_url("index.php/Materias/view")?>><img src="<?php echo base_url(); ?>assets/img/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?= base_url("index.php/Materias/view")?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Professor</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">

                    <li class="menu-item-has-children dropdown">

                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-book"></i>Matérias</a>
                        <ul class="sub-menu children dropdown-menu">
                            <?php
                            if ($materias){
                                foreach ($materias as $materia):
                                    echo '<li><i class="fa fa-table"></i><a href="/RPGnaSala/index.php/Materias/gerenciar?id=',urlencode($materia['id']),'">'.$materia['nome'].'</a></li>';
                                endforeach;
                            }
                            ?>
                            <li><i class="fa fa-plus-square"></i><a href=<?= base_url("index.php/Materias/cadastroMateria_view")?>>Cadastrar</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-bolt"></i>Habilidades</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-cogs"></i><a href="ui-buttons.html">Gerenciar</a></li>
                            <li><i class="fa fa-plus-square"></i><a href=<?= base_url("index.php/Habilidades/view")?>>Cadastrar</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-puzzle-piece"></i>Desafios</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-check-square-o"></i><a href=<?= base_url("index.php/Desafios/corrigir")?>>Corrigir</a></li>
                            <li><i class="fa fa-cogs"></i><a href=<?= base_url("index.php/Desafios/gerenciar")?>>Gerenciar</a></li>
                            <li><i class="fa fa-plus-square"></i><a href=<?= base_url("index.php/Desafios/view")?>>Cadastrar</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">Aluno</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-book"></i>Matérias</a>
                        <ul class="sub-menu children dropdown-menu">
                            <?php
                            if($materiasAluno)
                            {
                                foreach ($materiasAluno as $materiaAluno):
                                    echo '<li><i class="fa fa-table"></i><a href="tables-basic.html">'.$materiaAluno['nome'].'</a></li>';
                                endforeach;
                            }
                            ?>
                            <li><i class="menu-icon ti-check-box"></i><a href=<?= base_url("index.php/Materias/inscricaoMateria_view")?>>Inscrever</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-stats-up"></i>Habilidades</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-cogs"></i><a href='#'>Gerenciar</a></li>
                            <li><i class="menu-icon ti-check-box"></i><a href='#'>Cadastrar</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon ti-ruler-pencil"></i>Desafios</a>
                        <ul class="sub-menu children dropdown-menu">
                            <?php
                            if (isset($desafiosAluno)){
                                foreach ($desafiosAluno as $desafio):
                                
                                    $pattern = 'Y-m-d';
                                    $today = date($pattern);
                                    $dataInicio = date($pattern, strtotime($desafio['dataInicio']));
                                    $dataFim = date($pattern, strtotime($desafio['dataFim']));
                                    if($today >= $dataInicio && $today <= $dataFim){
                                        echo '<li><i class="menu-icon ti-check-box"></i><a href="/RPGnaSala/index.php/Desafios/resolver?id=',urlencode($desafio['id']),'">'.$desafio['nome'].'</a></li>';
                                    }
                                endforeach;
                            }
                            ?>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
    <!-- Left Panel -->

