require('./bootstrap');

import { createApp } from 'vue'
import FirstComponent from './components/FirstComponent.vue'
import SecondComponent from './components/SecondComponent.vue'

createApp({
    components: {
        FirstComponent,
        SecondComponent,
    }
}).mount('#app')
