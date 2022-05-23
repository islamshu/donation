@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">

                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-home"></i> @lang('Home')</a>
                        </li>
                        <li class="breadcrumb-item active">Gallery</li>


                    </ul>
                </div>
            </div>
        </div>
        <!-- Basic Table -->
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-8">
                <div class="card">
                    <div class="header">
                        <h2 style="display: inline">@lang('Add Gallary')</h2>

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
                                        <form class="form-horizontal" method="post" action="{{ route('gallery.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="title"> @lang('title') </label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input required type="text" value="{{ old('title') }}"
                                                                name="title" id="title" class="form-control"
                                                                placeholder="@lang('title') ">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row clearfix field_wrapper">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="title"> @lang('image') </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="file" name="images[]" id="images"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-sm-8 col-xs-7">
                                                    <a href="javascript:void(0);" class="add_button"
                                                        title="Add field"><i class="fa fa-plus"></i></a>

                                                </div>

                                            </div>



                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <input type="submit"value="{{ __('save') }}"  class="filled-in btn btn-info">
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
                var maxField = 10; //Input fields increment limitation
                var addButton = $('.add_button'); //Add button selector
                var wrapper = $('.field_wrapper'); //Input field wrapper
                var fieldHTML =
                    `<div class="row clearfix testt">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="title"> Image </label>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="file" name="images[]" id="images"
                                                                class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-1 col-md-1 col-sm-8 col-xs-7">
                                                    <a href="javascript:void(0);" class="remove_button"
                                                        title="Add field"><i class="fa fa-trash" style="color:red"></i></a>

                                                </div>

                                            </div>`; //New input field html 
                var x = 1; //Initial field counter is 1

                //Once add button is clicked
                $(addButton).click(function() {
                    //Check maximum number of input fields
                    if (x < maxField) {
                        x++; //Increment field counter
                        $(wrapper).append(fieldHTML); //Add field html
                    }
                });

                //Once remove button is clicked
                $(wrapper).on('click', '.remove_button', function(e) {
                    e.preventDefault();
                    $(this).parent().parent('div').remove(); //Remove field html
                    x--; //Decrement field counter
                });
            });
        </script>

        @endsection