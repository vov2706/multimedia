<div id="{{ $id ?? '' }}" class="modal fade {{ $class ?? '' }}" tabindex="-1" role="dialog" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Ви впевнені?</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body h5 text-center {{ $id ?? '' }}-modal-text">
                {{ $text ?? 'Дану дію буде неможливо відмінити!' }}
            </div>
            <div class="modal-footer modal-footer--flex">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Відміна</button>
                <button type="button" class="btn btn-danger" id="{{ $actionButton ?? 'js--success-modal' }}" data-id="{{ $model ?? '' }}">Так</button>
            </div>
        </div>
    </div>
</div>
