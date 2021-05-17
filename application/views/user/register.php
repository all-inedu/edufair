	<div class="container-fluid">
	    <div class="container">
	        <div class="col-xl-6 offset-xl-3 allin-registration shadow"
	            style="margin-top:7vh;background:#efefef; border:1px solid #dedede">
	            <h3 class="text-center">Registration</h3>
	            <hr>
	            <div class="row">
	                <div class="col" data-page="1">
	                    <form method="post">
	                        <div class="row">
	                            <div class="col-6">
	                                <div class="form-group">
	                                    <label>First Name</label>
	                                    <input name="user_first_name" type="text" class="form-control form-control-sm"
	                                        placeholder="Mikhael">
	                                </div>
	                            </div>
	                            <div class="col-6">
	                                <div class="form-group">
	                                    <label>Last Name</label>
	                                    <input name="user_last_name" type="text" class="form-control form-control-sm"
	                                        placeholder="Jackdad">
	                                </div>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Email address</label>
	                            <input type="email" class="form-control form-control-sm" name="user_email"
	                                placeholder="xxxxx@xxxx.com">
	                        </div>
	                        <div class="form-group">
	                            <label>Phone Number</label>
	                            <input type="text" class="form-control form-control-sm" placeholder="08xx xxxx"
	                                name="user_phone">
	                        </div>
	                        <div class="form-group">
	                            <label>You came here as:</label>
	                            <div class="form-control border-0">
	                                <div class="form-check form-check-inline">
	                                    <input class="form-check-input input-status" type="radio" name="user_status"
	                                        value="parent">
	                                    <label class="form-check-label">Parent</label>
	                                </div>
	                                <div class="form-check form-check-inline">
	                                    <input class="form-check-input input-status" type="radio"
	                                        name="user_status" value=" student" checked>
	                                    <label class="form-check-label">Student</label>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label>Is this your first time attending ALL-in event?</label>
	                            <div class="form-control border-0">
	                                <div class="form-check form-check-inline">
	                                    <input class="form-check-input" type="radio" name="user_first_time" value="option1"
	                                        checked>
	                                    <label class="form-check-label">Yes</label>
	                                </div>
	                                <div class="form-check form-check-inline">
	                                    <input class="form-check-input" type="radio" name="user_first_time"
	                                        value="option1">
	                                    <label class="form-check-label">No</label>
	                                </div>
	                            </div>
	                        </div>
	                        <hr>
	                        <div class="form-group text-right">
	                            <button type="button" class="btn btn-primary navigate navigate-page-2">Next <i
	                                    class="fas fa-arrow-right pl-2"></i></button>
	                        </div>
	                    </form>
	                </div>
	                <div class="col" data-page="2" style="display: none">
	                    <form method="post">
	                        <div class="form-group">
	                            <label>What grade are you in?</label>
	                            <input type="number" class="form-control form-control-sm" name="user_grade" placeholder=""
	                                onchange="limit(this)" />
	                        </div>
	                        <div class="form-group">
	                            <label>What school are you going to graduate from?</label>
	                            <select name="user_school" id="userSchool" onchange="checkValue()">
	                                <option data-placeholder="true"></option>
	                                <option value="other">Other</option>
	                            </select>
	                            <input type="text" class="form-control form-control-sm mt-1" name="user_school"
	                                id="userSchoolNew">
	                        </div>
	                        <div class="form-group">
	                            <label>Where's your country destination to study
	                                abroad?</label>
	                            <select name="user_destination" id="userDestination" multiple>
	                                <option data-placeholder="true"></option>
	                            </select>
	                        </div>
	                        <div class="form-group">
	                            <label>What's your intended major in university?</label>
	                            <select name="user_major" id="userMajor" onchange="checkValue()" multiple>
	                                <option data-placeholder="true"></option>
	                                <option value="other">Other</option>
	                            </select>
	                            <input type="text" class="form-control form-control-sm mt-1" name="user_major"
	                                id="userMajorNew">
	                        </div>
	                        <div class="form-group">
	                            <label>I know this Edufair from</label>
	                            <select name="user_lead" id="userLead" onchange="checkValue()">
	                                <option data-placeholder="true"></option>
	                            </select>
	                            <input type="text" class="form-control form-control-sm mt-1" name="user_lead"
	                                id="userLeadNew">
	                        </div>
	                        <hr>
	                        <div class="form-group">
	                            <div class="row">
	                                <div class="col-xl-6 text-left"><button type="button"
	                                        class="btn btn-primary navigate-page-1"><i class="fas fa-arrow-left pr-2"></i>
	                                        Back</button></div>
	                                <div class="col-xl-6 text-right"><button type="button"
	                                        class="btn btn-success navigate-page-3">Submit <i
	                                            class="fas fa-paper-plane pl-2"></i></button></div>
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
	    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
	    crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
	<script>
new SlimSelect({
    select: '#userSchool',
    allowDeselect: true,
    placeholder: 'Select school name',
})

new SlimSelect({
    select: '#userDestination',
    allowDeselect: true,
    placeholder: 'Select destination'
})

new SlimSelect({
    select: '#userMajor',
    allowDeselect: true,
    placeholder: 'Select major'
})

new SlimSelect({
    select: '#userLead',
    allowDeselect: true,
    placeholder: 'Select lead'
})

$(document).ready(function() {
    $('#userSchoolNew').hide();
    $('#userMajorNew').hide();
    $('#userLeadNew').hide();

    // school 
    $.ajax({
        type: 'post',
        dataType: "json",
        url: "https://www.bigdata.crm-allinedu.com/api/school",
        success: function(datas) {
            $.each(datas, function(index, data) {
                $('#userSchool').append(
                    '<option value="' +
                    data.sch_name +
                    '">' +
                    data.sch_name +
                    '</option>'
                )
            });
        }
    });

    // country 
    $.ajax({
        type: 'post',
        dataType: "json",
        url: "https://www.bigdata.crm-allinedu.com/api/countries",
        success: function(datas) {
            $.each(datas, function(index, data) {
                $('#userDestination').append(
                    '<option value="' + data + '">' + data + '</option>'
                )
            });
        }
    });

    // major 
    $.ajax({
        type: 'post',
        dataType: "json",
        url: "https://www.bigdata.crm-allinedu.com/api/major",
        success: function(datas) {
            $.each(datas, function(index, data) {
                $('#userMajor').append(
                    '<option value="' + data + '">' + data + '</option>'
                )
            });
        }
    });

    // lead 
    $.ajax({
        type: 'post',
        dataType: "json",
        url: "https://www.bigdata.crm-allinedu.com/api/lead",
        success: function(datas) {
            $.each(datas, function(index, data) {
                $('#userLead').append(
                    '<option value="' + data.lead_name + '">' + data.lead_name +
                    '</option>'
                )
            });
        }
    });

});

function checkValue() {
    // school 
    if ($('#userSchool').val() == 'other') {
        $('#userSchoolNew').show();
        $("#userSchoolNew").focus();
    } else {
        $('#userSchoolNew').hide();
    }

    // major 
    if ($('#userMajor').val() == 'other') {
        $('#userMajorNew').show();
        $('#userMajorNew').focus();
    } else {
        $('#userMajorNew').hide();
    }

    // lead 
    if ($('#userLead').val() == 'others') {
        $('#userLeadNew').show();
        $('#userLeadNew').focus();

    } else {
        $('#userLeadNew').hide();
    }
}
	</script>