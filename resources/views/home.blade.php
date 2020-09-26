<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=<device-width></device-width>, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Application CRUD Using Jquery And Laravel </title>
  <link rel="stylesheet" href="{{ asset('css/font-awesome/css/afont-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">Blog</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">

    </div>
  </nav>

  <div class="container">

    <h1>List of Blog</h1>
    <hr>
    <div class="mt-2 mb-2 text-right">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSave">
        <i class="fa fa-save mr-2"></i> Create Blog
      </button>
    </div>
    <div class="table-responsive">

      <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th col="cols">#</th>
            <th col="cols">Title</th>
            <th col="cols">Content</th>
            <th col="cols">Action</th>
          </tr>
        </thead>
        <tbody id="contentPost">

          <tr>
            <td>1</td>
            <td>Lorem ipsum dolor sit.</td>
            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, voluptatibus.</td>
            <td>
              <a href="#" class="btn btn-outline-info btn-sm"><i class="fa fa-edit mr-2"></i> Edit</a>
              <a href="#" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash mr-2"></i> Delete</a>
            </td>
          </tr>

          <tr>
            <td>1</td>
            <td>Lorem ipsum dolor sit.</td>
            <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, voluptatibus.</td>
            <td>
              <a href="#" class="btn btn-outline-info btn-sm"><i class="fa fa-edit mr-2"></i> Edit</a>
              <a href="#" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash mr-2"></i> Delete</a>
            </td>
          </tr>
        </tbody>
      </table>
      <div id="loading" class="sk-double-bounce">
         <div class="sk-child sk-double-bounce1"></div>
         <div class="sk-child sk-double-bounce2"></div>
       </div>
    </div>
  </div>



  <!-- Modal Add Form Data -->
  <div class="modal fade" id="modalSave" tabindex="-1" role="dialog" aria-labelledby="modalSaveTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalSaveTitle">Create Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <div id="loadingSave" class="sk-double-bounce">
           <div class="sk-child sk-double-bounce1"></div>
           <div class="sk-child sk-double-bounce2"></div>
         </div>
        <form method="POST" id="savepos">
        <div class="form-group row">
          <label for="Title" class="col-md-2 col-sm-4 col-xs-4">Title</label>
          <div class="col-md-10 col-sm-8 col-xs-8">
            <input type="text" class="form-control" name="title" id="titleadd" placeholder="Enter title blog ...">
          </div>
        </div>

        <div class="form-group row">
          <label for="Content" class="col-md-2 col-sm-4 col-xs-4">Content</label>
          <div class="col-md-10 col-sm-8 col-xs-8">
            <textarea name="content" id="contentadd" cols="30" rows="10" class="form-control" placeholder="Enter content blog"></textarea>
          </div>
        </div>
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="btnSave" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- modal edit form -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modalEditTitle" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="modalEditTitle">Edit Blog</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div class="modal-body">
      <div id="loadingEdit" class="sk-double-bounce">
         <div class="sk-child sk-double-bounce1"></div>
         <div class="sk-child sk-double-bounce2"></div>
       </div>
      <form method="POST" id="editpos">
      <input type="hidden" name="id" id="idpost">
      <div class="form-group row">
        <label for="Title" class="col-md-2 col-sm-4 col-xs-4">Title</label>
        <div class="col-md-10 col-sm-8 col-xs-8">
          <input type="text" class="form-control" name="title" id="titleEdit" placeholder="Enter title blog ...">
        </div>
      </div>

      <div class="form-group row">
        <label for="Content" class="col-md-2 col-sm-4 col-xs-4">Content</label>
        <div class="col-md-10 col-sm-8 col-xs-8">
          <textarea name="content" id="contentEdit" cols="30" rows="10" class="form-control" placeholder="Enter content blog"></textarea>
        </div>
      </div>
    </div>


    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" id="btnEdit" class="btn btn-primary">Save changes</button>
    </div>
    </form>
  </div>
