import { GLOBAL_CONSTANTS } from "../utils/constants.js";

export function isMobile() {
  return window.innerWidth < GLOBAL_CONSTANTS.BREAKPOINTS.mobile;
}

export default class IsMobileBreakpoint {
  constructor() {
    this.emitter = GLOBAL_CONSTANTS.UTILS.EMITTER;

    this.init();
  }

  init() {
    this.handleCondition();
    this.registerEvents();
  }

  registerEvents() {
    this.emitter.on(
      GLOBAL_CONSTANTS.EVENTS.RESIZE,
      this.handleCondition.bind(this)
    );
  }

  handleCondition() {
    if (isMobile()) {
      this.emitter.emit(GLOBAL_CONSTANTS.EVENTS.IS_MOBILE, true);
    } else {
      this.emitter.emit(GLOBAL_CONSTANTS.EVENTS.IS_MOBILE, false);
    }
  }
}
