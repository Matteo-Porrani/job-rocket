// ModalHandling

export default {

  DomItems: {
    modal: null,
    discard: null,
    toggler: null,
    confirmDelete: null,
    identifier: null,
    identifierSpan: null,
  },

  init() {
    this.DomItems.modal = document.querySelector('#mainModal');
    this.DomItems.discard = document.querySelector('[data-role="modal-discard"]');
    this.DomItems.toggler = document.querySelector('[data-role="modal-toggler"]');
    this.DomItems.confirmDelete = document.querySelector('[data-role="modal-confirm-delete"]');
    this.DomItems.identifier = document.querySelector('#identifier');
    this.DomItems.identifierSpan = document.querySelector('.identifier-span');

    if (this.DomItems.toggler) {
      this.initModalHandling();
    }

  },

  initModalHandling() {

    // TOGGLER
    this.DomItems.toggler.addEventListener('click', () => {
      this.DomItems.modal.classList.add('is-active');
    });

    // DISCARD BUTTON (IN MODAL)
    this.DomItems.discard.addEventListener('click', () => {
      this.DomItems.modal.classList.remove('is-active');
    });

    // DELETE PATH
    if (location.pathname.includes('edit')) {
      this.DomItems.identifierSpan.textContent = this.DomItems.identifier.textContent;

      const deletePath = location.pathname.replace('edit', 'delete');
      this.DomItems.confirmDelete.setAttribute('href', deletePath);
    }
  },

}
