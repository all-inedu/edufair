<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    Hi <?=$user_name;?>, <br><br>

    <?php
        if(!empty($topic)) {
    ?>
    Topic :
    <table width="100%">
        <?php
            foreach($topic as $t):
        ?>
        <tr>
            <td><?=$t['topic_name'];?></td>
            <td><?=date("M dS Y, H:i", strtotime($t['topic_start_date']));?></td>
            <td><a href="<?=$t['topic_zoom_link'];?>">Join</a></td>
        </tr>
        <?php
            endforeach;
        ?>
    </table>
    <hr>
    <?php
        }
    ?>

    <?php
        if(!empty($consult)) {
    ?>
    1-on-1 Consultation :
    <table width="100%">
        <?php
            foreach($consult as $c):
        ?>
        <tr>
            <td><?=$c['uni_name'];?></td>
            <td><?=date("M dS Y, H:i", strtotime($c['uni_dtl_start_date']));?></td>
            <td><a href="<?=$c['uni_dtl_zoom_link'];?>">Join</a></td>
        </tr>
        <?php
            endforeach;
        ?>
    </table>
    <hr>
    <?php
        }
    ?>
</body>

</html>