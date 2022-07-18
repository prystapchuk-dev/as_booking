<template>
    <div>
        <div class="w-full bg-gray-200  mb-6 rounded-lg">
            <div class="bg-blue-600 h-5" :style="{ width: uploadsProgress + '%'}">
                {{ currentImage }}%
            </div>
        </div>
    </div>

    <input type="file" multiple name="images[]" @change="imageInputChange">

    <div class="flex justify-between">
        <div class="flex flex-col">
            <h4>Зображень в черзі: {{ imagesOrder.length }}</h4>
            <ul>
                <li v-for="image in imagesOrder">
                    {{ image.name }}:{{ image.type }}
                </li>
            </ul>
        </div>
        <div class="flex flex-col">
            <h4>Завантажено зображень: {{ imagesFinish.length }}</h4>
            <ul>
                <li v-for="image in imagesFinish">
                    {{ image.name }}:{{ image.type }}
                </li>
            </ul>
        </div>

    </div>
</template>

<script>
export default {
    data() {
        return {
            imagesOrder: [],
            imagesFinish: [],
            uploadsProgress: 0,
            currentImage:''
        }
    },
    methods: {
       async imageInputChange(event) {
            let files = Array.from(event.target.files);
           this.imagesOrder = files.slice();
           for (let item of files) {
               await this.uploadImage(item);
           }
        },
        async uploadImage(item) {
            let form = new FormData();
            form.append('images', item);

            await axios.post('http://localhost/offers/upload', form, {
                    onUploadProgress: (itemUpload) => {
                        this.uploadsProgress = Math.round( (itemUpload.loaded / itemUpload.total) * 100);
                        this.currentImage = item.name + ' ' + this.uploadsProgress;
                    }
                }
            )
                .then(response => {
                    this.uploadsProgress = 0;
                    this.currentImage = '';
                    this.imagesFinish.push(item);
                    this.imagesOrder.splice(item, 1);
                })
                .catch(error => {
                    console.log(error);
                })
        }
    }
}

</script>

<style scoped>

</style>
