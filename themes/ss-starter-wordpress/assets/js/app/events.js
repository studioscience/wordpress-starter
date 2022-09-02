import { GLOBAL_CONSTANTS } from "assets/js/utils/constants.js";

class Events {
  constructor(element) {
    this.element = element;
    this.emitter = GLOBAL_CONSTANTS.UTILS.EMITTER;

    this.init();
  }

  init() {
    /** Fire load event to emitter on page load */
    window.addEventListener(GLOBAL_CONSTANTS.EVENTS.LOAD, (e) => {
      this.emitter.emit(GLOBAL_CONSTANTS.EVENTS.LOAD, e);
    });

    /** Fire resize event to emitter when window resizes */
    window.addEventListener(GLOBAL_CONSTANTS.EVENTS.RESIZE, (e) => {
      this.emitter.emit(GLOBAL_CONSTANTS.EVENTS.RESIZE, e);
    });

    /** Fire scroll event to emitter when window scroll */
    window.addEventListener(GLOBAL_CONSTANTS.EVENTS.SCROLL, (e) => {
      this.emitter.emit(GLOBAL_CONSTANTS.EVENTS.SCROLL, e);
    });

    /** Fire keydown event to emitter on window keydown */
    window.addEventListener(GLOBAL_CONSTANTS.EVENTS.KEYDOWN, (e) => {
      this.emitter.emit(GLOBAL_CONSTANTS.EVENTS.KEYDOWN, e);
    });
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
  selector: "body",
  Source: Events,
};
