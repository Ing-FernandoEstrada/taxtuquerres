<div {{$attributes->merge(['class' => 'modal'])}}>
    <div class="modal-dialog{{$dialogclass}}">
        <div class="modal-content">
            <div class="modal-header">
                {{$header}}
                <button type="button" data-dismiss="modal" class="btn btn-close"></button>
            </div>
            <div class="modal-body">
                {{$slot}}
            </div>
            @isset($footer)
                <div class="modal-footer">
                    {{$footer}}
                </div>
            @endisset
        </div>
    </div>
</div>
