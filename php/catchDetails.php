<?php
function catchDetailsFun($conn, $idVersion){
    $sql="SELECT * FROM evenement INNER JOIN version ON evenement.ID_EVENT=version.ID_EVENT WHERE version.ID_VERSION=:idVersion";
    $EventStatement =$conn->prepare($sql);
    
    $EventStatement->execute(array('idVersion'=>$idVersion));
    return $EventStatement->fetch(PDO::FETCH_ASSOC);
}

?>