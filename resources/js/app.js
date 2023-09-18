import './bootstrap';
import Alpine from 'alpinejs';
import persist from '@alpinejs/persist';
import {
  Modal,
  Ripple,
  initTE,
} from "tw-elements";

window.Alpine = Alpine;

Alpine.plugin(persist);
Alpine.start();

initTE({ Modal, Ripple });

// jQuery v3.3.1 is supported
$("#febre").roundSlider({
  radius: 72,
  circleShape: "half-top",
sliderType: "min-range",
  mouseScrollAction: true,
value: 19,
  handleSize: "+5",
  min: 10,
  max: 50
});