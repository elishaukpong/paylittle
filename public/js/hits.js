// hits function
function increaseprojectHit(projectId) {
    $.ajax({
        type:'GET',
        url:'/projects/' + projectId + '/hit'
    });
}

