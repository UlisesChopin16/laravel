import './bootstrap';
import { createApp } from 'vue';
import TextInput from './components/TextInput.vue';

const app = createApp({});
app.component('text-input', TextInput);
app.mount('#app');
