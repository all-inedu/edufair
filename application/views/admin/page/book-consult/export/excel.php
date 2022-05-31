 <?php
    header("Content-type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=Booking Consult Data.xls");
    ?>

 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
 </head>

 <body>
     <table border=1>
         <thead class="text-center">
             <tr>
                 <th>No</th>
                 <th>University Name</th>
                 <th>Participants</th>
                 <th>Join</th>
                 <th>Cancel</th>
             </tr>
         </thead>
         <tbody>
             <?php
                $no = 1;
                foreach ($uni as $u) {
                ?>
                 <tr class="text-center">
                    <td><?=$no;?></td>
                    <td class="text-left"><?=$u['uni_name'];?></td>
                    <td>
                        <table style="font-size:12px;" width="100%">
                            <?php 
                            $join = [];
                            $cancel = [];
                            foreach ($u['user'] as $user) {
                                if($user['user_id']=="") {
                                    echo "<tr class='text-center'><td colspan=5>-</td></tr>";
                                } else {
                                    if($user['booking_c_status']==0){
                                        $status ="text-danger";  
                                        $title ="Cancel";
                                            $cancel[] = $user['booking_c_status'];
                                    } else {
                                        $status ="";
                                        $title ="Join"; 
                                            $join[] = $user['booking_c_status'];
                                    }
                            ?>
                            <tr class="<?=$status;?>" data-toggle="tooltip" data-placement="top"
                                title="<?=$title;?>">
                                <td>
                                    <?=date('M dS Y, H:i', strtotime($user['uni_dtl_start_date']));?>
                                    <?=date('- H:i A', strtotime($user['uni_dtl_end_date']));?>
                                </td>
                                <td><?=$user['user_fullname'];?></td>
                                <td><?=$user['user_email'];?></td>
                                <td><?=ucfirst($user['user_status']);?></td>
                                <td><?=$user['user_school'];?></td>
                                <td><?=$user['user_grade'];?></td>
                            </tr>
                            <?php } } ?>
                        </table>
                    </td>
                    <td>
                        <?=count($join);?>
                    </td>
                    <td>
                        <?=count($cancel);?>
                    </td>
                </tr>
             <?php $no++;
                } ?>
         </tbody>
     </table>
 </body>

 </html>