

<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">

                        <li class="breadcrumb-item bcrumb-1">
                            <a href="<?php echo e(route('admin.dashboard')); ?>">
                                <i class="fas fa-home"></i> @lang('Home')</a>
                        </li>
                        <li class="breadcrumb-item active"> Home Page </li>


                    </ul>
                </div>
            </div>
        </div>
        <!-- Basic Table -->
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-8">
                <div class="card">
                    <div class="header">
                        <h2 style="display: inline"><?php echo app('translator')->get('Home Page'); ?> </h2>

                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                                <div class="card">

                                    <div class="body">
                                        <?php if(count($errors) > 0): ?>
                                            <div class="alert alert-danger">
                                                <ul style="text-align: center">
                                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li><?php echo e($error); ?></li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?>
                                        <form class="form-horizontal" method="post"
                                            action="<?php echo e(route('home.store')); ?>"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?> 
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="email_address_2"> <?php echo e(__('Contect')); ?>  <span
                                                            style="color: red;font-size: 18px"> * </span></label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <textarea name="body" class="form-control" id="" cols="30" rows="10"><?php echo e(@$about->body); ?></textarea>

                                                    </div>
                                                </div>


                                                <div class="row clearfix">
                                                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                                    </div>
                                                    <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                        <input type="submit"value="<?php echo e(__('save')); ?>"  class="filled-in btn btn-info">
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
        <?php $__env->stopSection(); ?>
        <?php $__env->startSection('script'); ?>
            <script type="text/javascript">
                $(document).ready(function() {
                    $(".btn-success").click(function() {
                        var lsthmtl = $(".clone").html();
                        $(".increment").after(lsthmtl);
                    });
                    $("body").on("click", ".btn-danger", function() {

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
                        INPUT_FILE.value = "";
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
                                if (!file.type.match("image/")) {
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

                            console.log(FILE_LIST) //final list of uploaded files
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
        <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\prize\resources\views/admin/home.blade.php ENDPATH**/ ?>