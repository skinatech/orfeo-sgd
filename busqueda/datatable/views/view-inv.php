
    <div class="modal_content" olive-modal-content="" olive-scroll-shadow="envelope-history-window-scrollShadow" olive-scroll-shadow-initialized="true">

        <fieldset>
            <legend class="detalleSobre mb-3">Detalles del Inventario </legend>   

            <div class="def-list fgrid_cell" style="font-size: small; font-family: inherit;">
                <br>
                    <div class="row">
                        <div class="col-lg-3">
                            <strong>Unidad Administrativa:</strong>
                            
                            <?= $details['uni_administrativa']; ?>
                        </div>
                        <div class="col-lg-3">
                            <strong>Oficina Productora:</strong>
                            
                            <?= $details['ofi_productora']; ?>
                        </div>
                        <div class="col-lg-3">
                            <strong>Numero de Orden:</strong>
                            
                            <?= $details['no_orden']; ?>
                        </div>
                        <div class="col-lg-3">
                            <strong>Objeto:</strong>
                           
                            <?= $details['objeto']; ?>
                        </div>
                    </div>
                <br>
                    <div class="row">
                        <div class="col-lg-3">
                            <strong>Codigo:</strong>
                            
                            <?= $details['codigo']; ?>
                        </div>

                        <div class="col-lg-3">
                            <strong>Serie:</strong>
                       
                            <?= $details['nombre']; ?>
                        </div>
                        <div class="col-lg-3">
                            <strong>Sub-Serie:</strong>
                            
                            <?= $details['sub_serie']; ?>
                        </div>
                    </div>
                <br>
                    <div class="row">
                        <div class="col-lg-3">
                            <strong>Fecha Extrema (inicial):</strong>
                        </div>

                        <div class="col-lg-3">
                            <?= $details['fecha_ext_ini']; ?>
                        </div>

                        <div class="col-lg-3">
                            <strong>Fecha Extrema (final):</strong>
                        </div>

                        <div class="col-lg-3">
                            <?= $details['fecha_ext_end']; ?>
                        </div>
                    </div>
                <br>
            </div>

            <legend class="detalleSobre mb-3">Unidad de Conservación: </legend>   

            <div class="def-list fgrid_cell" style="font-size: small; font-family: inherit;">
                    <div class="row">

                        <div class="col-lg-3">
                            <strong>Caja:</strong>
                            <br>
                            <?= $details['caja']; ?>
                        </div> 

                        <div class="col-lg-3">
                            <strong>Carpeta:</strong>
                            <br>
                            <?= $details['carpeta']; ?>
                        </div>  

                        <div class="col-lg-3">
                            <strong>Tomo:</strong>
                            <br>
                            <?= $details['tomo']; ?>
                        </div>  

                        <div class="col-lg-3">
                            <strong>Otro:</strong>
                            <br>
                            <?= $details['otro']; ?>
                        </div> 
                    </div>
                <br>
                    <div class="row">
                        <div class="col-lg-3">
                            <strong>Modulo:</strong>
                            <br>
                            <?= $details['modulo']; ?>
                        </div>

                        <div class="col-lg-3">
                            <strong>Estante:</strong>
                            <br>
                            <?= $details['estante']; ?>
                        </div>

                        <div class="col-lg-3">
                            <strong>Numero de Folios:</strong>
                            <br>
                            <?= $details['no_folios']; ?>
                        </div>

                        <div class="col-lg-3">
                            <strong>Frecuencia de Consulta:</strong>
                            <br>
                            <?= $details['fr_consulta']; ?>
                        </div>
                    </div>
                <br> 
                    <div class="row">
                        <div class="col-lg-3">
                            <strong>Soporte:</strong>
                            <br>
                            <?= $details['soporte']; ?>
                        </div>  
                        <div class="col-lg-9">
                            <strong>Notas:</strong>
                            <br>
                            <?= $details['notas']; ?>
                        </div>  
                    </div>
            </div>   
        </fieldset>
    </div>
<br>


