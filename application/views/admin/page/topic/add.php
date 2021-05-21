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
                    <h1 class="mt-4">Topic</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?=base_url('dashboard/admin/topic');?>">Topic List</a>
                        </li>
                        <li class="breadcrumb-item active">Add Topic</li>
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
                                            <label>Topic Name</label>
                                            <input type="text" class="form-control form-control-sm"
                                                placeholder="Topic name" name="topic_name">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Start Date</label>
                                                    <input type="datetime-local" class="form-control form-control-sm"
                                                        name="topic_start_date">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>End Date</label>
                                                    <input type="datetime-local" class="form-control form-control-sm"
                                                        name="topic_end_date">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>List of University</label>
                                            <select name="uni_id" id="uniList" multiple>
                                                <option data-placeholder="true"></option>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Thumbnail</label>

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
    new SlimSelect({
        select: '#uniList',
        allowDeselect: true,
        placeholder: 'Select school name',
    })

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