<script>var baseURL = '{{ url('/') }}';</script>
<!-- jQuery 3 -->
{!! Html::script('admin/bower_components/jquery/dist/jquery.min.js') !!}
{!! Html::script('admin/bower_components/jquery-ui/jquery-ui.min.js') !!}
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
{!! Html::script('admin/bower_components/bootstrap/dist/js/bootstrap.min.js') !!}
{!! Html::script('admin/bower_components/select2/dist/js/select2.full.min.js') !!}
<script>var token = $('meta[name="csrf_token"]').attr("content");</script>
@yield('footer_js')
{!! Html::script('admin/bower_components/raphael/raphael.min.js'  ) !!}
{!! Html::script('admin/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') !!}
{!! Html::script('admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}
{!! Html::script('admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}
{!! Html::script('admin/bower_components/jquery-knob/dist/jquery.knob.min.js') !!}
{!! Html::script('admin/bower_components/moment/min/moment.min.js') !!}
{!! Html::script('admin/bower_components/bootstrap-daterangepicker/daterangepicker.js') !!}
{!! Html::script('admin/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') !!}
{!! Html::script('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}
{!! Html::script('admin/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') !!}
{!! Html::script('admin/bower_components/fastclick/lib/fastclick.js') !!}
{!! Html::script('admin/dist/js/adminlte.min.js') !!}
{!! Html::script('admin/dist/js/demo.js') !!}
@yield('js_content')
@yield('js_customer')