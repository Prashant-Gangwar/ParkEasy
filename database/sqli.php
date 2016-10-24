<?php

	$timezone = "Asia/Calcutta";
	date_default_timezone_set($timezone); 
	$datetime = date('d-m-Y H:i:s'); 
	$date = date('Y-m-d');

	function qExecute($sql)
	{
		global $q;
		return $q->query($sql);
	}

	function qExecuteObject($sql)
	{
		global $q;
		$rs = $q->query($sql);
		if($rs->num_rows==0)
			return 0;
		return $rs->fetch_object();
	}


	function qExecuteAssocArray($query) {
		global $q;
		$result = qExecute($query);
		$rows = array();
		// Put all row data into one array
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			array_push($rows, $row);
		}
		return $rows;
	}

	function qSelect($table,$col,$where="",$order="")
	{
		global $q;
        $sql = "SELECT $col FROM $table";
        if($where!="")
        {
        	$whr = " WHERE ";
        	$i=1;
        	$len = count($where);
        	foreach($where as $key=>$v)
	        {
	        	$v = $q->real_escape_string($v);
	            $whr .="$key='$v'";
	            if($i!=$len)
	                $whr.=" and ";
	            $i++;
	        }
	        $sql.=" $whr";
        }
        if($order!="")
        {
        	$sql.=" ORDER BY $order";
        }
		return $q->query($sql);
	}
	function qSelectObject($table,$col,$where="",$order="")
	{
		global $q;
		$sql = "SELECT $col FROM $table";
		if($where!="")
        {
        	$whr = " WHERE ";
	        $len = count($where);
	        $i=1;
			foreach($where as $key=>$v)
	        {
	        	$v = $q->real_escape_string($v);
	            $whr .="$key='$v'";
	            if($i!=$len)
	                $whr.=" and ";
	            $i++;
	        }
	        $sql.=" $whr";
        }
        if($order!="")
        {
        	$sql.=" ORDER BY $order";
        }
		$rs = $q->query($sql);
		if(!$rs || $rs->num_rows==0)
			return 0;
		return $rs->fetch_object();
	}

	function qSelectAssocArray($table,$col,$where="",$order="") {
		$result = qSelect($table,$col,$where,$order);
		$rows = array();
		// Put all row data into one array
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			array_push($rows, $row);
		}
		return $rows;
	}

	function qSelectAssocRow($table,$col,$where="",$order="") {
		$result = qSelect($table,$col,$where,$order);
		if ($result)
			return $result->fetch_array(MYSQLI_ASSOC);
		else
			return array();
	}

	function qDelete($table,$where)
    {
        global $q;
        if($where=="")
        	return 0;
	    $len = count($where);
	    $i=1;
	    $whr = "";
		foreach($where as $key=>$v)
	    {
	    	$v = $q->real_escape_string($v);
	        $whr .="$key='$v'";
	        if($i!=$len)
	            $whr.=" and ";
	        $i++;
	    }
        return $q->query("delete from $table where $whr");
    }
    function qInsert($table,$values)
    {
        global $q;
        $col = "";
        $val = "";
        foreach($values as $key=>$v)
        {
            $v = $q->real_escape_string($v);
            $col .= "$key,";
            $val .= "'$v',";
        }
        $col = trim($col, ",");
        $val = trim($val, ",");
        //echo "insert into $table ($col) values ($val)";
        $rs = $q->query("insert into $table ($col) values ($val)");
        return $q->insert_id;
    }
    function qUpdate($table,$values,$zupd_var,$zupd_val)
    {
        global $q;
        $val = "";
        foreach($values as $key=>$v)
        {
        	$v = $q->real_escape_string($v);
            $val .= "$key='$v',";
        }
        $val = trim($val,',');
        return $q->query("update $table set $val where $zupd_var='$zupd_val'");
    }

    function qUpdateMultiCondition($table,$values,$zupd_values="") {
        global $q;
        $val = "";
        foreach($values as $key=>$v)
        {
        	$v = $q->real_escape_string($v);
            $val .= "$key='$v',";
        }
        $val = trim($val,',');
		$whr = "";
		if($zupd_values!="")
        {
	        $len = count($zupd_values);
	        $i=1;
			foreach($zupd_values as $key=>$v)
	        {
	        	$v = $q->real_escape_string($v);
	            $whr .="$key='$v'";
	            if($i!=$len)
	                $whr.=" and ";
	            $i++;
	        }
        }
        return $q->query("update $table set $val where $whr");
    }

	function closeConnection() {
		global $q;
		return $q->close();
	}

	function getLastError() {
		global $q;
		return $q->error;
	}
?>