</div>
</div>


  <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script>

  $(document).ready(function() {


    function loadData() {
      $("#loading").css("display","block");
      $('#contentPost').empty();
      $.ajax({
        method:'GET',
        url: 'http://localhost:8000/all-blogs',
        dataType: 'json'
        }).done(function(data){
          $("#loading").css("display","none");

          $.map(data, function(blog, i){
          // $('#result').append('<h3>'+product.title+'</h3><p>'+product.penerbit+'</p');
          $('#contentPost').append('<tr>'+
              '<td>'+blog.id+'</td>'+
              '<td>'+blog.title+'</td>'+
              '<td>'+blog.content+'</td>'+
              '<td>'+
              '<button id="'+blog.id+'" class="btn btn-outline-info btn-sm btnEdit"><i class="fa fa-edit mr-2"></i> Edit</button>'+
              '<button name="'+blog.id+'" class="btn btn-outline-danger btn-sm btnDelete"><i class="fa fa-trash mr-2"></i> Delete</button>'+
              '</td>'+
            '</tr>');
        });
        }).fail(function() {
          $('#loading').css('display','none');
          $('#contentPost').append('<p class="text-center">There is no data found</p>')
       });
    }

    // load data post
    loadData();

    // save post
    $("#savepos").on('submit', function(e) {
      e.preventDefault();
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        $.ajax({
            url: '{{ route("addblog") }}',
            type: "POST",
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend:function() {
                $("#btnSave").attr('disabled', 'disabled');
                $('#loadingSave').css('display','block');
            },
            success:function (data) {
                console.log(data);
                $("#btnSave").removeAttr('disabled');
                $('#loadingSave').css('display','none');
                $('#titleadd').val('');
                $('#contentadd').val('');
                loadData();
            },
            error:function (error) {
                console.log(error)
                $("#btnSave").removeAttr('disabled');
                $('#loadingSave').css('display','none');
                $('#titleadd').val('');
                $('#contentadd').val('');
                loadData();
            }
        })
    });

    // show modal Edit
    $('body').on('click', '.btnEdit', function(){
      $("#loading").css("display","block");
      var idblog = $(this).attr('id');
      var currentBlog = [];
      var urlpage = '{{ url("/showeditblog/") }}';
      $('#modalEdit').modal('show');
      $.ajax({
         url: urlpage + '/' + idblog,
         method: "get",
         data: currentBlog,
         success: function (response) {
             currentBlog = response;
             console.log(response);
              $("#loading").css("display","none");
               var id = $('#idpost').attr('value', response.id);
               var urlpage = '{{ url("/editblog/") }}';
             $('#titleEdit').attr('value', response.title);
             $('#contentEdit').val(response.content);
         }
      });
    });

    // edit post
    $("#editpos").on('submit', function(e) {
      e.preventDefault();
      var idblog = $('#idpost').attr('value');

      var urlpage = '{{ url("/editblog/") }}';
      console.log(urlpage + '/' + idblog);
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
        $.ajax({
            url: urlpage + '/' + idblog,
            type: "POST",
            data: $(this).serialize(),
            dataType: 'json',
            beforeSend:function() {
                $("#btnEdit").attr('disabled', 'disabled');
                $("#loadingEdit").css("display","block");
            },
            success:function (data) {
                console.log(data);
                $("#loadingEdit").css("display","none");
                $("#btnEdit").removeAttr('disabled');
                loadData();
            },
            error:function (error) {
                console.log(error)
                $("#loadingEdit").css("display","none");
                $("#btnEdit").removeAttr('disabled');
                loadData();
            }
        })
    });

    // delete blog post
    $('body').on('click', '.btnDelete', function(){
      var id = $(this).attr('name');
      var url = '{{ url("/deleteblog/") }}';
      // confirm("Are You sure want to delete !");
      console.log(url + '/' + id);
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          });
      $.ajax({
          type: "DELETE",
          url: url + '/' + id,
          success: function (data) {
              alert(data.success);
              loadData();
          },
          error: function (data) {
              console.log('Error:', data);
              loadData();
          }
      });
    });

  });

  </script>


</body>
</html>
