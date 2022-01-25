<?php

//fetch.php

require 'connection.php' ;

if($_POST["query"] != '')
{
	$search_array = explode(",", $_POST["query"]);
	$search_text = "'" . implode("', '", $search_array) . "'";
	$query = "
	SELECT * , a.standard_status,x.statuss_name AS name_status ,  a.standard_idtb,bb.type_name AS name_type , a.standard_idtb,cc.group_name AS name_group , a.standard_idtb,dd.department_name AS name_depart , a.standard_idtb,e.fileupload AS name_file
	FROM main_std a 
	-- status
	LEFT JOIN select_status x ON a.standard_status = x.id_statuss
	-- type
	LEFT JOIN dimension_type b ON a.standard_idtb = b.standard_idtb 
	LEFT JOIN type_tb bb ON b.type_id = bb.type_id
	-- group
	LEFT JOIN dimension_group c ON a.standard_idtb = c.standard_idtb 
	LEFT JOIN group_tb cc ON c.group_id = cc.group_id
	-- depart
	LEFT JOIN dimension_department d ON a.standard_idtb = d.standard_idtb 
	LEFT JOIN department_tb dd ON d.department_id = dd.department_id
	-- file
	LEFT JOIN dimension_file e ON a.standard_idtb = e.standard_idtb  WHERE a.standard_status IN (".$search_text.") 
	";
}
else
{
	$query = "SELECT * , a.standard_status,x.statuss_name AS name_status ,  a.standard_idtb,bb.type_name AS name_type , a.standard_idtb,cc.group_name AS name_group , a.standard_idtb,dd.department_name AS name_depart , a.standard_idtb,e.fileupload AS name_file
	FROM main_std a 
	-- status
	LEFT JOIN select_status x ON a.standard_status = x.id_statuss
	-- type
	LEFT JOIN dimension_type b ON a.standard_idtb = b.standard_idtb 
	LEFT JOIN type_tb bb ON b.type_id = bb.type_id
	-- group
	LEFT JOIN dimension_group c ON a.standard_idtb = c.standard_idtb 
	LEFT JOIN group_tb cc ON c.group_id = cc.group_id
	-- depart
	LEFT JOIN dimension_department d ON a.standard_idtb = d.standard_idtb 
	LEFT JOIN department_tb dd ON d.department_id = dd.department_id
	-- file
	LEFT JOIN dimension_file e ON a.standard_idtb = e.standard_idtb ";
}

$result = sqlsrv_query($conn,$query);
$total_row = sqlsrv_num_rows($result);
$i=1;
$output = '';


	while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC))
	{
		$output .= '
		<tr>
		<td>'.$i++.'</td>
		<td>'.$row["name_status"].'</td>
		<td>'.$row["standard_day"].'</td>
		<td>'.$row["standard_detail"].'</td>
		<td>'.$row["name_type"].'</td>
		<td>'.$row["name_group"].'</td>
		<td>'.$row["name_depart"].'</td>
		<td>'.$row["name_file"].'</td>
		</tr>
		';
	}

echo $output;


?>