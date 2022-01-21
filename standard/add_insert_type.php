<?php
$type_id = (isset($_GET['type_id'])) ? $_GET['type_id'] : '';
$type_name = (isset($_GET['type_name'])) ? $_GET['type_name'] : '';
if (isset($_POST) && !empty($_POST)) {
    $type_id = $_POST['type_id'];
    $type_name = $_POST['type_name'];
    $sql = "INSERT INTO type_tb VALUES (?,?) ";
    $params = array($type_id , $type_name);
    $sss = sqlsrv_query($conn, $sql, $params);
    if ($sss = true) {
        $alert = '<script type="text/javascript">';
        $alert .= 'alert("เพิ่มข้อมูลประเภทสำเร็จ !!");';
        $alert .= 'window.location.href = "?page=add_type";';
    
        $alert .= '</script>';
        echo $alert;
        exit();;
    } else {
        echo "Error: " . $sql . "<br>" . sqlsrv_errors($conn);
    }
    sqlsrv_close($conn);
}
?>
<form method="post" action="">
<section class="upcoming-meetings" id="meetings">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2 class="font-mirt">เพิ่มข้อมูลประเภทผลิตภัณฑ์</h2>
                </div>
            </div>
        <div class="container card-regis font">


            <hr>
            <br>
            <div class="">
                <div>
                    <label>หมายเลขผลิตภัณฑ์</label>
                    <input  type="text" name="type_id" class="form-control" autocomplete="off">
                    <label >ประเภทผลิตภัณฑ์</label>
                    <input type="text" name="type_name" class="form-control" autocomplete="off">
                </div>
            </div>
            <hr>
            <center>
                <div class="bt">
                    <button type="submit" class="btn btn-info bt">เพิ่มข้อมูล</button>
                </div>
            </center>
</form>
</div>



</section>