export default {

  DomItems: {
    sourceParag: null,
    resumeCopyBtn: null,
  },

  init() {
    this.DomItems.sourceParag = document.querySelector('#sourceParag');
    this.DomItems.resumeCopyBtn = document.querySelector('#resumeCopyBtn');

    this.DomItems.resumeCopyBtn.addEventListener('click', () => {
      const sourceText = this.DomItems.sourceParag.textContent;
      this.copyToClipboard(sourceText);
    })

  },

  copyToClipboard(str) {
    if (navigator && navigator.clipboard && navigator.clipboard.writeText)
      return navigator.clipboard.writeText(str);
    return Promise.reject('The Clipboard API is not available.');
  }

}
