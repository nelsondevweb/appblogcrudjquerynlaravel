$(document).ready(function() {
  var urlLoaddata = {{ url('/all-blogs') }};

  function loadData() {
    $('#contentPost').empty();
    $.ajax({
      method:'GET',
      url: urlLoaddata,
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
            '<a href="#" class="btn btn-outline-info btn-sm"><i class="fa fa-edit mr-2"></i> Edit</a>'+
            '<a href="#" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash mr-2"></i> Delete</a>'+
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

  $("#savepos").on('submit', function(e) {
    e.preventDefault();
    alert("hai");
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
          },
          success:function (data) {
              console.log(data);
              loadData();
          },
          error:function (error) {
              console.log(error)
              loadData();
          }
      })
  });

});
