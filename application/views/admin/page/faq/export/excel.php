<?php
    header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Questions.xls");
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
                <th>University Name</th>
                <th>User Name</th>
                <th>Questions</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
            foreach ($faq as $f) {
                // $status = $f->question_status == 1 ? 'Answered' : 'Not Answered';
            ?>
                <tr>
                    <td><?=$i;?></td>
                    <td><?=$f->uni_name?></td>
                    <td>
                        <?=$f->user_fullname;?>
                    </td>
                    <td><?=$f->q_question;?></td>
                    <td>
                        <?=$f->created_at;?>
                    </td>
                </tr>
                <?php 
                $i++;
            }
            ?>
        </tbody>
    </table>
</body>

</html>