/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

import ModalHandling from "./js/modal_handling";
import DashboardFiltering from "./js/dashboard_filtering";



// console.log('pathname is ', location.pathname);

if (location.pathname === "/" || location.pathname.includes('status')) {
  DashboardFiltering.initFiltering();
}

// init modal handling
document.addEventListener('DOMContentLoaded', () => {
  ModalHandling.init();
});
