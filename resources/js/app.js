require('./bootstrap');

import admin from './admin';
import guest from './guest';

import Alpine from "alpinejs";

window.Alpine = Alpine

Alpine.data('admin', admin);
Alpine.data('guest', guest);

Alpine.start();
