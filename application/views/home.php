
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
                            <?
                            //print_r($dadosAluno);
                            foreach ($dadosAluno as $dadosAluno):
                                echo '<div class="content mt-3">';
                                echo '<div class="animated fadeIn">';
                                echo '<div class="row">';
                                echo '<div class="col-lg-6">';
                                echo '<div class="card">';
                                echo '<div class="card-header">';
                                echo '<strong class="card-title">'.$dadosAluno['NomeMateria'].'</strong></div>';
                                echo '<div class="card-body">';
                                echo '<table class="table table-striped">';
                                echo '<tr>';
                                    echo '<th scope="col">Habilidade</th>';
                                    echo '<th scope="col">Nível</th>';
                                    echo '<th scope="col">Experiencia</th>';
                                    echo '</tr></thead><tbody>';

                                    foreach ($dadosAluno as $dadoAluno):
                                    echo '<tr>';
                                    echo '<th scope="row">'.$habilidadesAluno['nome'].'</th>';
                                    echo '<td>'.$habilidadesAluno['nivel'].'</td>';
                                    echo '<td>'.$habilidadesAluno['experiencia'].'</td>';
                                    echo '</tr>';

                                    endforeach;
                                echo '</tbody>';
                                echo '</table></div></div></div></div></div>';
                            endforeach;
                            ?>

                     <!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Right Panel -->

