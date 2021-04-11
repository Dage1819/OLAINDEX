@extends('default.layouts.main')
@section('title', setting('site_name','OLAINDEX'))
@section('content')
    @includeWhen(!blank($path),'default.components.breadcrumb',['hash' => $hash, 'path' => $path])
    @if (!blank($doc['head']))
        <div class="card border-light mb-3 shadow">
            <div class="card-header"><i class="ri-send-plane-fill"></i> HEAD</div>
            <div class="card-body markdown-body" id="head">
                {!! marked($doc['head']) !!}
            </div>
        </div>
    @endif
    <div class="card border-light mb-3 shadow">
        <div class="card-header d-flex align-items-center">
            @if(count($accounts) > 1)
                <div class="dropdown mb-0 mr-2 my-1">
                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" id="btnChoiceAccount"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        选择盘符：
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnChoiceAccount">
                        @foreach($accounts as $key => $account)
                            <a class="dropdown-item"
                               href="{{ route('drive.query',['hash' => $account['hash_id']]) }}">{{ $key + 1 .':'.$account['remark'] }}</a>
                        @endforeach
                    </div>
                </div>
            @endif


            @if(setting('open_search', 0))
            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#links-container">
                导出直链
            </button>
                <form class="form-inline mb-0 mr-2 my-1">
                    <label class="mb-0 mr-2 my-1">
                        <input class="form-control form-control-sm" type="text" name="keywords"
                               placeholder="搜索" value="{{ $keywords }}">
                    </label>
                    <button class="btn btn-primary btn-sm mr-2 my-1" type="submit">搜索</button>
                </form>
            @endif
        </div>
        <!----开始----->
        <div class="card-body table-responsive">
         Ops! hello,此页面不可访问！
        </div>
        <!--删除首页文件夹列表显示--->

    </div>

    @if (!blank($doc['readme']))
        <div class="card border-light mb-3 shadow">
            <div class="card-header"><i class="ri-bookmark-fill"></i> README</div>
            <div class="card-body markdown-body" id="readme">
                {!! marked($doc['readme']) !!}
            </div>
        </div>
    @endif
    <div class="modal fade" id="links-container" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">导出直链</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>导出当前页面文件下载地址</p>
                    <p>
                        <a class="clipboard btn btn-primary btn-sm" href="javascript:void(0)"
                           data-toggle="tooltip"
                           data-placement="right" data-clipboard-target="#dl"
                        >复制全部</a>
                        <a class="btn btn-info btn-sm" href="javascript:void(0)" onclick="exportLinks()">下载</a>
                    </p>
                    <label for="dl">
                        <textarea name="urls" id="dl" class="form-control" cols="60"
                                  rows="15"></textarea>
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" onclick="fetchLinks()">点击获取</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                </div>
            </div>
        </div>
    </div>
@stop
@push('scripts')
    <script>
        const preLoad = () => {
            axios.post('/drive/preload/', {
                hash: "{{ $hash }}",
                query: "{{ implode('/', $path) }}",
            })
                .then(function(response) {
                    let data = response.data
                    if (data.error !== '') {
                        console.error(data.error)
                    }
                })
                .catch(function(error) {
                    console.error(error)
                })
        }

        function fetchLinks() {
            $('#dl').val('')
            $('.download').each(function() {
                let dn = $(this).attr('title')
                let dl = decodeURI($(this).attr('href'))
                let url = dn + ' ' + dl + '\n'
                let origin = $('#dl').val()
                $('#dl').val(origin + url)
            })
        }

        function exportLinks() {
            let data = $('#dl').val()
            exportRaw(data, 'urls.txt')
        }

        function exportRaw(data, name) {
            let urlObject = window.URL || window.webkitURL || window
            let export_blob = new Blob([data])
            let save_link = document.createElementNS('http://www.w3.org/1999/xhtml', 'a')
            save_link.href = urlObject.createObjectURL(export_blob)
            save_link.download = name
            save_link.click()
        }

        $(function() {
            preLoad()
            $('.list-item').on('click', function(e) {
                if ($(this).attr('data-route')) {
                    window.location.href = $(this).attr('data-route')
                }
                e.stopPropagation()
            })
        })
    </script>
@endpush

