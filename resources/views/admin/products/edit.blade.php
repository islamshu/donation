@extends('layouts.admin')
@section('css')
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style>
    .form {
  width: 500px;
  margin: 5% auto;

  &__container {
    position: relative;
    width: 100%;
    height: 200px;
    border: 2px dashed silver;
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 18px;
    color: silver;
    margin-bottom: 5px;

    &.active {
      background-color: rgba($color: silver, $alpha: 0.2);
    }
  }

  &__file {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    cursor: pointer;
    opacity: 0;
  }

  &__files-container {
    display: block;
    width: 100%;
    font-size: 0;
    margin-top: 20px;
  }

  &__image-container {
    display: inline-block;
    width: 49%;
    height: 200px;
    margin-bottom: 10px;
    position: relative;

    &:not(:nth-child(2n)) {
      margin-right: 2%;
    }

    &:after {
      content: "✕";
      position: absolute;
      line-height: 200px;
      font-size: 30px;
      margin: auto;
      top: 0;
      right: 0;
      left: 0;
      text-align: center;
      font-weight: bold;
      color: #fff;
      background-color: rgba($color: #000, $alpha: 0.4);
      opacity: 0;
      transition: opacity 0.2s ease-in-out;
    }

    &:hover {
      &:after {
        opacity: 1;
        cursor: pointer;
      }
    }
  }

  &__image {
    object-fit: contain;
    width: 100%;
    height: 100%;
  }
}

</style>
@endsection
@section('content')
<div class="container-fluid">
    <div class="block-header">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <ul class="breadcrumb breadcrumb-style ">
               
                    <li class="breadcrumb-item bcrumb-1">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="fas fa-home"></i> الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active">تعديل بيانات المنتج  </li>


                </ul>
            </div>
        </div>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-8">
            <div class="card">
                <div class="header">
                    <h2 style="display: inline">تعديل بيانات المنتج</h2>
                 
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                            <div class="card">
                            
                                <div class="body">
                                    @if (count($errors) > 0)
<div class="alert alert-danger">
 <ul style="text-align: center">
  @foreach ($errors->all() as $error)
   <li>{{ $error }}</li>
  @endforeach
 </ul>
</div>
@endif
                                    <form class="form-horizontal" method="post" action="{{ route('products.update',$product->id) }}" enctype="multipart/form-data">
                                        @csrf @method('put')
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="email_address_2"> اسم المنتج  <span style="color: red;font-size: 18px"> * </span></label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input required type="text" value="{{ $product->name }}" name="name" id="name" class="form-control"
                                                            placeholder="ادخل اسم المنتج">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @if(auth()->user()->hasRole('اداري'))

                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="price"> سعر المنتج <span style="color: red;font-size: 18px"> * </span> </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input required type="number" value="{{ $product->price}}" name="price" id="price" class="form-control"
                                                            placeholder="ادخل سعر المنتج">
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        @endif
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="stock"> الكمية <span style="color: red;font-size: 18px"> * </span> </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <input  type="number" value="{{ $product->stock }}" name="stock" id="stock" class="form-control"
                                                            placeholder="ادخل كمية المنتج">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        



                                       
                               
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                <label for="price"> وصف المنتج  </label>
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        <textarea name="description" class="ckeditor" id="ckeditor" cols="30" rows="10">{{  $product->description }}</textarea>
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <!-- #END# Color Pickers -->
            <!-- File Upload | Drag & Drop OR With Click & Choose -->
            
            <!-- #END# File Upload | Drag & Drop OR With Click & Choose -->
            <!-- Masked Input -->
               









                <div class="row clearfix">
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                        <label for="price"> صور المنتج   </label>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                        <label class="form__container" id="upload-container">
                            <input class="form__file" name="image[]"  id="upload-files" type="file" accept="image/*" multiple="multiple">
                          </label>
                          <div class="form__files-container" id="files-list-container">
                            @foreach (json_decode($product->image) as $key=> $item)

                            <div style="display:inline" class="form__image-container js-remove-image" data-index="{{ $key }}">
                                    
                              
                                <img width="100" class="form__image" src="{{ asset('uploads/'.$item) }}" >
                              </div>
        
                              @endforeach
        
                    </div>
                </div>
                  </div>
                                       
                                        <div class="row clearfix">
                                            <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                            </div>
                                            <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                <input  type="submit"  value="حفظ" class="filled-in btn btn-info">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Table -->
    <!-- Striped Rows -->
  
@endsection
@section('script')

<script type="text/javascript">
    $(document).ready(function() {
      $(".btn-success").click(function(){ 
          var lsthmtl = $(".clone").html();
          $(".increment").after(lsthmtl);
      });
      $("body").on("click",".btn-danger",function(){ 
        
          $(this).parents(".lst").remove();
      });
    });
</script>
<script>
const INPUT_FILE = document.querySelector('#upload-files');
const INPUT_CONTAINER = document.querySelector('#upload-container');
const FILES_LIST_CONTAINER = document.querySelector('#files-list-container');
const FILE_LIST = [];
let UPLOADED_FILES = [];

const multipleEvents = (element, eventNames, listener) => {
  const events = eventNames.split(' ');
 
  events.forEach(event => {
    element.addEventListener(event, listener, false);
  });
};

const previewImages = () => {
  FILES_LIST_CONTAINER.innerHTML = '';
  if (FILE_LIST.length > 0) {
    FILE_LIST.forEach((addedFile, index) => {
      const content = `
        <div style="display:inline" class="form__image-container js-remove-image" data-index="${index}">
          <img width="100" class="form__image" src="${addedFile.url}" alt="${addedFile.name}">
        </div>
      `;

      FILES_LIST_CONTAINER.insertAdjacentHTML('beforeEnd', content);
    });
  } else {
    console.log('empty')
    INPUT_FILE.value= "";
  }
}

const fileUpload = () => {
  if (FILES_LIST_CONTAINER) {
    multipleEvents(INPUT_FILE, 'click dragstart dragover', () => {
      INPUT_CONTAINER.classList.add('active');
    });
  
    multipleEvents(INPUT_FILE, 'dragleave dragend drop change blur', () => {
      INPUT_CONTAINER.classList.remove('active');
    });
  
    INPUT_FILE.addEventListener('change', () => {
      const files = [...INPUT_FILE.files];
      console.log("changed")
      files.forEach(file => {
        const fileURL = URL.createObjectURL(file);
        const fileName = file.name;
        if (!file.type.match("image/")){
          alert(file.name + " is not an image");
          console.log(file.type)
        } else {
          const uploadedFiles = {
            name: fileName,
            url: fileURL,
          };

          FILE_LIST.push(uploadedFiles);
        }
      });
      
      console.log(FILE_LIST)//final list of uploaded files
      previewImages();
      UPLOADED_FILES = document.querySelectorAll(".js-remove-image");
      removeFile();
    }); 
  }
};

const removeFile = () => {
  UPLOADED_FILES = document.querySelectorAll(".js-remove-image");
  
  if (UPLOADED_FILES) {
    UPLOADED_FILES.forEach(image => {
      image.addEventListener('click', function() {
        const fileIndex = this.getAttribute('data-index');

        FILE_LIST.splice(fileIndex, 1);
        previewImages();
        removeFile();
      });
    });
  } else {
    [...INPUT_FILE.files] = [];
  }
};

fileUpload();
removeFile();
</script>
@endsection

