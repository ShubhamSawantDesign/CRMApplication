/**
 * This will Applya JS Data Table to The Data Fetched
 * Author Shubham Sawant
 */
  $(function () {
    $(".data-table").DataTable({
      "responsive": false,  
      "autoWidth": true,
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
    }).buttons().container().appendTo('.data-table-wrapper .col-md-6:eq(0)');
  }); 