<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>
    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="asset_admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="asset_admin/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="asset_admin/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="asset_admin/vendor/morrisjs/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="asset_admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="asset_admin/admin-style.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    @include('admin.navbar')

    <div id="page-wrapper" style="margin-bottom: 15px;padding-bottom: 15px">

        @yield('content')
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->
<script src="asset_admin/vendor/jquery/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="asset_admin/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="asset_admin/vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="asset_admin/vendor/raphael/raphael.min.js"></script>
<script src="asset_admin/vendor/morrisjs/morris.min.js"></script>
<script src="asset_admin/data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="asset_admin/dist/js/sb-admin-2.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>

<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 200,
            minHeight: null,
            maxHeight: null,
            focus: false,
            lang: 'vi-VN',
            toolbar: [
                ['temp', ['style']],
                ['style', ['bold', 'italic', 'underline']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['clear', ['codeview', 'clear']]
            ], popover: {
                image: [
                    ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                    ['float', ['floatLeft', 'floatRight', 'floatNone']],
                    ['custom', ['imageAttributes']],
                    ['remove', ['removeMedia']]
                ],
                link: [
                    ['link', ['linkDialogShow', 'unlink']]
                ]
            },
            disableDragAndDrop: true,
            callbacks: {
                onImageUpload: function (files, editor, welEditable) {
                    uploadImage(files[0], editor, welEditable);
                }
            }
        });
        function uploadImage(file, editor, welEditable) {
            var data = new FormData();
            data.append('_token', '{{ csrf_token() }}');
            data.append("file-image", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "{{ route('imageUpload') }}",
                contentType: false,
                processData: false,
                error: function (jqXHR, textStatus, errorThrow) {
                    toastr['error']('Lỗi trong quá trình xử lý dữ liệu');
                },
                success: function (data) {
                    if (data.status_code === 200) {
                        console.log(data.data);
                        $('.summernote').summernote('editor.insertImage', data.data);
                    } else {
                        toastr['error'](data.message);
                    }
                }
            });
        }
    });
</script>
@yield('script')
</body>

</html>
