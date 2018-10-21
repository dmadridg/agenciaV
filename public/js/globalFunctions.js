$(function() {
    //Set up the ajax to include csrf token on header
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    //Fade in the containers
    setTimeout(function() {
        $('div#content-container, div.row-fluid, div.form-container').fadeIn('low');
    }, 500);

    //Verify if the button for delete multiple can be clickable
    $('body').delegate('.checkDelete','click', function() {
        var ids_lenght = [];
        $("input.checkDelete").each(function() {
            if ($(this).is(':checked')) {
                ids_lenght.push($(this).parent().parent().siblings("td:nth-child(2)").text());
            }
        });

        $('.delete-rows, .disable-rows').attr('disabled', ids_lenght.length > 0 ? false : true);
    });

    //Set up the tooltip element
    $('body').tooltip({
        selector: '[data-toggle=tooltip]'
    });

    //Set up the select 2 inputs
    $("select.select2").select2();

    //Set up the timepicker inputs
    $(".timepicker").timepicker({
        showInputs: false
    });

    //Set up the datepiciker inputs
    $( ".date-picker" ).datepicker({
        autoclose: true,
        todayHighlight: true,
        format: "yyyy-mm-dd",
    });

    //Set up the button to download the excel file
    $('body').delegate('button.export-excel','click', function() {
        window.location.href = $('div.general-info').data('url')+'/excel/export';
    });

    //Configure the modal and form properties to upload files
    $('body').delegate('button.upload-content','click', function() {
        var path = $(this).data('path');
        var action = $(this).data('route-action');
        var myDropzone = Dropzone.forElement(".myDropzone");

        if (typeof $(this).data('width') !== 'undefined') {
            $('#rule-container').find('p').removeClass('hide');
            $('#rule-container').children('p').find('strong').text($(this).data('width')+'x'+$(this).data('height')+ 'px');
        }

        myDropzone.options.url = action;

        $('form#dropzone-form').find('input#path').val(path);
        
        /*myDropzone.on("queuecomplete", function(file) {
            if (typeof $('button.upload-content').data('refresh') !== 'undefined') {
                refreshGalery(window.location.href)
            }
        });*/
    });

    //Configure the modal to clean the files and reload the galery if neccesary when this is closed by the user
    $('body').delegate('div#modal-upload-content','hidden.bs.modal', function() {
        var myDropzone = Dropzone.forElement(".myDropzone");
        
        //First check if files where uploaded, if so, refresh the galery
        if (typeof $('button.upload-content').data('refresh') !== 'undefined') {
            if (myDropzone.files.length > 0) {
                refreshGalery(window.location.href);
            }
        }

        //Clear dropzone files
        myDropzone.removeAllFiles();
        $(this).find('input.form-control').val('');
    });

    //Configure the modal and form properties to import with excel
    $('body').delegate('button.import-excel','click', function() {
        var action = $('div.general-info').data('url')+'/excel/import';
        var fields = $(this).data('fields');
        $('form#form-import').get(0).setAttribute('action', action);
        $('form#form-import').find('strong#fields').text(fields);
    });

    //Clear modal inputs
    $('div.modal').on('hidden.bs.modal', function (e) {
        $(this).find('div.form-group').removeClass('has-error');
        $(this).find("input.form-control").val('');
        $(this).find("select.form-control").val(0);
            $('#foto_perfil').croppie('destroy');
        $('.upload-cr-pic').croppie('destroy');
    });

    //Send a request for disable a row
    $('body').delegate('.disable-rows','click', function() {
        var route = $('div.general-info').data('url')+'/change-status';
        var refresh = $('div.general-info').data('refresh');
        var ids_array = [];
        var change_to = $(this).data('change-to');
        var swal_msg = change_to == 1 ? 'habilitarán' : 'inhabilitarán';

        $("input.checkDelete").each(function() {
            if($(this).is(':checked')) {
                ids_array.push($(this).parent().parent().siblings("td:nth-child(2)").text());
            }
        });
        if (ids_array.length > 0) {
            
            swal({
                title: 'Se '+swal_msg+ ' '+ids_array.length+' registro(s), ¿Está seguro de continuar?',
                icon: 'warning',
                buttons:["Cancelar", "Aceptar"],
                dangerMode: true,
            }).then((accept) => {
                if (accept) {
                    config = {
                        'route'     : route,
                        'ids'       : ids_array,
                        'refresh'   : refresh,
                    }
                    loadingMessage();
                    ajaxSimple(config);
                }
            }).catch(swal.noop);
        }
    });
    

    //Send a request for a single delete
    $('body').delegate('.enable-row, .disable-row','click', function() {
        var route = $('div.general-info').data('url')+'/change-status';
        var refresh = $('div.general-info').data('refresh');
        var ids_array = [];
        var row_id = $(this).hasClass('special-row') ? $(this).data('row-id') : $(this).parent().siblings("td:nth-child(2)").text();
        var change_to = $(this).data('change-to');
        var swal_msg = change_to == 1 ? 'habilitado' : 'inhabilitado';
        ids_array.push(row_id);

        swal({
            title: 'Se marcará el registro con el ID '+row_id+' con el status de "'+swal_msg+'" ¿Está seguro de continuar?',
            icon: 'warning',
            buttons:["Cancelar", "Aceptar"],
            dangerMode: true,
        }).then((accept) => {
            if (accept){
                config = {
                    'route'     : route,
                    'ids'       : ids_array,
                    'change_to' : change_to,
                    'refresh'   : refresh,
                }
                loadingMessage();
                ajaxSimple(config);
            }
        }).catch(swal.noop);
    });

    //Send a request for a single delete
    $('body').delegate('.delete-row','click', function() {
        var route = $('div.general-info').data('url')+'/delete';
        var refresh = $('div.general-info').data('refresh');
        var ids_array = [];
        var row_id = $(this).hasClass('special-row') ? $(this).data('row-id') : $(this).parent().siblings("td:nth-child(2)").text();
        ids_array.push(row_id);

        swal({
            title: 'Se dará de baja el registro con el ID '+row_id+', ¿Está seguro de continuar?',
            icon: 'warning',
            buttons:["Cancelar", "Aceptar"],
            dangerMode: true,
        }).then((accept) => {
            if (accept){
                config = {
                    'route'     : route,
                    'ids'       : ids_array,
                    'refresh'   : refresh,
                }
                loadingMessage();
                ajaxSimple(config);
            }
        }).catch(swal.noop);
    });

    //Send a request for delete a galery
    $('body').delegate('.delete-galery','click', function() {
        var route = $('div.general-info').data('url')+'/delete';
        var refresh = $('div.general-info').data('refresh');
        var ids_array = [];
        var row_id = $(this).parent().attr('id');
        ids_array.push(row_id);

        swal({
            title: 'Se eliminará la imagen con el ID '+row_id+', ¿Está seguro de continuar?',
            icon: 'warning',
            buttons:["Cancelar", "Aceptar"],
            dangerMode: true,
        }).then((accept) => {
            if (accept){
                config = {
                    'route'     : route,
                    'ids'       : ids_array,
                    'refresh'   : refresh,
                }
                loadingMessage();
                ajaxSimple(config);
            }
        }).catch(swal.noop);
    });
        
    //Send a request for multiple delete
    $('body').delegate('.delete-rows','click', function() {
        var route = $('div.general-info').data('url')+'/delete';
        var refresh = $('div.general-info').data('refresh');
        var ids_array = [];
        $("input.checkDelete").each(function() {
            if($(this).is(':checked')) {
                ids_array.push($(this).parent().parent().siblings("td:nth-child(2)").text());
            }
        });
        if (ids_array.length > 0) {
            
            swal({
                title: 'Se dará de baja '+ids_array.length+' registro(s), ¿Está seguro de continuar?',
                icon: 'warning',
                buttons:["Cancelar", "Aceptar"],
                dangerMode: true,
            }).then((accept) => {
                if (accept) {
                    config = {
                        'route'     : route,
                        'ids'       : ids_array,
                        'refresh'   : refresh,
                    }
                    loadingMessage();
                    ajaxSimple(config);
                }
            }).catch(swal.noop);
        }
    });

    //Pusher code, it verifies if is neccesary to reload some page content.
    /*Pusher.logToConsole = false;

    var pusher = new Pusher('aa2627d74b476e17c6d1', {
        cluster: 'us2',
        encrypted: true
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(e) {
        if ( e.data.url == window.location.href ) {
            if (e.data.refresh == 'table') {
                refreshTable(e.data.url);
            } else if (e.data.refresh == 'galery') {
                refreshGalery(e.data.url);
            } else if (e.data.refresh == 'event_likes') {
                refreshLikes(e.data.event, e.data.likes, e.data.user, e.data.like);
            }
        } else {
            console.info(e.data);
            console.log('There is not any element to reload \nURL:' +e.data.url);
        }
    });*/
});

