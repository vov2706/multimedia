if(!!$('.tinymce')){
    tinymce.init({
        selector: '.tinymce',
        setup: function(editor) {
            let formSended = 0;
            editor.on('NodeChange', function (e) {
                if (e.element.tagName === "IMG") {
                    let content  = editor.getContent(),
                        oldSrc   = String(e.element.attributes.src.nodeValue),
                        fileName = String(e.element.attributes.title.nodeValue),
                        uuid     = String(e.element.attributes.alt.nodeValue);

                    if (oldSrc.replace(/\/w:[0-9]*\//, '/w:' + e.element.width + '/') !== oldSrc && !formSended) {

                        formSended = 1;
                        setTimeout(function(){ formSended = 0; }, 200);

                        $.ajax({
                            type: 'POST',
                            url: '/wmpanel/change/loaded-image/',
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'newWidth': e.element.width,
                                'fileName': fileName,
                                'uuid': uuid
                            },
                            async: true,
                            success: function (data) {
                                content = content.replace(oldSrc, data['newSrc']);
                                editor.setContent(content);
                            },
                            error: function (response) {
                                console.log('error NodeChange');
                            }
                        });
                    }
                }
            });
        },
        language: 'uk',
        height: 600,
        content_css: '/admin/css/text-pages.css',
        plugins: 'advlist autolink link image lists code paste preview fullscreen',
        toolbar: "bold italic underline | formatselect | alignleft aligncenter alignright alignjustify | bullist numlist link image code | preview fullscreen",
        block_formats: 'Paragraph=p; Заголовок рівня 1=h1; Заголовок рівня 2=h2; Заголовок рівня 3=h3; Заголовок рівня 4=h4; Заголовок рівня 5=h5; Заголовок рівня 6=h6;',
        formats: {
            h1: { block: 'h1'},
            h2: { block: 'h2'},
            h3: { block: 'h3'},
            h4: { block: 'h4'},
            h5: { block: 'h5'},
            h6: { block: 'h6'},
            bold: { inline: 'b', classes: 'wm-text-bold'},
            italic: { inline: 'i', classes: 'wm-text-italic'},
            underline: { inline: 'u', classes: 'wm-text-underline'},
            alignleft: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'wm-align-left'},
            aligncenter: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'wm-align-center'},
            alignright: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'wm-align-right'},
            alignjustify: { selector: 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li,table,img', classes: 'wm-align-justify'},
        },
        extended_valid_elements: "b,i,b/strong, i/em",
        file_picker_types: 'image',
        button_tile_map: true,
        paste_as_text: true,
        image_title: true,
        automatic_uploads: true,
        convert_urls: false,
        statusbar: false,
        menubar: false,
        file_picker_callback: function (cb, value, meta) {
            let input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');

            input.onchange = function () {
                let file = this.files[0];
                let reader = new FileReader();
                reader.onload = function () {
                    $.ajax({
                        type: 'POST',
                        url: '/wmpanel/load-image/',
                        data: {
                            '_token': $('input[name=_token]').val(),
                            'base64': reader.result
                        },
                        async: true,
                        success: function (data) {
                            cb(data.link, {title: data.name, alt: data.uuid});
                        },
                        error: function (response) {
                            cb(reader.result, {title: data.name, alt: data.uuid});
                        }
                    });
                };
                reader.readAsDataURL(file);
            };
            input.click();
        },
    });
}
