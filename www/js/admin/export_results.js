jQuery(function($) {
  if($('.export_area').length) {
    var url         = window.location.href;
    var urlSplited  = url.replace("http://","").split("/");
    var module      = urlSplited[2].replace(/\?(.*)/,"");
    var columns     = JSON.parse($('.export_area .columns').text().trim());
    var title       = 'MR. Jack - Assistencia Tecnica - '+Math.floor(Date.now());

    if(module != 'cliente' || (module == 'cliente' && urlSplited[4] != 'edit')) {
      $('.export_table').DataTable({
          dom: 'Brt',
          ajax: {
            url: '/admin.php/'+module+'/export',
            dataSrc: ''
          },
          columns: columns,
          ordering: false,
          buttons: [
            {
              extend: 'copy'
            },
            {
              extend: 'excel',
              title: title
            },
            {
              extend: 'pdf',
              title: title
            },
            {
              extend: 'print',
              customize: function ( win ) {
                $(win.document.body).find('table')
                  .addClass( 'compact' )
                  .css( 'border', '1px solid #dddddd' )
                  .css( 'border-left', '0px' )
                  .css( 'border-bottom', '0px' );

                $(win.document.body).find('table th, table td')
                  .css( 'border-left', '1px solid #dddddd' )
                  .css( 'border-bottom', '1px solid #dddddd' );
              }
            }
          ]
      });
    }
  }
});
