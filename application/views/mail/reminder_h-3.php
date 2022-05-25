<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
    <style>
    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", "Liberation Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        font-size: 16px;
        line-height: 25px;
    }

    .btn {
        text-decoration: none;
        background: #E78724;
        border-radius: 3px;
        border: none;
        padding: 10px 30px;
        font-size: 13px;
        font-weight: bold;
        color: #FFF;
    }

    .container {
        padding: 0;
        margin-right: auto;
        margin-left: auto;
    }

    .box {
        /* border: 1px solid #dedede; */
        padding: 20px 10px;
        border-radius: 3px;
        background: #fff;
        margin-right: auto;
        margin-left: auto;
    }

    .footer {
        margin-top: 20px;
        border: 1px solid #dedede;
        padding: 20px 10px;
        border-radius: 3px;
        background: #D0E6FB;
    }

    .flyer {
        padding: 0 10%;
        margin-right: auto;
        margin-left: auto;
    }

    a {
        text-decoration: none;
        color: #000;
    }

    .table {
        width: 100%;
        padding: 10px;
    }

    .table tr td {
        padding: 10px;
        border: 1px solid #dedede;
    }
    </style>
</head>

<body>
    <div class="container">
        <img src="<?=BANNER_EMAIL?>" alt="https://edufair.all-inedu.com/"
            width="100%">

        <br>
        <br>
        <div class="box">
            In 3 days, you’re gonna take further steps to increase your top university admission chances.

            <p>Sign up to meet our outstanding speakers and book your consultation now! You can learn about the countries’ different university systems and requirements directly from the representatives.</p>

            <p>See the schedule here:</p>

            <!-- banner here -->
            <?php
                if(!empty($topic)) {
            ?>
            <div style="margin-left:10px; font-weight:bold;">University Talks:</div>
            <table class="table">
                <?php
                $no=1;
                foreach($topic as $t):
            ?>
                <tr>
                    <td width="1%"><?=$no;?></td>
                    <td>
                        <?=$t['topic_name'];?><br>
                        <small>
                            <?=date("D, M dS Y,", strtotime($t['topic_start_date']));?>
                            at
                            <?=date("H:i a", strtotime($t['topic_start_date']));?>
                        </small>
                    </td>
                </tr>
                <?php
                $no++;
            endforeach;
            ?>
            </table>
            <?php
                } 
            ?>

            <?php
                if(!empty($consult)) {
            ?>
            <div style="margin-top:20px; margin-left:10px; font-weight:bold;">Consultations:</div>
            <table class="table">
                <?php
                $no=1;
                foreach($consult as $c):
            ?>
                <tr>
                    <td width="1%"><?=$no;?></td>
                    <td>
                        <?=$c['uni_name'];?><br>
                        <small>
                            <?=date("D, M dS Y,", strtotime($c['uni_dtl_start_date']));?>
                            at
                            <?=date("H:i a", strtotime($c['uni_dtl_start_date']));?>
                        </small>
                    </td>
                </tr>
                <?php
                $no++;
                endforeach;
            ?>
            </table>
            <?php
                }
            ?>

            <p>Load up your university prep with accurate insights and ace your admissions!</p>

            <a href="https://edufair.all-inedu.com/" class="btn">Secure your spot now</a><br><br>


            Best regards,<br>
            ALL-in Eduspace Team

        </div>

        <div class="footer">
            Contact us and follow our social media for more info!

            <table width="100%" style="margin-top:20px;">
                <tr>
                    <td>Phone/WA</td>
                    <td width="1%">:</td>
                    <td>
                        <a href="https://wa.me/6281808081363">0818 0808 1363</a> / <a href="wa.me/6287860811413">0878
                            6081
                            1413</a>
                    </td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>:</td>
                    <td><a href="mailto:info@all-inedu.com">info@all-inedu.com</a></td>
                </tr>
                <tr>
                    <td>Instagram</td>
                    <td>:</td>
                    <td><a href="https://instagram.com/allineduspace"> @allineduspace</a></td>
                </tr>
                <tr>
                    <td>FB Page</td>
                    <td>:</td>
                    <td><a href="https://facebook.com/allineduspace">ALL-in Eduspace</a></td>
                </tr>
            </table>
        </div>

    </div>
</body>

</html>