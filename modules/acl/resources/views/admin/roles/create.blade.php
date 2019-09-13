@extends('admin.layouts.master')

@section('content')
    @include('admin.layouts.breadcrumb')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form role="form">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">{{ trans('module-acl::form.name') }}: </label>
                                    <input type="text" class="form-control" id="" placeholder="Nhập vào tên">
                                </div>
                                <div class="form-group">
                                    <label for="description">{{ trans('module-acl::form.description') }}</label>
                                    <input type="text" class="form-control" id="description" placeholder="Nhập vào mô tả">
                                </div>
                                <div class="form-group">
                                    <label for="permission">{{ trans('module-acl::form.permission') }}</label>
                                    <select class="form-control select2" multiple="multiple" data-placeholder="Chọn quyền"
                                            style="width: 100%;">
                                        <option>Alabama</option>
                                    </select>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> Check me out
                                    </label>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </form>
                    </div>
                    @include('admin.partials.box-save')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js_customer')
    <script>
        $(document).ready(function () {
            $('.select2').select2()
        });
    </script>
@endsection