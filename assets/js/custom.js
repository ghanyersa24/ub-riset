/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 * 
 */

"use strict";


$.fn.dataTable.ext.errMode = 'none';
$('#table tfoot .table_search').each(function() {
    var title = $(this).text();
    $(this).html('<input type="text" class="form-control-sm" placeholder="Search ' + title + '" />');
});

function konfirmasi(message) {
    return swal({
        title: "Apakah Kamu yakin?",
        text: message,
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
}