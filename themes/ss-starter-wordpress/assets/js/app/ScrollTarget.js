import { GLOBAL_CONSTANTS } from "assets/js/utils/constants";

class ScrollTarget {
  /**
   * @desc Set up listener to activate components as they scroll into viewport.
   * @param {HTMLElement} el - Element that contains possible sub-navigations
   *
   */
  constructor(element) {
    this.element = element;
    this.elDataset = this.element.dataset;
    this.emitter = GLOBAL_CONSTANTS.UTILS.EMITTER;
    this.observer = this.registerObserver();
    this.observer.observe(this.element);
    this.emittedOnce = false;
  }

  /**
   * @desc Creates an observer in which we can register our elements against
   * @param {HTMLElement} el - Image element
   */
  registerObserver() {
    const options = {
      root: null,
      rootMargin: this.elDataset.rootMargin ? this.elDataset.rootMargin : "0px", // this controls when the event is emitted - it should be custom set on each element individually depending at which point you want the intersection to trigger
      threshold: this.elDataset.threshold ? this.elDataset.threshold : 0.0, // this controls how much of the element should be visible before the event is emitted - it should be custom set on each element individually
    };

    return new IntersectionObserver(this.elementInView.bind(this), options);
  }

  /**
   * @desc Callback for intersectionObserver that says the image is in the viewport
   * and is ready to be displayed.
   * @param {HTMLElement} entries - List of image entries from the observer
   */
  elementInView(elements) {
    elements.forEach((elem) => {
      if (elem.isIntersecting) {
        this.activateElement(elem.target);
        if (!this.emittedOnce) {
          this.emitter.emit(GLOBAL_CONSTANTS.EVENTS.ELEMENT_IN_VIEWPORT, elem);

          if (this.elDataset.emitonce) {
            this.emittedOnce = true; // this controls whether an event is emitted more than one time - it should be custom set on each element individually
          }
        }
      } else {
        this.deactivateElement(elem.target);
      }
    });

    this.emitter.on(GLOBAL_CONSTANTS.EVENTS.RESIZE, (elem) => {
      this.emittedOnce = false;
    });
  }

  /**
   * @desc If the element is in the viewport, add active class
   * @param {HTMLElement} element - The element that is in the viewport
   */
  activateElement(elem) {
    elem.classList.add(GLOBAL_CONSTANTS.CLASSES.ACTIVE);
  }

  /**
   * @desc If the element is out of the viewport, remove active class
   * @param {HTMLElement} element - The element that is out of the viewport
   */
  deactivateElement(elem) {
    elem.classList.remove(GLOBAL_CONSTANTS.CLASSES.ACTIVE);
  }
}

/**
 * @desc Test component definition used in module-loader
 */

export default {
  selector: ".js-scroll-target, .js-transition",
  Source: ScrollTarget,
};
