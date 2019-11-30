<?php
class sql
{
	function connect()
	{
		$con = @mysql_connect(LOCALHOST,USER,PASSWORD);
		if (!$con)
		{
			header('Location: '.URL.'public/error.php?error=1000');
		}
		else
		{
			$seldb = @mysql_select_db(DB, $con);
			if(!$seldb)
			{
				header('Location: '.URL.'public/error.php?error=1001');
			}
		}
	}
	function update($tbl,$array_data,$id)
	{
		$query_data=query_maker($array_data);
		$id_data=query_maker($id);
		$query="UPDATE ".$tbl." SET ";
		$query .=$query_data;
		$query .=" where ".$id_data;
;
		$result=mysql_query($query);
		return $result;
	}
	function update_increment($tbl,$array_data,$id)
	{
		$query_data=query_maker($array_data);
		$id_data=query_maker($id);
		$query="UPDATE ".$tbl." SET ";
		$query .=$query_data;
		$query .=" where ".$id_data;
		$result=mysql_query($query);
		return $result;
	}
	function insert($tbl,$array_data)
	{
		$query_data=insert_maker($array_data);
		$query="INSERT INTO ".$tbl." ";
	    $query .=$query_data;
        $result=mysql_query($query);
		return $result;
	}
	function check($tbl,$array_data)
	{
		$query_data=check_maker($array_data);
		$query="SELECT * FROM ".$tbl." WHERE ";
		$query .=$query_data;
		$result=mysql_num_rows(mysql_query($query));
		return $result;
	}
	function delete($tbl,$id)
	{
		$query_data=query_maker($id);
		$query="DELETE FROM ".$tbl." WHERE ";
		$query .=$query_data;
		$result=mysql_query($query);
		return $result;
	}
	function last_id()
	{
		return mysql_insert_id();
	}
	function fetch($tbl,$array_data)
	{
		$query_data=check_maker($array_data);
		$query="SELECT * FROM ".$tbl." WHERE ";
		$query .=$query_data;
		$result=mysql_fetch_assoc(mysql_query($query));
		return $result;
	}
	function fetchAll($tbl,$array_data,$groupBy="")
	{
		$query_data=check_maker($array_data);
		$query="SELECT * FROM ".$tbl." WHERE ";
		$query .=$query_data;
		$query .=" ".$groupBy;

		$query=mysql_query($query);
		$rows=array();
		while($row=mysql_fetch_assoc($query))
		{
			 array_push($rows, $row);
		}
		
		return $rows;
	}
	function PagingNationFetch($statement,$page=1,$limit=50,$old_data_get='')
	{
		//pagignation
    	$startpoint = ($page * $limit) - $limit;
		$query = mysql_query("SELECT * FROM ".$statement." LIMIT ".$startpoint." , ".$limit."");
		$rows=array();
		while($row=mysql_fetch_assoc($query))
		{
			 array_push($rows, $row);
		}
		return $rows;
	}
}
?>