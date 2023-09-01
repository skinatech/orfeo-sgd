<?php

if($_FILES['firmaUsuario']['name'] != ""){
    
    $urlFileServer = $ruta_raiz . '/bodega/firmas_usuarios/';
    $filenameFinal = 'firma_usuario_'.$cedula . '.png';
    
    $path = pathinfo($_FILES['firmaUsuario']['name']);
    
    $ext = $path['extension'];
   
    if($ext !== 'png'){
        //return 'La imagen no es de formato png';
    }else{
        
        $temp_name = $_FILES['firmaUsuario']['tmp_name'];
        
        $error_uploaded = $_FILES['firmaUsuario']['error'];
        
        if(is_uploaded_file($temp_name)){
            
            $file_uploaded = move_uploaded_file($temp_name, $urlFileServer . $filenameFinal);
            
        }else{
            //
        }
        
    }
    
}