const path = require('path');
const fs = require('fs');

module.exports = (mix) => {
    mix.setPublicPath(path.normalize('public/admin'));

    mix.js('resources/assets/admin/js/index.js', 'public/admin/js/index.js');
    mix.sass('resources/assets/admin/scss/index.scss', 'public/admin/css');
    mix.sass('resources/assets/admin/scss/text-pages/index.scss', 'public/admin/css/text-pages.css');
    const copy = [
        { from: './node_modules/admin-lte/dist/img', to: 'public/admin/img' },
        { from: './node_modules/tinymce', to: 'public/admin/plugins/tinymce' },
        { from: './node_modules/admin-lte/plugins/fontawesome-free/webfonts', to: 'public/admin/webfonts' },
    ];
    copy.map(path => {
        try { if (fs.lstatSync(path.to).isDirectory()) {} }
        catch (e) { mix.copyDirectory(path.from, path.to); }
    });
    mix.combine([
        `./node_modules/admin-lte/plugins/jquery/jquery.min.js`,
        `./node_modules/croppie/croppie.js`,
        `./node_modules/js-cookie/dist/js.cookie.min.js`,
        `./node_modules/jquery-ui-dist/jquery-ui.min.js`,
        `./node_modules/admin-lte/dist/js/adminlte.min.js`,
        `./node_modules/select2/dist/js/select2.min.js`,
        `./node_modules/admin-lte/plugins/jquery-ui/jquery-ui.min.js`,
        `./node_modules/bootstrap/dist/js/bootstrap.min.js`,
        './node_modules/admin-lte/plugins/bs-custom-file-input/bs-custom-file-input.min.js'
    ], `public/admin/js/vendor.js`);

    mix.webpackConfig({
        module: {
            rules: [
                {
                    test: /\.scss$/,
                    loader: "sass-loader",
                    options: {
                        additionalData: `
                       @import './resources/assets/admin/scss/mixins.scss';
                    `
                    }
                },
            ]
        },
    });

    if (mix.inProduction()) {
        mix.version();
    }
}
