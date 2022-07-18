<template>
    <div class="w-3/4 mx-auto flex items-center justify-between space-x-2 rounded border border-blue-400 ring ring-blue-300 ring-opacity-40">
        <!-- Search -->
        <div class="relative">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500 absolute top-3 left-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" />
            </svg>
            <input type="email" @input="searchInputChange" v-model="input" placeholder="Почати пошук..." class="flex-1 h-10 pl-10 px-4 py-2 m-1 text-gray-700 placeholder-gray-400 bg-transparent border-none appearance-none dark:text-gray-200 focus:placeholder-transparent focus:ring-0" />
            <div v-if="itemList.length > 0 && input.length > 0" class="absolute top-12 rounded left-0 w-full max-w-sm mx-auto shadow-lg border border-indigo-300-50 z-10">
                <div>
                    <ul class="flex-col items-start justify-start">
                        <li v-for="item in itemList" @click="checkCity" class="flex px-4 py-2 hover:bg-gray-100 cursor-pointer">
                            {{ item.city }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Search -->

        <!-- Data -->
        <div>
            <div class="flex items-center justify-between space-x-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <div date-rangepicker="" class="flex items-center justify-between">
                    <div>
                        <input name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Заїзд">
                    </div>
                    <span class="mx-2 text-gray-500">по</span>
                    <div>
                        <input  name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input" placeholder="Виїзд">
                    </div>
                </div>
            </div>
        </div>
        <!-- /Data -->

        <!-- Comprises -->
        <div class="w-1/4">
            <div class="relative">
                <div @click.stop="showComprisesForm" class="flex items-center justify-start h-full space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <div class="flex-col w-24 space-y-0">
                        <span class="flex text-sm text-gray-700">{{ comprises.adults }} дорослих</span>
                        <span class="flex text-sm text-gray-700">{{ comprises.children }} дітей</span>
                    </div>
                </div>
                <div v-show="comprises.isShowForm" class="absolute top-12 left-0 flex-col space-y-2 p-4 bg-white rounded shadow-lg border border-indigo-300-50 z-10">
                    <div class="flex items-center justify-between space-x-4">
                        <div>
                            Дорослі:
                        </div>
                        <div>
                            <div class="flex items-center justify-between space-x-2">
                                <div @click.stop="comprises.adults > 0 ? comprises.adults-- : ''" class="w-8 h-8 border border-gray-400 rounded shadow flex items-center justify-center cursor-pointer hover:bg-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                    </svg>
                                </div>
                                <div class="w-6">
                                    {{ comprises.adults }}
                                </div>
                                <div @click.stop="comprises.adults++" class="w-8 h-8 border border-gray-400 rounded shadow flex items-center justify-center cursor-pointer hover:bg-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between space-x-4">
                        <div>
                            Діти:
                        </div>
                        <div>
                            <div class="flex items-center justify-between space-x-2">
                                <div @click.stop="comprises.children > 0 ? comprises.children-- : ''" class="w-8 h-8 border border-gray-400 rounded shadow flex items-center justify-center cursor-pointer hover:bg-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 12H6" />
                                    </svg>
                                </div>
                                <div class="w-6">
                                    {{ comprises.children }}
                                </div>
                                <div @click.stop="comprises.children++" class="w-8 h-8 border border-gray-400 rounded shadow flex items-center justify-center cursor-pointer hover:bg-gray-200">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Comprises -->

        <!-- Submit -->
        <div>
            <button type="button" class="h-10 px-4 py-2 m-1 text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400">
                Шукати
            </button>
        </div>
        <!-- /Submit -->
    </div>
</template>

<script>
export default {
    data() {
        return {
            input: '',
            itemList: [],
            comprises: {
                adults: 2,
                children: 0,
                isShowForm: false,
            },
            period: {
                start: null,
                end: null,
                isShowDataForm: false,
            }
        }
    },
    methods: {
        async searchInputChange() {
            await axios.get('http://localhost/offers/search?query=' + this.input)
                .then(response => {
                    this.itemList = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                })
        },

        checkCity(event) {
            this.input = event.target.innerHTML;
            this.itemList = [];


        },

        showComprisesForm() {
            this.comprises.isShowForm = !this.comprises.isShowForm;
        },
        showDatesForm() {
            this.period.isShowDataForm= !this.period.isShowDataForm;
        },

       // async imageInputChange(event) {
       //      let files = Array.from(event.target.files);
       //     this.imagesOrder = files.slice();
       //     for (let item of files) {
       //         await this.uploadImage(item);
       //     }
       //  },
       //  async uploadImage(item) {
       //      let form = new FormData();
       //      form.append('images', item);
       //
       //      await axios.post('http://localhost/offers/upload', form, {
       //              onUploadProgress: (itemUpload) => {
       //                  this.uploadsProgress = Math.round( (itemUpload.loaded / itemUpload.total) * 100);
       //                  this.currentImage = item.name + ' ' + this.uploadsProgress;
       //              }
       //          }
       //      )
       //          .then(response => {
       //              this.uploadsProgress = 0;
       //              this.currentImage = '';
       //              this.imagesFinish.push(item);
       //              this.imagesOrder.splice(item, 1);
       //          })
       //          .catch(error => {
       //              console.log(error);
       //          })
       //  }
    },
    created() {
       document.addEventListener('click', () => this.comprises.isShowForm = false);
       document.addEventListener('click', () => this.period.isShowDataForm = false);
    }
}

</script>

<style scoped>

</style>
