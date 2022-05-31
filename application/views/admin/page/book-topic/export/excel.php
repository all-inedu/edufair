<?php
    header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Booking Topic Data.xls");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export</title>
</head>

<body>
    <table border=1>
        <thead>
            <tr>
                <th>No</th>
                <th>Topic Name</th>
                <th>Date</th>
                <th>Total Join</th>
                <th>Total Cancel</th>
                <th>Participants</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no=1;
                foreach ($topic as $t) {
                   $row = count($t['user'])+1;
            ?>
            <tr>
                <td><?=$no;?></td>
                <td NOWRAP><?=$t['topic_name'];?></td>
                <td NOWRAP>
                    <?=date("M dS Y, H:i",strtotime($t['topic_start_date']));?>
                    <?=date("- H:i A",strtotime($t['topic_end_date']));?>
                </td>
                <td>
                    <?php 
                        $data = [];
                        $cancel = [];
                        $join = [];
                        foreach ($t['user'] as $d) {
                            if(!empty($d['user_id']))
                            {
                                if($d['booking_topic_status']==0)
                                {
                                    $cancel[] = $d['booking_topic_status']; 
                                } else {
                                    $join[] = $d['booking_topic_status']; 
                                }
                                $data[] = $d['user_id']; 
                            }
                        }
                        echo count($join);
                        ?>
                </td>
                <td><?=count($cancel);?></td>
                <td>
                    <table style="width:100%" border=0>
                        <tr>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>You are a</th>
                            <th>School Name</th>
                            <th>Grade</th>
                            <th>Lead</th>
                            <th>Age</th>
                            <th>Status</th>
                        </tr>
                        <?php 
                            foreach ($t['user'] as $u) {
                                if($u['user_id']=="") {
                                    echo "<tr class='text-center'><td colspan=8>-</td></tr>";
                                } else {
                                    if($u['booking_topic_status']==0){
                                        $title ="Cancel";
                                    } else {
                                        $title ="Join"; 
                                    }
                            ?>
                        <tr>
                            <td NOWRAP><?=$u['user_fullname'];?></td>
                            <td NOWRAP><?=$u['user_email'];?></td>
                            <td><?=ucfirst($u['user_status']);?></td>
                            <td NOWRAP><?=$u['user_school'];?></td>
                            <td><?=$u['user_grade'];?></td>
                            <td NOWRAP><?=$u['user_know_from'];?></td>
                            <td><?= floor((time() - strtotime($u['user_dob'])) / 31556926);?></td>
                            <td><?=$title;?>
                            </td>
                        </tr>
                        <?php } } ?>
                    </table>
                </td>
            </tr>
            <?php $no++; } ?>
        </tbody>
    </table>
</body>

</html>