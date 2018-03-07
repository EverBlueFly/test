<html>
<head>
<title>上班打卡</title>
</head>
</html>
<table>
 <?php 				
         if(isset($_POST['Select'])) {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '1234';
            echo "<tr><TD bgcolor='red'>服務單位</TD><td bgcolor='orange'>姓名</TD><td bgcolor='yellow'>參加彩排需領時數</td><td bgcolor='green'>主動取消服務</td><td bgcolor='blue'>已領彩排時數</td><td bgcolor='purple'>上班時間</TD><td bgcolor='red'>打卡上班</td><td bgcolor='orange'>打卡下班</td><td bgcolor='yellow'>備註</td></tr>";
            $conn = mysql_connect($dbhost, $dbuser, $dbpass);
            
            if(! $conn ) {
               die('Could not connect: ' . mysql_error());
            }
            
            $ID = $_POST['ID'];
             mysql_query("SET NAMES 'utf8'");

            $sql = "Select *  from `open`WHERE ID = \"$ID\" or barcode = \"$ID\"" ;
            mysql_select_db('merge');
                $result = mysql_query($sql,$conn) or die('MySQL query error');

				if(mysql_num_rows($result)==0){
					echo "<font size=\"70px\" color=\"red\">查無此開閉幕志工，請確認</font>";
				}
				else{
									$row = mysql_fetch_array($result);
			if($row['打卡上班時間']!="0000-00-00 00:00:00"){
            echo "<font size=\"70px\" color=\"red\">此志工已有上班打卡資料!</FONT>";
			        	echo "<tr><td>";
			echo $row['服務單位'];
			echo "</td>";
        	echo "<td>";
	echo $row['姓名']; 
        	echo "</td><td>";
			echo $row['需領時數'];
        	echo "</td><td>";
			echo $row['取消'];
			echo "</td><td>";
			echo $row['國關'];
			echo "</td><td>";
	echo $row['上班時間'];
        	echo "</td>"; 
	        	echo "<td>";
    echo $row['打卡上班時間'];
	echo "</td><td>";
    echo $row['打卡下班時間'];	
	    echo "</td><td>";
    echo $row['備註'];	
	echo "</td><td></tr>";
    }
	ELSE{
		echo "上班打卡成功!";
				$sql = "update `open` set `打卡上班時間` = NOW(),`到勤`=\"V\" WHERE barcode=\"$ID\" OR ID = \"$ID\"";
		            mysql_select_db('merge');
               $result = mysql_query($sql,$conn) or die('MySQL query error');
		
		            $sql = "Select *  from `open`WHERE ID = \"$ID\" or barcode = \"$ID\"" ;
            mysql_select_db('merge');
                $result = mysql_query($sql,$conn) or die('MySQL query error');
				$row = mysql_fetch_array($result);
			        	echo "<tr><td>";
			echo $row['服務單位'];
			echo "</td>";
        	echo "<td>";
	echo $row['姓名']; 
        	echo "</td><td>";
			echo $row['需領時數'];
        	echo "</td><td>";
			echo $row['取消'];
			echo "</td><td>";
			echo $row['國關'];
			echo "</td><td>";
	echo $row['上班時間'];
        	echo "</td>"; 
	        	echo "<td>";
    echo $row['打卡上班時間'];
	echo "</td><td>";
    echo $row['打卡下班時間'];
    echo "</td><td>";
    echo $row['備註'];	
	echo "</td><td></tr>";
	}
		 }
		 }
            /*
            if(! $result ) {
               die('Could not SELECT data: ' . mysql_error());
            }
            echo "SELECT data successfully\n";
            
            mysql_close($conn);
         }else {    
 }*/
           ?>
		   
		   
		   <FORM METHOD = "POST" ACTION = "<?php $_PHP_SELF ?>">
<tr>
 <td>ID:</TD>
 <td><input name = "ID" type = "text" 
         id = "ID" onkeyup="value=value.replace(/[\W]/g,'')" autofocus></td>
</TR>
<TR>
                        <td>
                           <input name = "Select" type = "submit" 
                              id = "Select" value = "Submit">
                        </td>
</TR>
</FORM>
</table>
