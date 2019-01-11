function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .width(150)
                .height(200);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
$(document).ready(function() {
  
    $('.project-status').click(function(e){
        e.preventDefault();
        var projectName = $('.projectname').html();

        if($(this).attr('id') == 'accepted')
        {
            action = "Approve";
        }else{
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
                    updateProjectStatus(id, status);
                    if(action == "Approve"){
                        $('.status').removeClass('btn-outline-danger');
                        $('.status').addClass('btn-outline-success');
                        $('.status').text('Project Accepted')
                    }else{
                        $('.status').removeClass('btn-outline-success');
                        $('.status').addClass('btn-outline-danger');
                        $('.status').text('Project Rejected');

                    }

                }
            });

    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    function updateProjectStatus(id, status) {
        $.ajax({
            type:'GET',
            url:'/admin/updatestatus/' + id + "/" + status,
            success:function(data) {
                swal(data," ", {
                    icon: "info",
                });
            },
            error:function(data){
                console.log(data);
            }
        });
    }
});
