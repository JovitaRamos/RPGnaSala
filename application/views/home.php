
        <!-- Right Panel -->
    <div id="right-panel" class="right-panel">

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
        </div>
                            <?php    
                            foreach ($dadosAluno as $dadoAluno):
                                echo '<div class="content mt-3">';
                                echo '<div class="animated fadeIn">';
                                echo '<div class="row">';
                                echo '<div class="col-lg-6">';
                                echo '<div class="card">';
                                echo '<div class="card-header">';
                                echo '<strong class="card-title">'.$dadoAluno['NomeMateria'].'</strong></div>';
                                echo '<div class="card-body">';
                                echo '<table class="table table-striped">';
                                $total = 0;
                                foreach ($habilidades as $habilidadesAluno):
                                    if ($habilidadesAluno['idHabilidades'] === $dadoAluno['idHabilidades'])
                                    {
                                        echo '<tr><thead>';
                                        echo '<th scope="col"></th>';
                                        echo '<th scope="col">'.$habilidadesAluno['nome'].'</th>';
                                        echo '<th scope="col">Nível:</th>';
                                        echo '<th scope="col">'.$habilidadesAluno['nivel'].'</th>';
                                        echo '</tr></thead><tbody>';
                                        
                                        $index = 0;
                                        
                                        foreach ($desafiosAluno as $desafio):
                                            if ($desafio['idHabilidades'] === $dadoAluno['idHabilidades'])
                                            {
                                                $nota = isset($desafio['nota'])?$desafio['nota']:0;
                                                $valorExperiencia = isset($desafio['valorExperiencia'])?$desafio['valorExperiencia']:0;
                                                $total = $total + $nota;
                                                echo '<tr>';
                                                echo '<td>'.++$index.'</td>';
                                                echo '<td>'.$desafio['nome'].'</td>';
                                                echo '<td>Exp:</td>';
                                                echo '<td>'.$nota.'/'.$valorExperiencia.'</td>';
                                                echo '</tr>';
                                            }
                                        endforeach;
                                    }
                                endforeach;
                                echo '</tbody>';
                                echo '<tfoot><tr>';
                                echo '<td colspan=3>Total</td>';
                                echo '<td>'.$total.'</td>';
                                echo '</tr></tfoot>';
                                echo '</table></div></div></div></div></div></div>';
                            endforeach;
                            ?>

                     <!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->

