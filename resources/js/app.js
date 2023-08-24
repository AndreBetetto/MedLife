import './bootstrap';
import Alpine from 'alpinejs';
import {
  Modal,
  Ripple,
  initTE,
} from "tw-elements";

window.Alpine = Alpine;

Alpine.start();

initTE({ Modal, Ripple });