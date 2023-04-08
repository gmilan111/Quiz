<?php 

$conn = oci_connect("milan", "1234aaaa", "localhost/XE");

if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} //else {
    //echo "Sikeres megjelenítés";
//}

?>