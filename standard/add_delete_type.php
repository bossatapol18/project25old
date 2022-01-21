<?php
if (isset($_GET['type_id']) && !empty($_GET['type_id'])) {
    $type_id = $_GET['type_id'];
    $sql = "DELETE FROM type_tb WHERE type_id = ? ";
    $params = array($type_id);
    if (sqlsrv_query($conn, $sql, $params)) {
        // echo "ลบข้อมูลสำเร็จ";
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("ลบประเภทสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_type";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);
    }
    sqlsrv_close($conn);
}
