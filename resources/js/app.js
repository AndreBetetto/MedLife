import './bootstrap';
import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';
import mask from '@alpinejs/mask'
import {
  Modal,
  Ripple,
  initTE,
} from "tw-elements";

 

window.Alpine = Alpine;

Alpine.plugin(mask);
Alpine.plugin(persist);
Alpine.start();

initTE({ Modal, Ripple });