//Shows the loading swal
function loadingMessage() {
    swal({
        title: 'Espere un momento porfavor',
        buttons: false,
        closeOnEsc: false,
        closeOnClickOutside: false,
        content: {
            element: "div",
            attributes: {
                innerHTML:"<i class='fa fa-circle-o-notch fa-spin fa-3x fa-fw'></i>"
            },
        }
    }).catch(swal.noop);
}

//Reload a table, then initializes it as datatable
function refreshTable(url, column, table_id, container_id) {
    $('.delete-rows, .disable-rows').attr('disabled', true);
    var table = table_id ? $("table#"+table_id).dataTable() : $("table#example3").dataTable();
    var container = container_id ? $("div#"+container_id) : $('div#table-container');
    table.fnDestroy();
    container.fadeOut();
    container.empty();
    container.load(url, function() {
        container.fadeIn();
        $(table_id ? "table#"+table_id : "table#example3").dataTable({
            "aaSorting": [[ column ? column : 1, "desc" ]]
        });
        $('#example3_wrapper .dataTables_filter input').addClass("input-medium form-control");
        $('#example3_wrapper .dataTables_length select').addClass("select2-wrapper span12 form-control"); 
    });
    container.addClass('table-responsive');
}

//Reload a galery module
function refreshGalery(url, container_id) {
    var container = container_id ? $("div#"+container_id) : $('div#galery-container');
    container.fadeOut();
    container.empty();
    container.load(url, function() {
        container.fadeIn();
    });
}

//Reload a galery module
function refreshContent(url, container_id) {
    var container = container_id ? $("div#"+container_id) : $('div#content-container');
    container.fadeOut();
    container.empty();
    container.load(url, function() {
        container.fadeIn();
    });
}

//Change the src of a img label
function readURL(input) {
    console.log('crea una imagen')
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.cr-image').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
