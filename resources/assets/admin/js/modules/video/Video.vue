<template>
    <div class="w-100">
        <div class="d-flex mt-8 mb-24 w-100">
            <div v-for="(video, index) in videos" :key="index" class="mx-4">
                <video width="180" height="150" :src="video.original_url" />
            </div>
        </div>
        <div class="mt-4 w-100">
            <file-pond
                name="video"
                ref="pond"
                label-idle="Натисніть або перетягніть файл сюди, щоб додати відео..."
                accepted-file-types="video/mp4"
                :files="files"
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
            files: [],
            videos: []
        }
    },
    mounted() {
        axios.get('/admin-panel/videos/show/')
            .then((response) => {
                this.videos = response.data.videos;
                this.files = response.data.files;
            })
            .catch((error) => {
                showWarningToastsMessage('Помилка отримання відео!')
            });
    },
}
</script>
