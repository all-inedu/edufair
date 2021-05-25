<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('admin/template/header'); ?>
</head>

<style>
#photoPreview {
    height: 43vh;
    object-fit: cover;
}
</style>

<body class="sb-nav-fixed">
    <?php $this->load->view('admin/template/navbar'); ?>
    <div id="layoutSidenav">
        <?php $this->load->view('admin/template/sidebar'); ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <h1 class="mt-4">University</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?=base_url('dashboard/admin/uni');?>">University List</a>
                        </li>
                        <li class="breadcrumb-item active">Add University</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="row flex-wrap-reverse">
                                    <div class="col-md-5">
                                        <div class="border shadow">
                                            <img src="<?=base_url('assets/img/default.jpeg');?>" alt="" width="100%"
                                                id="photoPreview">
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <label>University Name</label>
                                            <input type="text" class="form-control form-control-sm"
                                                placeholder="University Name" name="uni_name">
                                        </div>
                                        <div class="form-group">
                                            <label>Country</label>
                                            <select class="form-control form-control-sm" name="uni_country"
                                                id="uniCountry">
                                                <option value="">Select the country</option>
                                                <option value="United States">United States</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Canada">Canada</option>
                                                <option value="europe">Europe</option>
                                                <option value="asia">Asia</option>
                                            </select>
                                        </div>

                                        <div class="form-group" id="uniCountryDtl">
                                            <label>Country Detail</label>
                                            <select name="uni_country_dtl" id="countryDtl">
                                                <option data-placeholder="true"></option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control form-control-sm" name="uni_description"
                                                rows="5"></textarea>
                                        </div>


                                        <div class="form-group">
                                            <label>Photo Banner</label>

                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="imgUpload"
                                                    name="topic_photo" onchange="readURL(this);">
                                                <label class="custom-file-label" for="imgUpload">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="float-right">
                                    <input type="submit" value="Submit" class="btn btn-sm btn-success px-4">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <?php $this->load->view('admin/template/footer'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#uniCountryDtl').hide();
    });

    $('#uniCountry').change(function() {
        let country = $(this).val();
        if ((country == "asia") || (country == "europe")) {
            $('#uniCountryDtl').show();
            $("#countryDtl").empty();
            $.ajax({
                type: 'post',
                dataType: "json",
                url: "<?=base_url();?>/api/country/" + country,
                success: function(datas) {
                    $.each(datas, function(index, data) {
                        $('#countryDtl').append(
                            '<option value="' +
                            data.name +
                            '">' +
                            data.name +
                            '</option>'
                        )
                    });
                }
            });
            $('#countryDtl').focus();
            new SlimSelect({
                select: '#countryDtl',
                allowDeselect: true,
                placeholder: 'Select school name',
            })
        } else {
            $('#uniCountryDtl').hide();
        }
    });




    function readURL(input) {
        $(".custom-file-label").addClass("selected text-dark").html(input.files[0].name);

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#photoPreview')
                    .attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    </script>
</body>

</html>