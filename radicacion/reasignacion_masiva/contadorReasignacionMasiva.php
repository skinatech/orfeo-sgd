<?php
$phpsession = session_name() . "=" . session_id();
$fechah = date("dmy") . "_" . time();

$queryContadorReasignadosMasivos = "SELECT COUNT(*) AS CONTADOR FROM radicado WHERE carp_codi = '14' AND radi_depe_actu = '" . $_SESSION['dependencia'] . "' AND radi_usua_actu = '" . $_SESSION['codusuario'] . "' AND radi_nume_deri = '0'";
$rsContadorReasignadosMasivos = $db->conn->query($queryContadorReasignadosMasivos);
?>

<div style="margin-left: 10px; margin-bottom: 3px;">
    <div style="background-color: #365c8a !important; display: inline-block; padding: 7px; border-radius: 10px;">
        <a href='cuerpo.php?<?= $phpsession ?>&adodb_next_page=1&fechah=<?php echo "$fechah&nomcarpeta=NULL&carpeta=14&tipo_carpt=0&adodb_next_page=1"; ?>' style="color: white;">Reasignación masiva<span class="badge"><?= $rsContadorReasignadosMasivos->fields["CONTADOR"]; ?></span></a>
    </div>
</div>