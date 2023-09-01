
    <div class="modal_content" olive-modal-content="" olive-scroll-shadow="envelope-history-window-scrollShadow" olive-scroll-shadow-initialized="true">

        <fieldset>
            <legend class="detalleSobre">Documentos</legend>
            <div class="ng-scope overflowTable">
                <table class="table table-tight table-hasDividers table-striped" style="font-size: small; font-family: inherit;">
                    <thead>
                        <tr>
                            <th class="ng-binding">Nombre Original</th>
                            <th class="ng-binding">Tipo</th>
                            <th class="ng-binding">Documento</th>
                            <th class="ng-binding">Tamaño</th>
                            <th class="ng-binding">Usuario Creador</th>
                            <th class="ng-binding">Fecha de Creacion</th>
                            <th class="ng-binding">Accion</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
                            if(!empty($result)){ 
                        
                                foreach($result as $events){  ?>
        
                                    <tr class="ng-scope">
                                        <td class="ng-binding">        <?=   $events['original_inv_doc']       ?>             </td>
                                        <td class="ng-binding">        <?=   $events['tipo_inv_doc']           ?>             </td>
                                        <td class="ng-binding">        <?=   $events['nombre_inv_doc']         ?>             </td>
                                        <td class="ng-binding">        <?=   ($events['tamano_inv_doc']/1000).' KB'         ?>             </td>
                                        <td class="ng-binding">        <?=   $events['usua_nomb']              ?>             </td>
                                        <td class="ng-binding">        <?=   $events['creacion_inv_doc']       ?>             </td>
                                        <td class="ng-binding">         
                                            <span 
                                                style="color: #682B38; font-size: 18px; margin:4px; cursor:pointer;" 
                                                class="glyphicon glyphicon-download-alt" 
                                                data-toggle="tooltip" title="Descargar" 
                                                aria-hidden="true" 
                                                onclick="download('<?php echo $events['original_inv_doc']; ?>','<?php echo $events['link_document']; ?>')">
                                            </span>
                                        </td>
                                    </tr>

                        <?php  }  

                            }else{
                                echo "<tr class='ng-scope'> <td colspan='7'> No se encontraron documentos adjuntos para este inventario  </td> </tr>";
                            } 
                        ?> 

                    </tbody>
                </table>
            </div>
        </fieldset>   
    </div>
<br>


