<div class="form-group {!! !$errors->has($label) ?: 'has-error' !!}">

    <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>

    <div class="{{$viewClass['field']}}">

        @include('admin::form.error')

        <div id="{{$id}}" style="width: 100%; height: 100%;">
            <textarea class="hidden editormd-markdown-textarea" name="{{$id}}-markdown-doc">{!! old($column, $value) !!}</textarea>
        </div>
            <textarea class="hidden editormd-markdown-textarea" name="{{$name}}">{{ old($column, $value) }}</textarea>
        </div>
    </div>
</div>