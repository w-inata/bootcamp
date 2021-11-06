$(document).ready(function(){
    datatable();
    alert(11);
});

function datatable(){
    $('.datatable').each(function(){

        var _token = $("body").data("csrf-token");
        var url = $(this).data("url");
        var column = $(this).data("column");
        console.log(_token, url, column);
        $(this).DataTable({
            "searching":false,
            "processing":true,
            "serverSide":true,
            "ordering":true,
            "order": [[0, "desc"]],
            "columnDefs": [
                {
                    "orderable": false,
                    "targets": "no-short",
                },
            ],
            "ajax": {
                "url": url,
                "dataType": "json",
                "type": "POST",
                "data": {
                    _token: _token,
                },
            },
            "columns": column,
            "drawCallback": function() {
                user_role_menu_action();
            }
        })
    })
}