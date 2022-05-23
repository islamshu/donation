@extends('layouts.admin')
@section('content')
    {{-- {{  dd(auth()->user()->getAllPermissions()) }} --}}
    <div class="container-fluid">
        <div class="block-header">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <ul class="breadcrumb breadcrumb-style ">

                        <li class="breadcrumb-item bcrumb-1">
                            <a href="{{ route('admin.dashboard') }}">
                                <i class="fas fa-home"></i> @lang('Home')</a>
                        </li>
                        <li class="breadcrumb-item active">{{ __('Setting') }}</li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- Basic Table -->
        <div class="row clearfix">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-8">
                <div class="card">
                    <div class="header">

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
                                        <form class="form-horizontal" method="post" action="{{ route('genereal.store') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="row clearfix">

                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="name_en"> {{ __('System name') }} </label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" value="{{ $general->name_en }}"
                                                                name="name_en" id="name_en" class="form-control"
                                                                placeholder=" {{ __('System name') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="logo"> {{ __('Big logo') }} </label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="file" name="big_logo"
                                                                class="custom-file-input image header_logo">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <img src="{{ asset('uploads/' . $general->big_logo) }}" style="width: 100px"
                                                    class="img-thumbnail image-preview" data-preview="image" alt="">
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="logo"> {{ __('Big logo') }} </label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="file" name="logo"
                                                                class="custom-file-input image header_logo">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <img src="{{ asset('uploads/' . $general->logo) }}" style="width: 100px"
                                                    class="img-thumbnail image-preview" data-preview="image" alt="">
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="name_en">@lang('E-mail')</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" value="{{ $general->email }}"
                                                                name="email" id="email" class="form-control"
                                                                placeholder=" @lang('E-mail')">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="name_en">@lang('Address')</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" value="{{ $general->Address }}"
                                                                name="Address" id="Address" class="form-control"
                                                                placeholder=" @lang('Address')">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="name_en">@lang('President Name')</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" value="{{ $general->President }}"
                                                                name="President" id="President" class="form-control"
                                                                placeholder=" @lang('President Name')">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                                    <label for="name_en">@lang('Phone ')</label>
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <div class="form-group">
                                                        <div class="form-line">
                                                            <input type="text" value="{{ $general->phone }}"
                                                                name="phone" id="phone" class="form-control"
                                                                placeholder=" @lang('Phone ')">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            




                                            <div class="row clearfix">
                                                <div class="col-lg-2 col-md-2 col-sm-4 col-xs-5">
                                                </div>
                                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                                    <input type="submit" value="{{ __('save') }}" class="filled-in btn btn-info">
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
            <script>
                $('#user_type').change(function() {
                    var value = $('#user_type :selected').val();
                    if (value == 'famous') {
                        $("#dateOf").css("display", "none");
                    } else {
                        $("#dateOf").css("display", "flex");

                    }

                });
            </script>
        @endsection
