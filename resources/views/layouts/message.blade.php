<script>
    @if (session()->has('danger'))
    require(['hdjs'], function (hdjs) {
        hdjs.swal({
            text: "{{session()->get('danger')}}",
            button:false,
            icon:'warning'
        });
    })
    @endif
</script>
<script>
    @if (session()->has('success'))
    require(['hdjs'], function (hdjs) {
        hdjs.swal({
            text: "{{session()->get('success')}}",
            button:false,
            icon:'success'
        });
    })
    @endif
</script>
{{--手册中表单验证里errors搜索--}}
<script>
    @if ($errors->any())
    require(['hdjs'], function (hdjs) {
        hdjs.swal({
            text: "@foreach ($errors->all() as $error) {{ $error }}\r\n @endforeach",
            button:false,
            icon:'warning'
        });
    })
    @endif
</script>