<link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
<link rel="stylesheet" href="/vendor/markdown/css/editormd.min.css">
<div class="container" style="margin-bottom: 60px">
    <div class="row">
        <div class="col-md-2">
            <h3>API List</h3>
                <ol>
                   @foreach($apis as $a)
                       <li>
                           <a href="/api/{{$a->id}}">{{$a->name}}</a>
                       </li>
                   @endforeach
                </ol>
        </div>
        <div class="col-md-10">
            <div id="doc-content">
                <textarea style="display:none;">{{$api->doc}}</textarea>
            </div>
            @include('markdown::decode',['editors'=>['doc-content']])
        </div>
    </div>
</div>

