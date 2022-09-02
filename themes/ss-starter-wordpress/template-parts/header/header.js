import { GLOBAL_CONSTANTS } from "assets/js/utils/constants.js";

const SELECTORS = {
  header: ".js-site-header",
  navBtn: ".js-header-btn",
};

class Header {
  constructor(element) {
    this.element = element;
    this.navBtn = this.element.querySelector(SELECTORS.navBtn);

    this.init();
  }

  init() {
    this.registerEvents();
  }

  registerEvents() {
    this.navBtn.addEventListener("click", (e) => this.toggleMenu(e));
  }

  toggleMenu() {
    this.element.classList.toggle(GLOBAL_CONSTANTS.CLASSES.ACTIVE);
  }
}

/**
 * Add module objects alphabetically as needed
 * {
 *  selector: CSS selector for the target element(s)
 *  Source: Imported js class with a constructor. Constructor will be passed
 *      the target DOM element.
 * }
 */
export default {
  selector: SELECTORS.header,
  Source: Header,
};
