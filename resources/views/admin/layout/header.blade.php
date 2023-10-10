<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>@yield('title')</title>

<!-- Custom fonts for this template-->
<link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">

<script src="https://cdn.tiny.cloud/1/ausccx4z6qqsh06scnqnshr2yeglpv8ospv23rhiu49atxug/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">


{{-- PUSHER --}}
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('0e42788b3259b906d514', {
        cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        alert(JSON.stringify(data));
    });
</script>
{{-- END PUSHER --}}

<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<style>
    .image-admin {
        width: 200px;
        height: 150px;
        overflow: hidden;
        position: relative;
    }

    .object-fit-cover {
        object-fit: cover;
    }

    .thumbnail {
        width: 90%;
        height: 200px;
        overflow: hidden;
        position: relative;
    }

    .gallery {
        width: 300px;
        height: 300px;
        overflow: hidden;
        position: relative;
    }

    .slider {
        width: 400px;
        height: 160px;
        overflow: hidden;
        position: relative;
    }
</style>
