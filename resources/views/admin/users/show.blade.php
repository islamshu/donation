@extends('layouts.admin')
@section('css')
<style>
.zoom {
    padding: 50px;
    /* background-color: green; */
    transition: transform .2s;
    width: 200px;
    height: 200px;
    /* margin: 0 auto; */
  }
  
  .zoom:hover {
    -ms-transform: scale(1.5); /* IE 9 */
    -webkit-transform: scale(1.5); /* Safari 3-8 */
    transform: scale(2); 
  } 
</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
                 
                    <li class="breadcrumb-item active">الملف الشخصي</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Your content goes here  -->
    <div class="row clearfix">
        <div class="col-lg-4 col-md-12">
            <div class="card">
                <div class="m-b-20">
                    <div class="contact-grid">
                        <div class="profile-header bg-dark">
                            <div class="user-name">{{ @$user->name }}</div>
                        </div>
                        <img src="{{ asset('uploads/'.@$user->image) }}" class="user-img" alt="">
                       <p>
                        الجنس  : 
                      @if(@$user->gender == 1) ذكر @else انثى @endif  <br>
                      
                             انشيء منذ: <br>
                           {{ @$user->created_at->diffForHumans() }}
                       </p>
                       
                        @if(@$user->type =='user')
                        <p>
                            العمر : {{ @$user->getAge()}}
                             
                         </p>
                         @endif
                         @if(@$user->type == 'famous')

                         @if(@$user->verfy_account == 0)
                         <div >
                         <input class="btn btn-success update_cart" true="0" type="button" naa="{{ @$user->id }}" value="تفعيل">
                         @else
                         <input class="btn btn-danger update_cart" true="1" type="button" naa="{{ @$user->id }}" value="الفاء تفعيل">
                         @endif
                        </div>
                         @endif
 
                    
                    </div>
                </div>
            </div>
            
        </div>
        <div class="col-lg-8 col-md-12">
         
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="project" aria-expanded="true">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card project_widget">
                                <div class="header">
                                    @if(@$user->type == 'famous')
                                    <h2>بيانات الحساب</h2>
                                    @else
                                    <h2>المعلومات الشخصية</h2>
                                    @endif
                                    
                                </div>
                               
                                <div class="body">
                                    <div class="row">
                                        <div class="col-md-3 col-6 b-r">
                                            <strong>الاسم </strong>
                                            <br>
                                            <p class="text-muted">{{ @$user->name }}</p>
                                        </div>
                                        <div class="col-md-3 col-6 b-r">
                                            <strong>رقم الهاتف</strong>
                                            <br>
                                            <p class="text-muted">{{ @$user->phone }}</p>
                                        </div>
                                        <div class="col-md-3 col-6 b-r">
                                            <strong>البريد الالكتروني</strong>
                                            <br>
                                            <p class="text-muted">{{ @$user->email }}</p>
                                        </div>
                                        <div class="col-md-3 col-6">
                                            <strong>العنوان</strong>
                                            <br>
                                            <p class="text-muted">{{ @$user->address->name_ar }}</p>
                                        </div>
                                        @if(@$user->type == 'famous')


                                        <div class="col-md-3 col-6 b-r">
                                            <strong><i class="fab fa-snapchat fa-2x" aria-hidden="true"></i>
                                            </strong>
                                            <br>
                                            <p class="text-muted">{{ @$user->moreInfo->snapchat != null ? @$user->moreInfo->snapchat  : 'لم يضف' }}</p>
                                        </div>
                                        <div class="col-md-3 col-6 b-r">
                                            <strong><i class="fab fa-twitter fa-2x" aria-hidden="true"></i>
                                            </strong>
                                            <br>
                                            <p class="text-muted">{{ @$user->moreInfo->twitter != null ? @$user->moreInfo->twitter  : 'لم يضف' }}</p>
                                        </div>
                                        <div class="col-md-3 col-6 b-r">
                                            <strong><i class="fab fa-instagram fa-2x" aria-hidden="true"></i></strong>
                                            <br>
                                            <p class="text-muted">{{ @$user->moreInfo->instagram != null ? @$user->moreInfo->instagram  : 'لم يضف' }}</p>
                                        </div>
                                        <div class="col-md-3 col-6 b-r">
                                            <strong><img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/ba/Cib-tiktok_%28CoreUI_Icons_v1.0.0%29.svg/768px-Cib-tiktok_%28CoreUI_Icons_v1.0.0%29.svg.png" width="22" height="22" alt=""></strong>
                                            <br>
                                            <p class="text-muted">{{ @$user->moreInfo->tiktok != null ? @$user->moreInfo->tiktok  : 'لم يضف' }}</p>
                                        </div>
                                        <div class="col-md-3 col-6 b-r">
                                            <strong>pio</strong>
                                            <br>
                                            <p class="text-muted">{{ @$user->moreInfo->pio != null ? @$user->moreInfo->pio  : 'لم يضف' }}</p>
                                        </div>
                                        <div class="">
                                            <strong>صورة بطاقة الهوية</strong>
                                            <br>
                                           @if(@$user->verify_id->id_image == null)
                                           لم يتم الإرسال بعد 
                                           @else
                                           <div class="zoom">
                                           <img src="{{ asset('uploads/'.@$user->verify_id->id_image) }}" width="120" height="100">
                                           </div>
                                           @endif
                                         
                                        @endif
                                   
                                    </div>
                                  
                                </div>
                             
                            </div>
                        </div>
                       
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
         $( document ).ready(function() {
  

  $(".update_cart").click(function(){
        
        var id = $(this).attr('naa');
          var is_ture = $(this).attr('true');
    
        var thisContext = this;
        
            if(is_ture == 0){
                 $.ajax({
            type: "post",
            url: '{{ route('users.verfy_account') }}',
      data: { "_token": "{{csrf_token()}}",'id':id ,'status':1}, 
            success: function (data) {
                  //    AIZ.plugins.notify('success', 'متابعة');

                    $(thisContext).val("إلغاء التفعيل  ");  
                    $( thisContext ).removeClass( "btn-success" ).addClass( "btn-danger" );
                        $(thisContext).removeAttr("disabled"); 
                    $(thisContext).attr('true', 1);
                  $(thisContext).attr('disabled','disabled');
  setTimeout(function() {
      $('.update_cart').attr('disabled',false);
  },2000);
                            updateNavCart();

               
            }
        });
            }else if(is_ture == 1){
          
                swal({
title: "هل أنت متأكد من إلغاء التفعيل     ؟",
icon: "warning",
buttons: true,
dangerMode: true,
})
.then((willDelete) => {
if (willDelete) {
  
  var id = $(this).attr('naa');
          var is_ture = $(this).attr('true');
  
        var thisContext = this;

                 $.ajax({
            type: "post",
            url: '{{ route('users.verfy_account') }}',
            data: { "_token": "{{csrf_token()}}",'id':id ,'status':0}, 
            success: function (data) {
      
                        $(thisContext).val("تفعيل");  
                        $( thisContext ).removeClass( "btn-danger" ).addClass( "btn-success" );
                        $(thisContext).removeAttr("disabled");
                        $(thisContext).attr('true', 0);
                             $(thisContext).attr('disabled','disabled');
  setTimeout(function() {
      $('.update_cart').attr('disabled',false);
  },2000);
          updateNavCart();

            }
        });

}
});
                
                
                
        
            }
       
    
    });

      
});
    </script>
@endsection

