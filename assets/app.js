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





if (location.pathname.includes('jobs/form') || location.pathname.includes('jobs/edit')) {

  const range = document.querySelector('input[type="range"]');

  console.log('current value is ...', range.value);

  const labels = document.querySelectorAll('.status-label');

  const bgcolors = [
    "#f14668", /* refusée */
    "#b5b5b5", /* à traiter */
    "#ffe08a", /* candidature */
    "#fb8c00", /* en cours */
    "#00bdcf"  /* entretien */
  ];

  labels[range.value].classList.add('active');
  labels[range.value].style.background = bgcolors[parseInt(range.value)];

  range.addEventListener('change', e => {
    labels.forEach(i => i.classList.remove('active'));
    labels.forEach(i => i.style.background = 'transparent');
    labels[parseInt(e.target.value)].classList.add('active');
    labels[parseInt(e.target.value)].style.background = bgcolors[parseInt(e.target.value)];
  });

}




if (location.pathname.includes('resumes/preview')) {
  const resumeCopyBtn = document.querySelector('#resumeCopyBtn');

  resumeCopyBtn.addEventListener('click', () => {
    resumeCopyBtn.classList.add('clicked');

    setTimeout(() => {
      resumeCopyBtn.classList.remove('clicked');
    }, 500);
  })
}