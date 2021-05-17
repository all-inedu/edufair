</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
    integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
    integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

});

$(".navigate-page-1").on('click', function() {
    $("div[data-page='2']").hide("slide", {
        direction: "right"
    }, 350, function() {
        $("div[data-page='1']").show("slide", {
            direction: "left"
        }, 350);
    });
});

$(".navigate-page-2").on('click', function() {
    $("div[data-page='1']").hide("slide", {
        direction: "left"
    }, 350, function() {
        $("div[data-page='2']").show("slide", {
            direction: "right"
        }, 350);
    });
})
</script>

</html>