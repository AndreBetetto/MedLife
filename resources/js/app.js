import './bootstrap';
import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';
import mask from '@alpinejs/mask'
import {
  Modal,
  Ripple,
  initTE,
} from "tw-elements";

initTE({ Modal, Ripple });

window.Alpine = Alpine;
Alpine.plugin([persist, mask]);

Alpine.start();