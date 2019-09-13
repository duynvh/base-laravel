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
                                    <label for="name">{{ trans('module-blog::form.name') }}</label>
                                    <input type="text" class="form-control" id="name" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('module-blog::form.category') }}</label>
                                    <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Alabama</option>
                                        <option>Alaska</option>
                                        <option>California</option>
                                        <option>Delaware</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Washington</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('module-blog::form.description') }}</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>{{ trans('module-blog::form.status') }}</label>
                                    <select class="form-control select2" style="width: 100%;">
                                        <option selected="selected">Alabama</option>
                                        <option>Alaska</option>
                                        <option>California</option>
                                        <option>Delaware</option>
                                        <option>Tennessee</option>
                                        <option>Texas</option>
                                        <option>Washington</option>
                                    </select>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"> {{ trans('module-blog::form.default') }}
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
            $('.select2').select2();
        });
    </script>
@endsection