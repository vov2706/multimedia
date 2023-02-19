<script>
    let $uploadCrop,
        rawImg,
        fileName,
        files,
        filesIterator,
        fileType,
        $continue;

    const croppieParam = {
        'width': '{{ 1200 / 5 }}',
        'height': '{{ 800 / 5 }}',
        'type': 'square',
        'min-width': '1200',
    };

    $(document).on('click', '.empty-photo.gallery', function() {
        $(this).closest('.add-img-block').find('.file-input-gallery').click();
    });

    let blockRemove;
    $(document).on('click', '.removeImages', function (event) {
        event.preventDefault();
        $('#removeImages').modal('show');
        blockRemove = $(this).parent();
        if (blockRemove){
            let saved = blockRemove.find('.savedImg').val();
            if (saved == 1) {
                $('.removeImages-modal-text').text('Після заміни зображення та збереження, дану дію буде неможливо відмінити!');
            } else {
                $('.removeImages-modal-text').text('Дану дію буде неможливо відмінити!');
            }
        }
    });

    $(document).on('click', '#delete-btn-image', function () {
        if (blockRemove) {
            blockRemove.find('.delete-field').val('1');
            blockRemove.hide();
        }
        $('#removeImages').modal('hide');
    });

    function handleFileSelect(filesIterator) {
        if (typeof files[filesIterator] !== 'undefined') {
            let f = files[filesIterator];
            if (!f.type.match('image.*')) { return; }

            fileType = f.type;

            let reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                    rawImg = e.target.result;
                    fileName = $.md5(theFile['name']);
                    $('#cropImagePop').modal('show');
                };
            })(f);

            reader.readAsDataURL(f);
        }
    }

    $uploadCrop = $('#upload-demo').croppie({
        viewport: {
            width: {{ 1200 / 5 }},
            height: {{ 800 / 5 }},
            type: 'square'
        },
        enableExif: true
    });
    $('#cropImagePop').on('shown.bs.modal', function(){
        $continue = false;

        $uploadCrop.croppie('bind', {
            url: rawImg
        }).then(function(){
            console.log('jQuery bind complete');

            $uploadCrop.croppie('setZoom', 0);
            recursionSetImageSize = true;
            setImageSize();
        });
    });
    $('#cropImagePop').on('hide.bs.modal', function(){
        recursionSetImageSize = false;
    });

    let recursionSetImageSize = false;
    function setImageSize() {
        let info = $uploadCrop.croppie('get');

        if (info) {
            let top_left_x = info.points[0];
            let top_left_y = info.points[1];

            let bottom_right_x = info.points[2];
            let bottom_right_y = info.points[3];

            let cropped_width  = bottom_right_x - top_left_x;
            let cropped_height = bottom_right_y - top_left_y;

            if (cropped_width >= croppieParam['min-width']) {
                $('.croppie-size-info').addClass('croppie-size-info--true');
            } else {
                $('.croppie-size-info').removeClass('croppie-size-info--true');
            }

            $('#cop-image-width').text(cropped_width);
            $('#cop-image-height').text(cropped_height);
        }

        if (recursionSetImageSize) {
            setTimeout(setImageSize, 1000);
        }
    }

    $(document).on('change','.file-input-gallery', function(event){
        files         = event.target.files;
        filesIterator = 0;

        handleFileSelect(filesIterator);
    });

    $('#cropImageBtn').on('click', function (ev) {
        let resultFormat;

        switch (fileType) {
            case 'image/png':
                resultFormat = 'png';
                break;
            case 'image/webp':
                resultFormat = 'webp';
                break;
            default:
                resultFormat = 'jpeg';
                break;
        }

        $uploadCrop.croppie('result', {
            type: 'base64',
            format: resultFormat,
            size: 'original'
        }).then(function (resp) {
            let element = `<div class="show-item tmp-img">
                                        <input type="hidden" name="savedImg" class="savedImg" value="0">
                                        <input type="hidden" name="tmp_delete_gallery[${fileName}]" class="delete-field" value="0">
                                        <input type="hidden" name="text-images[${fileName}]" class="text-file-input" value="${resp}">
                                        <a href="#" class="removeImages">×</a>
                                        <img src="${resp}">
                                    </div>`;

            $('.show-block').find('.add-img-block').before(element);

            $continue = true;
            $('#cropImagePop').modal('hide');
        });
    });
    $('#cropImageBtnDismiss').on('click', function (ev) {
        $continue = true;
    });

    $('#cropImagePop').on('hidden.bs.modal', function(){
        filesIterator++;
        if (typeof files[filesIterator] !== 'undefined' && $continue) {
            handleFileSelect(filesIterator);
        } else {
            $('.file-input-gallery').val('');
        }
    });
</script>
