// function readURL(input) {
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//
//         reader.onload = function (e) {
//             $('#blah')
//                 .attr('src', e.target.result)
//                 .width(150)
//                 .height(200);
//         };
//
//         reader.readAsDataURL(input.files[0]);
//     }
// }

$(document).ready(function () {

    //Setting up functions
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    const formatter = new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: 'NGN',
        minimumFractionDigits: 0
    });

    $('.project-status').click(function (e) {
        e.preventDefault();
        var projectName = $('.projectname').html();
        if ($(this).attr('id') == 'accepted') {
            action = "Approve";
        } else {
            action = "Reject";
        }

        swal({
            title: "Are you sure you want to " + action + " " + projectName + "'s Project?",
            icon: "info",
            buttons: ["Cancel", "Proceed"],
        }).then((willApprove) => {
            if (willApprove) {
                id = $(this).attr('use');
                status = $(this).attr('id');
                updateProjectStatus(id, status, action);
                // if(action == "Approve"){
                //     $('.status').removeClass('btn-outline-danger');
                //     $('.status').addClass('btn-outline-success');
                //     $('.status').text('Project Accepted')
                // }else{
                //     $('.status').removeClass('btn-outline-success');
                //     $('.status').addClass('btn-outline-danger');
                //     $('.status').text('Project Rejected');
                //
                // }

            }
        });

    });



    function updateProjectStatus(id, status, action) {
        $.ajax({
            type: 'GET',
            url: '/admin/updatestatus/' + id + "/" + status,
            success: function (data) {
                swal(data, " ", {
                    icon: "info",
                });
                if (action == "Approve") {
                    $('.status').removeClass('btn-outline-danger');
                    $('.status').addClass('btn-outline-success');
                    $('.status').text('Project Accepted')
                } else {
                    $('.status').removeClass('btn-outline-success');
                    $('.status').addClass('btn-outline-danger');
                    $('.status').text('Project Rejected');

                }
            },
            error: function (data) {
                swal('There was an error processing the request', " ", {
                    icon: "error",
                });
            }
        });
    }


    $('#sponsoramount').change(function () {
        //The aria attributes has the id of the project
        aria = $('#proposedamount').attr('aria');
        //the value of the sponsorship amount
        var sponsorshipAmount = $(this).val();
        if (sponsorshipAmount == 'others') {
            //Remove the disabled, then rename the placeholder and swap the amount name attribute to the element
            $('#others').removeAttr('disabled');
            $('#others').attr('placeholder', 'Enter Amount');
            $('#others').attr('name', 'amount');
            $(this).removeAttr('name');
            $('#proposedamount').text('NGN 0,000');
        } else {
            $('#others').attr('disabled', 'disabled');
            $('#others').removeAttr('name');
            $('#others').attr('placeholder', 'Choose Other Above');
            $(this).attr('name', 'amount');
            sponsorReturns(aria, sponsorshipAmount);
        }
        //Ajax Function
    });

    $('#others').keyup(function () {
        var sponsorshipAmount = $(this).val();
        sponsorReturns(aria, sponsorshipAmount);
    });

    function sponsorReturns(id, sponsorshipAmount) {
        $.ajax({
            type: 'GET',
            url: '/sponsorreturns/' + id + '/' + sponsorshipAmount,
            success: function (data) {
                formattedData = formatter.format(data);
                $('#proposedamount').text(formattedData);
                $('#returns').attr('value', data);
            },
            error: function (data) {
                $('#proposedamount').text("Couldn't retrieve percentage");

            }
        });
    }


    $('.subscriptionStatus').change(function () {
        // $(this) here is the select
        subscriptionId = $(this).find('.subscriptionId').first().attr('projectid');
        subscriptionStats = $(this).find(":selected").attr('value');
        subscriptionStatus(subscriptionId, subscriptionStats);
    });


    function subscriptionStatus(subcriptionId, subscriptionStats) {
        $.ajax({
            type: 'GET',
            url: '/subscriptionstatus/' + subscriptionId + '/' + subscriptionStats,
            success: function (data) {
                console.log(data);
                swal(data, " ", {
                    icon: "success",
                });
            },
            error: function (data) {
                swal("Couldn't update project status", " ", {
                    icon: "error",
                });

            }
        });
    }


    $('#state_id').change(function () {
        $this = $(this);
        state = $this.find(":selected").first().attr('value');
        lgaList(state);
    });

    function lgaList(state) {
        $.ajax({
            type: 'GET',
            url: '/register/' + state + '/lgas',
            success: function (data) {
                // //retrieved LGA List from the data object returned
                lgas = data;
                // //initialize LGA into a list
                var lgaOptionlist = '<option>Select LGA</option>';
                // //Iterate the list to get the names
                lgas.forEach(function (lga) {
                    lgaOptionlist += '<option value=' + lga.id + '>' + lga.name + '</option> <br>';
                });
                $('#lga').html(lgaOptionlist);

                // console.log(lgaOptionlist);
            },
            error: function (data) {
                var lgaOptionlist = '<option>Couldn\'t retrieve LGA</option>';
                lga = $('#lga').text(lgaOptionlist);
            }
        });
    }


});
