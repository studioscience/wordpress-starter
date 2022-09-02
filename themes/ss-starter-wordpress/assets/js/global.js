import ScrollTrigger from "gsap/ScrollTrigger";
import gsap from "gsap";

// General
import Events from "assets/js/app/events";
import IsMobileBreakpoint from "assets/js/app/IsMobileBreakpoint";
import LazyLoad from "assets/js/app/LazyLoad";
import LowPowerMode from "assets/js/app/LowPowerMode";
import ScrollTarget from "assets/js/app/ScrollTarget";
import Ticker from "assets/js/app/Ticker";

// Template Parts
import Header from "template-parts/header/header";

gsap.registerPlugin(ScrollTrigger);

/**
 * Add module objects alphabetically as needed
 * {
 *  selector: CSS selector
 *  Source: imported module
 * }
 */
const Modules = [Events, Header, ScrollTarget, Ticker];

document.addEventListener("DOMContentLoaded", () => {
  setupImports();
  initLazyLoad();
  initLowPowerMode();
  initIsMobileBreakpoint();

  ScrollTrigger.sort();
  ScrollTrigger.refresh();
});

function setupImports() {
  Modules.forEach((module) => {
    Array.from(document.querySelectorAll(module.selector)).forEach(
      (element) => {
        new module.Source(element);
      }
    );
  });
}

/**
 * @desc Initilizes Lazyloading. Parses page for data references
 * and triggers fade in.
 */
function initLazyLoad() {
  new LazyLoad();
}

/**
 * @desc Initilizes LowPowerMode. Sets initial iphone low power mode setting
 * and listens for changes, broadcasting them as an event.
 */
function initLowPowerMode() {
  new LowPowerMode();
}

/**
 * @desc Emits event on mobile breakpoint.
 */
function initIsMobileBreakpoint() {
  new IsMobileBreakpoint();
}
