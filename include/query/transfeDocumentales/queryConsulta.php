<?php 
switch ($db->driver) {
    case 'mssql':
        
        $sqlC = "";
       
        break;
    case 'mysql':
        
        $sqlC = "";
        
        break;
    case 'oracle':
    case 'oci8':
        $sqlC = "";

        break;
    case 'postgres':
        $sqlC = "SELECT 
                R.RADI_NUME_RADI,
                E.SGD_EXP_NUMERO,
                CASE WHEN PAREXP.SGD_PAREXP_ORDEN = 1 THEN SEXP.SGD_SEXP_PAREXP1
                WHEN PAREXP.SGD_PAREXP_ORDEN = 2 THEN SEXP.SGD_SEXP_PAREXP2
                WHEN PAREXP.SGD_PAREXP_ORDEN = 3 THEN SEXP.SGD_SEXP_PAREXP3
                WHEN PAREXP.SGD_PAREXP_ORDEN = 4 THEN SEXP.SGD_SEXP_PAREXP4
                WHEN PAREXP.SGD_PAREXP_ORDEN = 5 THEN SEXP.SGD_SEXP_PAREXP5
                  END AS NOMBRE_EXPEDIENTE,
                SRD.SGD_SRD_DESCRIP AS SERIE, 
                SBRD.SGD_SBRD_DESCRIP AS SUBSERIE,
                TD.sgd_tpr_descrip AS TIPO_DOCUMENTAL,
                E.SGD_EXP_FECH_ARCH AS FECHA_ARCHIVADO,
                D.DEPE_NOMB AS DEPENDENCIA_ARCHIVADO,
                U.USUA_NOMB AS USUARIO_ARCHIVADO
 
            FROM RADICADO AS R
            INNER JOIN SGD_EXP_EXPEDIENTE AS E ON E.RADI_NUME_RADI = R.RADI_NUME_RADI
            INNER JOIN SGD_SEXP_SECEXPEDIENTES AS SEXP ON E.SGD_EXP_NUMERO = SEXP.SGD_EXP_NUMERO
            INNER JOIN SGD_PAREXP_PARAMEXPEDIENTE AS PAREXP ON E.depe_codi = PAREXP.depe_codi
            INNER JOIN SGD_SRD_SERIESRD AS SRD ON SEXP.SGD_SRD_CODIGO = SRD.SGD_SRD_CODIGO
            INNER JOIN SGD_SBRD_SUBSERIERD AS SBRD ON SEXP.SGD_SRD_CODIGO = SBRD.SGD_SRD_CODIGO AND SEXP.SGD_SBRD_CODIGO = SBRD.SGD_SBRD_CODIGO
            INNER JOIN SGD_TPR_TPDCUMENTO AS TD ON R.TDOC_CODI = TD.SGD_TPR_CODIGO
            INNER JOIN DEPENDENCIA AS D ON E.DEPE_CODI = D.DEPE_CODI
            INNER JOIN USUARIO U ON R.RADI_USUA_ACTU = U.USUA_CODI AND R.RADI_DEPE_ACTU = U.DEPE_CODI 
            
            WHERE R.DOC_TRANSFERIDO = 1 AND E.sgd_exp_estado = '1' and ";

        break;
}
