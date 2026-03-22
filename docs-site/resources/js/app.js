import './bootstrap';

// Import Alpine.js and Oryn UI plugins
import Alpine from 'alpinejs';
import { registerOrynPlugins } from '../../vendor/oryn/ui/resources/js/oryn-ui.js';

registerOrynPlugins(Alpine);

Alpine.start();

window.Alpine = Alpine;
