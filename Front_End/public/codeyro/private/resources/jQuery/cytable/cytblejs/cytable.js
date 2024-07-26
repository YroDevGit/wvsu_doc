$(document).ready(function() {
    // CY_TABLE
    var exportFilename = $('#CY_TABLE').attr('export') || 'Exported_Data';
    var maxrow = $('#CY_TABLE').attr('maxrow') || 10;
    var ordering = $('#CY_TABLE').attr('ordering') || false;
    var defaultClass = $('#CY_TABLE').attr('defaultClass') || true;

    $('#CY_TABLE').DataTable({
        "responsive": true, 
        "ordering": ordering, 
        "dom": 'Bfrtip',
        "pageLength": maxrow, 
        "lengthMenu": [5, 10, 25, 50, 100], 
        "buttons": [
            {
                extend: 'copy',
                className: 'btn btn-primary',
                filename: exportFilename + '_Copy_' + new Date().toISOString().slice(0, 10)
            },
            {
                extend: 'csv',
                className: 'btn btn-primary', 
                filename: exportFilename + '_CSV_' + new Date().toISOString().slice(0, 10)
            },
            {
                extend: 'excel',
                className: 'btn btn-primary',
                filename: exportFilename + '_Excel_' + new Date().toISOString().slice(0, 10)
            },
            {
                extend: 'pdf',
                className: 'btn btn-primary', 
                filename: exportFilename + '_PDF_' + new Date().toISOString().slice(0, 10)
            },
            {
                extend: 'print',
                className: 'btn btn-primary', 
                filename: exportFilename + '_Print_' + new Date().toISOString().slice(0, 10)
            }
        ],
        "language": {
            "search": "Search:" 
        }
    });
    if(defaultClass == true){
        $('#CY_TABLE').addClass('display responsive nowrap .bordered-table-cy');
    }
});