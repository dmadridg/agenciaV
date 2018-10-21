@extends('layouts.main')

@section('content')
    @include('comments.modal')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header" style="text-align: center;">
                    <div class="btn-group">
                        <div class="general-info" data-url="{{url("comentarios")}}" data-refresh="content">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="content-container" style="display: none;">
                        @include('comments.content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $('body').delegate('.modal-info','click', function() {
            id = $(this).data('row-id');
            $('#load-bar').removeClass('hide');
            $('#detail-fields').addClass('hide');
            $('div#modal-info').modal();

            id = $(this).parent().parent().children('.row-id').text();
            photo = $(this).parent().parent().children('.real-user-photo').text();
            name = $(this).parent().parent().children('.real-name').text();
            comment = $(this).parent().parent().children('.real-comment').text();
            date = $(this).parent().parent().children('.real-date').text();
            business = $(this).parent().parent().children('.real-business').children('span.data-span').text();
            score = $(this).parent().parent().children('.real-score').text();

            $('.comment-id').text(id);
            $('.user-photo').attr('src', photo);
            $('.user-fullname').text(name);
            $('.business-name').text(business);
            $('.comment-data').text(comment);
            $('.comment-date').text(date);

            $('div.rating').children().remove();
            for (var i = 1; i <= score; i++) {
                $('div.rating').append('<i class="color fa fa-star" aria-hidden="true"></i>');
            }
        });
    </script>
@endsection