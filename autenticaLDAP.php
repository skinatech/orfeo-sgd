<?php

/**
 * En este frame se van cargado cada una de las funcionalidades del sistema
 *
 * Descripcion Larga
 *
 * @category
 * @package      SGD Orfeo
 * @subpackage   Main
 * @author       Community
 * @author       Skina Technologies SAS (http://www.skinatech.com)
 * @license      GNU/GPL <http://www.gnu.org/licenses/gpl-2.0.html>
 * @link         http://www.orfeolibre.org
 * @version      SVN: $Id$
 * @since
 */
/* ---------------------------------------------------------+
  |                     INCLUDES                             |
  +--------------------------------------------------------- */


/* ---------------------------------------------------------+
  |                    DEFINICIONES                          |
  +--------------------------------------------------------- */

$ldapServer = '172.16.0.15'; //Nombre o IP del servidor de autenticacion LDAP
$cadenaBusqLDAP = 'dc=esepastosalud, dc=local'; //Cadena de busqueda en el servidor.
$campoBusqLDAP = 'sAMAccountName'; //Campo seleccionado (de las variables LDAP)
$adminLDAP = 'cn=consulta,ou=aplicaciones,dc=unicordoba,dc=edu,dc=co';
$paswLDAP = 'w9NaL0JHOv';

/* ---------------------------------------------------------+
  |                       MAIN                               |
  +--------------------------------------------------------- */
//echo '***********';
if ($connect = ldap_connect($ldapServer)) {
    
    ldap_set_option($connect, LDAP_OPT_PROTOCOL_VERSION, 3);
    ldap_set_option($connect, LDAP_OPT_REFERRALS, 0);

    $bind = ldap_bind($connect, $adminLDAP, $paswLDAP);
    
    // enlace a la conexión
    if (($bind = ldap_bind($connect, $adminLDAP, $paswLDAP)) == false) {
        $mensajeError = "Falla la conexi&oacute;n con el servidor LDAP<br>" . $bind . $connect;
    } 
//    else  echo "Estoy conectado ..que bien <br>\n".$bind ;

    // busca el usuario
    if (($res_id = ldap_search($connect, "$cadenaBusqLDAP", "($campoBusqLDAP=$username)")) == false) {
        $mensajeError = "No encontrado el usuario en el Arbol LDAP (" . $res_id . ")" . $username;
    } 
//    else  echo "Encontre usuario ..que bien (" . $res_id . ") " . $username."<br>\n " ;

    if (ldap_count_entries($connect, $res_id) != 1) {
        $mensajeError = "El usuario $username se encontr&oacute; mas de 1 vez<br>";
//        echo $mensajeError.'<br>';
    } 
//    else  echo "Solo un usuario encontrado ..que bien <br>\n " ;

    if (( $entry_id = ldap_first_entry($connect, $res_id)) == false) {
        $mensajeError = "No se obtuvieron resultados<br>";
//        echo $mensajeError.'<br>';
    } 
//    else  echo "Obtiene el primer resultado ..que bien <br>\n " ;

    if (( $user_dn = ldap_get_dn($connect, $entry_id)) == false) {
        $mensajeError = "No se puede obtener el dn del usuario<br>";
        $noexit = 'si';
//        echo $mensajeError.' ***** '.$user_dn.'<br>';
    } 
//    else  echo "DN del usuario encontrado..que bien <br>\n ".$user_dn."<br>" ; 

    /* Autentica el usuario */
    if (($link_id = ldap_bind($connect, $user_dn, $password)) == false) {
        $mensajeError = "usuario o contraseña incorrectos";
    } 
//    else echo "Usuario conectado ..que bien <br>  \n ".$link_id.' ***** '.ldap_bind($connect, $user_dn, $password)."<br>" ; 
     
    ldap_close($connect);
    
} else {
    $mensajeError = "no hay conexión a '$ldap_server'";
}
?>
