
<?php


if (isset($_SESSION['station_id'])) {
   $id  =  $_SESSION['station_id'];
  }

   if (isset($_SESSION['type'])) {
   $type  =  $_SESSION['type'];
  }


if(isset($_GET['payer'])){

    $payer  =  $_GET['payer'];
}


/*Get payers' name start*/
$get_payer = mysqli_query($con,"SELECT * FROM payers WHERE station_id = $id AND payer=$payer AND type='$type'");
$result = mysqli_fetch_assoc($get_payer);

$name = $result['name'];

/*Get payers' name ends*/

/*Get payers' tithe query start*/
$get_tithe = mysqli_query($con,"SELECT * FROM tithe WHERE station = $id AND payer=$payer AND type='$type'");
/*Get payers' tithe query ends*/
while($row    = mysqli_fetch_array($get_tithe)) {
    $payer_id = $row['payer'];
    $tithe    = $row['tithe'];
    $offering = $row['offering'];
    $thanks   = $row['thanks'];
    $others   = $row['others'];
     $paymentdate   = $row['paymentdate'];
    
?>
<div style="margin-top: 25px;" class="container">
    <div class="d-flex justify-content-center row">
        <div class="col-md-8">
            <div class="p-3 bg-white rounded">
               
                <div class="mt-3">
                    <div class="table-responsive">
                        <table class="table table-bordered"> 
                            <thead style="height: 10px;">
                                <tr>
                                    <th style="text-align: center; width: 15%;">Name</th>
                                    <th style="text-align: center;">Tithe</th>
                                    <th style="text-align: center;">Offering</th>
                                    <th style="text-align: center;">Others</th>
                                    <th style="text-align: center;">Thanks</th>
                                    <th style="text-align: center;">Total funds</th>
                                    <th style="text-align: center; width: 15%;">Total CONF funds</th>
                                    <th style="text-align: center;width: 15%;">Total LOC funds</th>
                                    <th style="text-align: center; width: 15%;">Church:</th>
                                    <th style="text-align: center; width: 15%;">District:</th>

                                    <th style="text-align: center;">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $tithe; ?></td>
                                    <td><?php echo $offering; ?></td>
                                    <td><?php echo $others; ?></td>
                                    <td><?php echo $thanks; ?></td>
                                     <td>&#8373;<?php echo $sum = $tithe+$offering+$others+$thanks; ?></td>
                                     <td>&#8373;<?php echo $sum = $tithe+($offering+$others+$thanks)/2; ?></td>
                                      <td>&#8373;<?php echo $sum = ($offering+$others+$thanks)/2; ?></td>
                                      <td><?php if(isset($_SESSION['name'])){
                            echo $_SESSION['name'];
                        } ?></td>

                        <td><?php echo $district_name; ?></td>

                        <td><?php echo $paymentdate; ?></td>
                                </tr>

                              
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<hr style="border: 1px dashed gray; height: 0px; margin-top: 5px; margin-bottom: 5px;">
<?php } ?>