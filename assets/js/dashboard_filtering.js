// DashboardFiltering

export default {

  DomItems: {
    selector: document.querySelector('select[name="filter"]'),
    filterBtn: document.querySelector('#filterBtn'),
  },

  initFiltering() {
    this.DomItems.selector.addEventListener('change', e => {
      this.DomItems.filterBtn.setAttribute('href', `/status/${e.target.value}`);
    })
  }

}
