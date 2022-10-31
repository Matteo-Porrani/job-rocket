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

import ModalHandling from "./js/modal_handling.js";
import DashboardFiltering from "./js/dashboard_filtering.js";
import ResumeToClipboard from "./js/resume_to_clipboard.js";



// console.log('pathname is ', location.pathname);

if (location.pathname === "/" || location.pathname.includes('status')) {
  DashboardFiltering.initFiltering();
}



// init modal handling
document.addEventListener('DOMContentLoaded', () => {
  ModalHandling.init();

  // copy to clipboard
  if (location.pathname.includes('preview')) {
    ResumeToClipboard.init();
  }

});



const linkImgFileInput = document.querySelector('input[type="file"]');
const linkImgFileIdentifier = document.querySelector('#linkImgFileIdentifier');



if (linkImgFileInput) {

  console.log(linkImgFileInput);

  linkImgFileInput.addEventListener('change', e => {

    const filename = e.target.value.split('\\')[2];
    linkImgFileIdentifier.textContent = filename;

  })
}
