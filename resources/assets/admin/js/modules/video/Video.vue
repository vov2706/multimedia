<template>
    <div class="w-100">
        <div class="d-flex flex-wrap mt-8 mb-24 w-100">
            <div v-for="(video, index) in videos" :key="index" class="mx-4 position-relative">
                <span class="times" @click="openDeleteModal(video.id)">×</span>
                <video width="180" height="150" :src="video.original_url" />
            </div>
        </div>
        <div class="mt-4 w-100">
            <file-pond
                name="video"
                ref="pond"
                label-idle="Натисніть або перетягніть файл сюди, щоб додати відео..."
                accepted-file-types="video/mp4"
                @processfile="handleProcessedFile"
                max-file-size="100MB"
                :allow-multiple="true"
            />
        </div>
        <b-modal v-model="modalShow"  hide-backdrop title="Підтвердження дії">
            <div class="d-block text-center">
                <p class="modal-text">Ви впевнені, що хочете видалити відео?</p>
            </div>
            <template #modal-footer>
                <div class="w-100">
                    <div class="modal-footer-buttons">
                        <b-button
                            variant="secondary"
                            class="mx-2"
                            @click="hideDeleteModal"
                        >
                            Відмінити
                        </b-button>
                        <b-button
                            variant="danger"
                            class="float-right"
                            @click="deleteVideo"
                        >
                            Так
                        </b-button>
                    </div>
                </div>
            </template>
        </b-modal>
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
            videos: [],
            modalShow: false,
            deleteId: 0,
        }
    },
    mounted() {
       this.getVideos();
    },
    methods: {
        handleProcessedFile(error, file) {
            if (error) {
                console.error(error);
                return;
            }

            this.getVideos();
        },

        openDeleteModal(id) {
            this.modalShow = true;
            this.deleteId = id;
        },

        hideDeleteModal() {
            this.modalShow = false;
            this.deleteId = 0;
        },

        deleteVideo() {
            if (this.deleteId !== 0) {
                axios.delete(`/admin-panel/videos/${this.deleteId}/`)
                    .then((response) => {
                        this.videos = response.data.videos;
                        this.hideDeleteModal();
                        showSuccessToastsMessage('Успішно видалено!');
                    })
                    .catch((error) => {
                        showWarningToastsMessage('Помилка видалення відео!')
                    });
            }
        },

        getVideos() {
            axios.get('/admin-panel/videos/show/')
                .then((response) => {
                    this.videos = response.data.videos;
                })
                .catch((error) => {
                    showWarningToastsMessage('Помилка отримання відео!')
                });
        },
    },
}
</script>

<style scoped>
    .times {
        color: red;
        position: absolute;
        font-size: 18px;
        top: -5px;
        right: -20px;
    }

    .times:hover {
        cursor: pointer;
    }

    .modal-text {
        font-size: 18px;
    }

    .modal-footer-buttons {
        float: right;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }
</style>
