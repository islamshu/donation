<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.radixtouch.com/templates/admin/lorax/source/rtl/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 12 Sep 2021 07:09:30 GMT -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <title> {{ App\General::first()->name_ar }}</title>
    <!-- Favicon-->
    <link rel="icon" href="{{ asset('uploads/'. App\General::first()->logo) }}" type="image/x-icon">
    <!-- Plugins Core Css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet">
    <!-- Custom Css -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <!-- Theme style. You can choose a theme from css/themes instead of get all themes -->
    <link href="{{ asset('assets/css/styles/all-themes.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="{{ asset('assets/css/form.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/bundles/multiselect/css/multi-select.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/js/bundles/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css') }}" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>

    @yield('css')
</head>

<body>
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
         
            <p>يرجى الانتظار ... </p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    @include('admin.partials.nav')
    <!-- #Top Bar -->
    @include('admin.partials.side')

    <section class="content">
        

        @yield('content')
    </section>
    <!-- Plugins Js -->
    {{-- <script data-cfasync="false" src="../../../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"> </script>--}}
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('assets/js/admin.js') }}"></script>
    <script src="{{ asset('assets/js/pages/sparkline/sparkline-data.js') }}"></script>
    <script src="{{ asset('assets/js/pages/index.js') }}"></script>
    <script src="{{ asset('assets/js/table.min.js') }}"></script>

    <script src="{{ asset('assets/js/form.min.js') }}"></script>
    <script src="{{ asset('assets/js/bundles/multiselect/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('assets/js/bundles/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.js') }}"></script>
    <!-- Custom Js -->
    <script src="{{ asset('assets/js/pages/forms/advanced-form-elements.js') }}"></script>



    <script src="{{ asset('assets/js/pages/ecommerce/product-detail.js') }}"></script>


<script src="{{ asset('assets/js/pages/tables/jquery-datatable.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
      Pusher.logToConsole = true;

  var pusher = new Pusher('8778268e2fd280bbce85', {
      cluster: 'mt1'
    });
</script>
<script>
  var notificationsWrapper = $('.dropdown-notifications');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('li.scrollable-container');

// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('new-user');
// Bind a function to a Event (the full Laravel class)
channel.bind('App\\Events\\NewUser', function (data) {
    var existingNotifications = notifications.html();
   
    var newNotificationHtml = `<a href="`+data.url+`"><span class="table-img msg-user">
                                            <img src="`+ `{{asset('uploads/user/deflut.png')  }}` + `" alt="">
                                        </span><span class="menu-info"><span class="menu-title">` + data.title +`</span><span class="menu-desc">
                                                <i class="material-icons"></i> 
                                            </span>
                                        </span>
                                    </a>` ;
    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
});
</script>

<script>

 
    CKEDITOR.replace( '#ckeditor' );

</script>
<script>
 $('.delete-confirm').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `هل متأكد من حذف العنصر ؟`,
        icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
  });
  $('.pen').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `هل متأكد من  حظر هذا المستخدم ؟`,
        icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
  });
  $('.unpen').click(function(event) {
      var form =  $(this).closest("form");
      var name = $(this).data("name");
      event.preventDefault();
      swal({
          title: `هل متأكد من إلغاء حظر هذا المستخدم ؟`,
        icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          form.submit();
        }
      });
  });
  </script>
    <script>
        $(document).ready(function () {
        $(".image").change(function () {

            var img_name=$(this).attr('name');
if (this.files && this.files[0]) {
    var reader = new FileReader();
   reader.onload = function (e) {
        $('.image-preview[data-preview='+img_name+']').attr('src', e.target.result); }
    reader.readAsDataURL(this.files[0]);
 }
});
});
    </script>
    
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>

    @yield('script')
</body>