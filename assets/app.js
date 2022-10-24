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

console.log(location.pathname);

const initDashboardFiltering = () => {
  const selector = document.querySelector('select[name="filter"]');
  const filterBtn = document.querySelector('#filterBtn');

  selector.addEventListener('change', () => {
    filterBtn.setAttribute('href', `/status/${selector.value}`);
  });
}

// DASHBOARD PAGE
if (location.pathname === "/" || location.pathname.includes('status')) {
  initDashboardFiltering();
}



