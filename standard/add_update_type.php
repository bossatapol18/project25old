<?php
if (isset($_GET['type_id']) && !empty($_GET['type_id'])) {
    $type_id = $_GET['type_id'];
    $sql = "SELECT * FROM type_tb WHERE type_id = ? ";
    $params = array($type_id);
    $query = sqlsrv_query($conn, $sql, $params);
    $result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC);
}
if (isset($_POST) && !empty($_POST)) {
    $type_name = $_POST['type_name'];
    $sql = "UPDATE type_tb SET type_name= ?  WHERE type_id = ? ";
    $params = array($type_name, $type_id);

    if (sqlsrv_query($conn, $sql , $params)) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("แก้ไขข้อมูลประเภทสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_type";';
        $alert .= '</script>';
        echo $alert;
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);
    }
    sqlsrv_close($conn);
}
?>
<section class="upcoming-meetings" id="meetings">
    <div class="container">
        <div class="row">
        <div class="col-lg-12">
            <div class="section-title">
          <h2 class="font-mirt">เพิ่มข้อมูลพื้นฐาน</h2>
          <h3 class="font-mirt">แก้ไขประเภทผลิตภัณฑ์</h3>
        </div>
            </div>


    </div>
    <form action="" method="post" enctype=multipart/form-data>

        <div class="container  tab-content font">
            <div id="home" class="container-fluid tab-pane active m-2">
                <div class="mb-3">
                    <label class="form-label">ชื่อประเภท</label>
                    <input type="text" class="form-control" value="<?php echo $result['type_name'] ?>" name="type_name" placeholder="ชื่อประเภท :" required autocomplete="off">
                </div>
                <button type="submit" class="btn btn-primary">บันทึก</button>
    </form>
    </div>
    </div>