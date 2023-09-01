<?php
function getDomainUser() {
//    echo 'Obteniendo usuario autenticado'.$_SERVER['REMOTE_USER'];
    $cred = explode('\\', $_SERVER['REMOTE_USER']);
    if (count($cred) == 1)
        array_unshift($cred, "Error al obtener la información del Dominio");
    list($domain, $user) = $cred;
    return $user;
}
//
$userAutologin = getDomainUser(); // asi saca el usuario logeado en windows
if (strtolower($userAutologin) != "invitado") {
        echo $userAutologin; 
}

$indicesServer = array(
    'REMOTE_ADDR',
    'REMOTE_HOST',
    'REMOTE_PORT',
    'REMOTE_USER',
    'PHP_AUTH_USER',
    'AUTH_USER');

echo '<table cellpadding="10">';
foreach ($indicesServer as $arg) {
    if (isset($_SERVER[$arg])) {
        echo '<tr><td>' . $arg . '</td><td>' . $_SERVER[$arg] . '</td></tr>';
    } else {
        echo '<tr><td>' . $arg . '</td><td>-</td></tr>';
    }
}
echo '</table>';
