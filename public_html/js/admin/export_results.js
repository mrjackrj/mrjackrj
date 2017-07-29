jQuery(function($) {
  if($('.export_area').length) {
    var url     = window.location.href;
    var module  = url.replace("http://","").split("/")[2];
    var columns = JSON.parse($('.export_area .columns').text().trim());

    $('.export_table').DataTable({
        dom: 'Brt',
        ajax: {
          url: '/admin.php/'+module+'/export',
          dataSrc: ''
        },
        columns: columns,
        ordering: false,
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    });
  }
});
