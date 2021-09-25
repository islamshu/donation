@extends('layouts.admin')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('content')
    
<div class="container-fluid">
  
    
                                                
                                            <div id="show_table">
                                            
                                                
                                                @include('admin.orders._show')
                                           
                         
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
function update_table(){
    
    // alert($id);
    $.get('{{ route('updatetable',$order->id) }}', {"_token": "{{csrf_token()}}"}, function(data){
        $("show_table").empty();
        $("#show_table").replaceWith(data);

            });
}
    $(document).ready(function () {
       
        $('#change_to_delevrry').on('click', function(e) {
           let id = {{ $order->id }};
           $.ajax({
                        url: "{{ route('update-delevery-status') }}",
                        type: 'post',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: {'id':id },     
                             success: function (data) {
                            if (data['status']==true) {
                                $("show_table").empty();
                            
                                update_table();
//رسالة toast للحذف
                                toastr.options.closeButton = true;
                                toastr.options.closeMethod = 'fadeOut';
                                toastr.options.closeDuration = 100;
                                toastr.success('تم التغير بنجاح');
                            } else {
                                alert('لقد حدث خطأ ما');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
        });
        $('#check_all').on('click', function(e) {
            if($(this).is(':checked',true))
            {
                $(".checkbox").prop('checked', true);
            } else {
                $(".checkbox").prop('checked',false);
            }
        });
//إختيار الجميع
        $('.checkbox').on('click',function(){
            if($('.checkbox:checked').length == $('.checkbox').length){
                $('#check_all').prop('checked',true);
            }else{
                $('#check_all').prop('checked',false);
            }
        });
//إختيار عنصر معين
        $('.change-all').on('click', function(e) {
            var idsArr = [];
            $(".checkbox:checked").each(function() {
                idsArr.push($(this).attr('data-id'));
            });
            if(idsArr.length <=0)
            {
//عند الضغط على زر الحذف - التحقق اذا كان المستخدم قد اختار اي صف للحذف
                alert("يرجى اختيار عنصر واحد على الأقل");
            }  else {
//رسالة تأكيد للحذف
                if(confirm("هل انت متأكد من توفر هذه المنتجات")){
                    var strIds = idsArr.join(",");
                    $.ajax({
                        url: "{{ route('update-multiple-category') }}",
                        type: 'post',
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data:  'ids='+strIds,
                        success: function (data) {
                            if (data['status']==true) {
                                $("show_table").empty();
                            
                                update_table();
//رسالة toast للحذف
                                toastr.options.closeButton = true;
                                toastr.options.closeMethod = 'fadeOut';
                                toastr.options.closeDuration = 100;
                                toastr.success('تم التغير بنجاح');
                            } else {
                                alert('لقد حدث خطأ ما');
                            }
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });
                }
            }
        });
    });
</script>
@endsection
