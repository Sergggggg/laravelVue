require('./bootstrap');

import { createApp } from 'vue'
import dataTable from './components/dataTable.vue'

const app = createApp({dataTable})

app.component('data-table', dataTable)

app.mount('#app')