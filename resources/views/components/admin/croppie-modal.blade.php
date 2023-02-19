<!-- Модальне вікно для croppie -->
<div class="modal modal-center" id="cropImagePop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Редагування фото</h4>
            </div>
            <div class="modal-body">
                <div id="upload-demo" class="center-block"></div>
                <span class="croppie-size-info mt-2">
                    <span id="cop-image-width">0</span>x<span id="cop-image-height">0</span>
                </span>
            </div>
            <div class="modal-footer modal-footer--flex">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="cropImageBtnDismiss">Відміна</button>
                <button type="button" class="btn btn-success" id="cropImageBtn">Так</button>
            </div>
        </div>
    </div>
</div>
