// php code inside download.php
<?php
        //download.php
        $filename=$_GET['name']; // YOUR File name retrive from database
        $file= "C:/xampp/htdocs/railway/Tickets/".$filename; // YOUR Root path for pdf folder storage
        $len = filesize($file); // Calculate File Size
        ob_clean();
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
        header("Cache-Control: public"); 
        header("Content-Description: File Transfer");
        header("Content-Type:application/pdf"); // Send type of file
        $header="Content-Disposition: attachment; filename=$filename;"; // Send File Name
        header($header );
        header("Content-Transfer-Encoding: binary");
        header("Content-Length: ".$len); // Send File Size
        @readfile($file);
        exit;

?>