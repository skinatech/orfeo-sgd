    <div class="modal_content" olive-modal-content="" olive-scroll-shadow="envelope-history-window-scrollShadow"
        olive-scroll-shadow-initialized="true">

        <fieldset>
            <legend class="detalleSobre">Detalles del Radicado: <?= $request['radi_nume_radi'] ?> </legend>
            <div class="def-list fgrid_cell" style="font-size: small; font-family: inherit;">

                <br>

                <div class="row">
                    <div class="col-lg-3">
                        <strong>Usuario actual:</strong>
                        <br>
                        <?= $details['radi_usua_actu']; ?>
                    </div>
                    <div class="col-lg-3">
                        <strong>Dependencia actual:</strong>
                        <br>
                        <?= $details['radi_depe_actu']; ?>
                    </div>
                    <div class="col-lg-3">
                        <strong>Usuario radicador:</strong>
                        <br>
                        <?= $details['radi_usua_radi']; ?>
                    </div>
                    <div class="col-lg-3">
                        <strong>Dependencia de radicacion:</strong>
                        <br>
                        <?= $details['radi_depe_radi']; ?>
                    </div>
                </div>

            </div>
        </fieldset>

        <br>

        <fieldset>
            <legend class="detalleSobre">Documentos</legend>
            <div class="ng-scope overflowTable">
                <table class="table table-tight table-hasDividers table-striped"
                    style="font-size: small; font-family: inherit;">
                    <thead>
                        <tr>
                            <th class="ng-binding">Radicado</th>
                            <th class="ng-binding">Tipo</th>
                            <th class="ng-binding">TRD</th>
                            <th class="ng-binding">Creador</th>
                            <th class="ng-binding">Descripcion</th>
                            <th class="ng-binding">Anexado</th>
                            <th class="ng-binding">Documento</th>
                            <th class="ng-binding">Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            if(!empty($result)){ 
                        
                                foreach($result as $events){  ?>

                        <tr class="ng-scope">
                            <td class="ng-binding"> <?=   $events['radi_nume_salida']     ?> </td>
                            <td class="ng-binding"> <?=   $events['anex_tipo_desc']       ?> </td>
                            <td class="ng-binding"> <?=   $events['trd_desc']             ?> </td>
                            <td class="ng-binding"> <?=   $events['usua_nomb']            ?> </td>
                            <td class="ng-binding"> <?=   $events['anex_desc']            ?> </td>
                            <td class="ng-binding"> <?=   $events['anex_radi_fech']       ?> </td>
                            <td class="ng-binding"> <?=   $events['documento']            ?> </td>
                            <td class="ng-binding">
                                <!-- <span style="color: #682B38; font-size: 18px; margin:4px; cursor:pointer;"
                                    class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="Descargar"
                                    aria-hidden="true"
                                    onclick="download('<?php echo $events['anex_nomb_archivo']; ?>','<?php echo $events['link_document']; ?>')">
                                </span> -->

                                <a href="<?php echo $events['link']; ?>" download>
                                    <span style="color: #682B38; font-size: 18px; margin:4px; cursor:pointer;"
                                        class="glyphicon glyphicon-download-alt" data-toggle="tooltip" title="Descargar"
                                        aria-hidden="true">
                                    </span>                              
                                </a>
                            </td>
                        </tr>

                        <?php  }  

                            }else{
                                echo "<tr class='ng-scope'> <td colspan='7'> No se encontraron documentos adjuntos para este radicado  </td> </tr>";
                            } 
                        ?>

                    </tbody>
                </table>
            </div>
        </fieldset>
    </div>
    <br>