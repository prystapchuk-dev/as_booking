require('./bootstrap');

import { createApp } from 'vue'
import HelloWorld from './components/Welcome.vue'
import SearchAutocomplete from './components/SearchAutocomplete.vue'


const app = createApp({})

app.component('hello-world', HelloWorld)
app.component('search-autocomplete', SearchAutocomplete)

app.mount('#app')
