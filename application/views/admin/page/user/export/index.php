<?php
    header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=User List.xlsx");
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
                <th>Students Name</th>
                <th>Status</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>School</th>
                <th>Grade</th>
                <th>Country Destination</th>
                <th>Major</th>
                <th>Lead</th>
                <th>Topic</th>
                <th>Consultation</th>
                <th>Register Date</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            <?php
                                        $no=1;
                                        foreach ($user as $u) {
                                        ?>
            <tr class="text-center">
                <td><?=$no;?></td>
                <td class="text-left pointer">
                    <?=$u['user_fullname'];?>
                </td>
                <td><?=ucfirst($u['user_status']);?></td>
                <td><?=$u['user_email'];?></td>
                <td><?=$u['user_phone'];?></td>
                <td><?=ucfirst($u['user_gender']);?></td>
                <td><?=$u['user_school'];?></td>
                <td><?=$u['user_grade'];?></td>
                <td><?=$u['user_country'];?></td>
                <td><?=$u['user_major'];?></td>
                <td><?=$u['user_know_from'];?></td>
                <td>
                    <?php
                                                    foreach ($u['user_booking_topic'] as $topic) { 
                                                        if($topic['topic_name']=="") {
                                                            echo "<small class='text-danger'>-</small>";
                                                        } else {
                                                ?>
                    <?=$topic['topic_name'];?>,
                    <?php }} ?>
                </td>
                <td>
                    <?php
                                                    foreach ($u['user_booking_consult'] as $consult) {
                                                        if($consult['uni_name']=="") {
                                                            echo "<small class='text-danger'>-</small>";
                                                        } else {
                                                ?>
                    <?=$consult['uni_name'];?>,
                    <?php }} ?>
                </td>
                <td><?=date("M dS Y",strtotime($u['user_register_date']));?></td>
                <td>
                    <?php
                                                    if($u['token_status']==1){
                                                        echo "Verified";
                                                    } else {
                                                        echo "Not Verified";
                                                    }
                                                ?>
                </td>
            </tr>
            <?php $no++; } ?>
        </tbody>
    </table>
</body>

</html>