
    
    <?php ?>
    
  
    <div class="modal_content" olive-modal-content="" olive-scroll-shadow="envelope-history-window-scrollShadow" olive-scroll-shadow-initialized="true">

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
            <legend class="detalleSobre">Actividades</legend>
            <div class="ng-scope overflowTable">
                <table class="table table-tight table-hasDividers table-striped" style="font-size: small; font-family: inherit;">
                    <thead>
                        <tr>
                            <th class="ng-binding">Dependencia</th>
                            <th class="ng-binding"> Hora</th>
                            <th class="ng-binding">Transaccion</th>
                            <th class="ng-binding">Usuario</th>
                            <th class="ng-binding">Actividad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php  foreach($result as $events){  ?>
        
                            <tr class="ng-scope">
                                <td class="ng-binding">        <?=   $events['depe_nomb']       ?>             </td>
                                <td class="ng-binding">        <?=   $events['hist_fech']       ?>             </td>
                                <td class="ng-binding">        <?=   $events['sgd_ttr_codigo']  ?>             </td>
                                <td class="ng-binding">        <?=   $events['usua_nomb']       ?>             </td>
                                <td class="ng-binding">        <?=   $events['hist_obse']       ?>             </td>
                            </tr>

                        <?php  } ?> 

                    </tbody>
                </table>
            </div>
        </fieldset>   
    </div>
<br>


