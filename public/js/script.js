$(document).ready(function(){
    $('.js-data-user-ajax').select2({
        ajax: {
            url: '/api/getUsers',
            data: function (params) {
                let query = {
                    name: params.term,
                }
                return query;
            }
        },
        minimumInputLength: 3,
    })
})
