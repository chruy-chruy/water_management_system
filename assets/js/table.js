$(document).ready(function () {
    $('#table').DataTable({
        order: [[0, 'desc']],
        "columnDefs": [
        {"className": "dt-center", "targets": "_all"}
      ]
    });
});