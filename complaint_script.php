<?php
include 'includes\common.php';
$pnr=$_POST['pnr'];
// echo $pnr;

$select_query= "SELECT * from bookings where pnr='$pnr'";
$user_result=mysqli_query($con,$select_query);
?>
<option value="" hidden>Select</option>
<?php
while($row = mysqli_fetch_array($user_result)) {
    


?>
<option value="<?php echo $row["t_number"]." - ".ltrim($row["current_status"],"CNF/") ?>">
    <?php echo $row["t_number"]." - ".ltrim($row["current_status"],"CNF/") ?></option>
<?php
}


?>