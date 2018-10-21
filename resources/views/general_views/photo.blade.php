<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalPhoto" id="modal-photo">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="gridSystemModalPhoto">Subir foto de perfil</h4>
            </div>
            <form id="form-import" method="POST" action="" onsubmit="return false" enctype="multipart/form-data" autocomplete="off" data-ajax-type="ajax-form-modal" data-column="0" data-refresh="0" data-redirect="0">
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-4 text-center">
                            <img id="foto_perfil" aria-grabbed="false" src="{{asset(auth()->user()->img)}}">
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="photo">Foto</label>
                                <input class="form-control not-empty file" type="file" id="photo" name="photo" data-msg="Foto">
                            </div>
                            <div class="form-group">
                                <label>Foto (base 64)</label>
                                <input class="form-control not-empty" type="text" id="base64" name="base64" data-msg="base64">
                            </div>
                        </div>
                        <div class="upload-cr-pic-wrap">
                            <div class="upload-cr-pic"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary save"> Guardar</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </form>            
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
    $(function (){
        $('#photo').change(function() {
            //Destroy when user choose a diferent image
            $('.upload-cr-pic').croppie('destroy');
            var img = this;

            $('.upload-cr-pic').croppie({
                url: readURL(img),
                mouseWheelZoom: false,
                /*enableZoom: false,
                showZoomer: false,*/
                viewport: {
                    width: 250,
                    height: 250,
                },
                boundary: {
                    width: 300,
                    height: 300
                },
                update: function (data) {
                    console.log('update');
                    $('.upload-cr-pic').croppie('result', {
                        type : 'base64',
                        quality: '0.9',
                        size: {
                            width: 640,
                            height: 605
                        },
                        /*circle: false*/
                    }).then(function(res) {
                        res = res.replace(/^data\:image\/\w+\;base64\,/, '');
                        $('input[name=base64]').val(res);
                    });
                }
            });
        });


        /*$('#photo').change(function(){
            $('#foto_perfil').croppie('destroy');
            var img = this;
            console.log(img);

            $('#foto_perfil').croppie({
                url: readURL(img),
                mouseWheelZoom: false,
                viewport: {
                    width: 200,
                    height: 200,
                },
                boundary: {
                    width: 300,
                    height: 300
                },
                update: function (data) {
                    $('#foto_perfil').croppie('result', {
                        type : 'base64',
                        quality: '0.9',
                        size: {
                            width: 640,
                            height: 605
                        },
                    }).then(function(res) {
                        res = res.replace(/^data\:image\/\w+\;base64\,/, '');
                        $('input[name=base64]').val(res);
                    });
                }
            });
        });*/


    });
    
</script>