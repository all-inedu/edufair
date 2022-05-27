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
    </style>
</head>

<body>
    <div class="container">
        <img src="<?=BANNER_EMAIL?>" alt="https://edufair.all-inedu.com/"
            width="100%">

        <br>
        <br>
        <div class="box">
            Thank you for joining the ALL-in Global University Fair! How was your experience?

            <p>We are determined to bring you even better events in the future! To help us get there, please do fill out the feedback form below: 
            </p>

            <a href="<?=FORM_FEEDBACK?>" class="btn">Fill Out Feedback Form</a> <br>

            <p>
                <b>We love to see you again in our next event. </b>
            </p>

            <!-- flyer diganti -->
            <div class="flyer">
                <img src="<?=base_url('assets/img/bootcamp.jpeg');?>" width="100%">
                <br><br>
                <img src="<?=base_url('assets/img/ib.jpeg');?>" width="100%">
                <br><br>
                <img src="<?=base_url('assets/img/sat-prep.jpeg');?>" width="100%">
            </div>

            <p>
                We love to see you again at our next event.
            </p>



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