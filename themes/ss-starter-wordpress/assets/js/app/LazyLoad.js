import { GLOBAL_CONSTANTS } from "assets/js/utils/constants.js";
import Emitter from "assets/js/utils/emitter.js";

const CLASSES = {
  COMPONENT: ".js-lazy-load",
};

export default class LazyLoad {
  /**
   * @desc Set up lazy loading and bind events.
   * @param {HTMLElement} el - Element that contains possible sub-navigations
   *
   */
  constructor(element) {
    this.element = element;
    this.images = Array.from(document.body.querySelectorAll(CLASSES.COMPONENT));
    this.srcSets = Array.from(document.body.querySelectorAll("[data-srcset]"));
    this.observer = this.registerObserver();
    this.loadImages();
  }

  /**
   * @desc Creates an observer in which we can register our elements against
   * @param {HTMLElement} el - Image element
   */
  registerObserver() {
    const options = {
      root: null,
      rootMargin: "100px",
      threshold: 0.0,
    };

    return new IntersectionObserver(this.imageInView.bind(this), options);
  }

  /**
   * @desc Callback for intersectionObserver that says the image is in the viewport
   * and is ready to be displayed.
   * @param {HTMLElement} entries - List of image entries from the observer
   */
  imageInView(entries) {
    entries.forEach((entry) => {
      if (
        entry.intersectionRatio > 0 &&
        entry.target.dataset.loaded === undefined
      ) {
        this.loadImage(entry.target);
      }
    });
  }

  /**
   * @desc Loops over all images with the lazy load class and
   * bg lazy load class and runs function to check if it's in viewport
   */
  loadImages() {
    const imageList = [...this.images, ...this.srcSets];
    imageList.forEach((image) => {
      this.observer.observe(image);
    });
  }

  /**
   * @desc If the image is in the viewport, set it's source appropriately
   * @param {HTMLElement} img - The image that is in the viewport
   */
  loadImage(img) {
    if (img.hasAttribute("data-src")) {
      const src = img.getAttribute("data-src");

      img.onload = this.imageLoaded(img);
      img.removeAttribute("data-src");
      img.src = src;
      Emitter.emit(GLOBAL_CONSTANTS.EVENTS.LAZY_LOADED, img);
    } else if (img.hasAttribute("data-bg")) {
      const src = img.getAttribute("data-bg");

      img.onload = this.imageLoaded(img);
      img.style.backgroundImage = `url(${src})`;
      img.removeAttribute("data-bg");
      Emitter.emit(GLOBAL_CONSTANTS.EVENTS.LAZY_LOADED, img);
    } else if (img.hasAttribute("data-srcset")) {
      const src = img.getAttribute("data-srcset");

      img.srcset = src;
      img.removeAttribute("data-srcset");
      Emitter.emit(GLOBAL_CONSTANTS.EVENTS.LAZY_LOADED, img);
    }
    img.dataset.loaded = true;
  }

  /**
   * @desc Display the image by adding a class that toggles opacity
   * The timeout is required here for the animation to work correctly.
   * @param {HTMLElement} img - The image that is in the viewport
   */
  imageLoaded(img) {
    this.observer.unobserve(img);
    setTimeout(() => {
      img.classList.add(GLOBAL_CONSTANTS.CLASSES.LOADED);
    }, GLOBAL_CONSTANTS.TIMING.STD_ANIM_TIME_MS);
  }
}
