<template>
    <div>
        <div class="mt-8 mb-24">
            <div class="grid grid-cols-3 gap-2 justify-evenly mt-4">
                <div v-for="(video, index) in videos" :key="index">
                    <video width="280" height="200" autoplay="autoplay" controls="controls">
                        <source :src="video.original_url" :type="video.mime_type">
                    </video>
                </div>
            </div>
        </div>
        <div class="mt-4 w-100">
            <file-pond
                name="video"
                ref="pond"
                label-idle="Натисніть або перетягніть файл сюди, щоб додати відео..."
            />
        </div>
    </div>
</template>

<script>
import vueFilePond, { setOptions } from 'vue-filepond';
import "filepond/dist/filepond.min.css";
import FilePondPluginFileValidateType from 'filepond-plugin-file-validate-type';

let serverMessage = {};
setOptions({
    server: {
        process: {
            url: '/admin-panel/videos',
            onerror: (response) => {
                serverMessage = JSON.parse(response);
            }
        }
    },
    labelFileProcessingError: () => {
        return serverMessage.error;
    }
})

const FilePond = vueFilePond(FilePondPluginFileValidateType);

export default {
    components: {
        FilePond
    },
    data() {
        return {
            videos: []
        }
    },
    mounted() {
        axios.get('/admin-panel/videos/show/')
            .then((response) => {
                this.videos = response.data;
            })
            .catch((error) => {
                showWarningToastsMessage('Помилка отримання відео!')
            });
    },
}
</script>