import { GLOBAL_CONSTANTS } from "assets/js/utils/constants.js";

class Example {
  constructor(element) {
    this.element = element;
    this.emitter = GLOBAL_CONSTANTS.UTILS.EMITTER;

    this.init();
  }

  init() {
    this.emitter.on(
      GLOBAL_CONSTANTS.EVENTS.RESIZE,
      this.eventMethod.bind(this)
    );
    this.emitter.on(GLOBAL_CONSTANTS.EVENTS.LOAD, this.loadMethod.bind(this));
    this.emitter.on(
      GLOBAL_CONSTANTS.EVENTS.SCROLL,
      this.scrollMethod.bind(this)
    );
    this.emitter.on(
      GLOBAL_CONSTANTS.EVENTS.REDUCED_MOTION_CHANGE,
      this.motionMethod.bind(this)
    );
  }

  eventMethod() {
    console.log("the window was resized");
  }

  loadMethod() {
    console.log("the window was loaded");
  }

  scrollMethod() {
    console.log("the window was scrolled");
  }

  motionMethod(reducedMotion) {
    console.log(`reducedMotion = ${reducedMotion}`);
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
  Source: Example,
};
