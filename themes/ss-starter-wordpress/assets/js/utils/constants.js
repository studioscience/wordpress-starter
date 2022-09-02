import Emitter from "./emitter";

export const GLOBAL_CONSTANTS = {
  UTILS: {
    EMITTER: Emitter,
  },
  BREAKPOINTS: {
    mobile: 375,
  },
  CLASSES: {
    ACTIVE: "-active",
    LOADED: "is-loaded",
    HIDE: "-hide",
    SHOW: "-show",
    PLAYING: "-playing",
    DRAGGING: "-dragging",
    LAST: "-last",
  },
  EVENTS: {
    CLICK: "click",
    ENDED: "ended",
    KEYDOWN: "keydown",
    LOAD: "load",
    LAZY_LOADED: "lazyloaded",
    MOUSEENTER: "mouseenter",
    MOUSELEAVE: "mouseleave",
    FOCUSIN: "focusin",
    FOCUSOUT: "focusout",
    REDUCED_MOTION_CHANGE: "reduced-motion-change",
    INCREASE_CONTRAST_CHANGE: "increase-contrast-change",
    LOW_POWER_MODE: "low-power-mode",
    RESIZE: "resize",
    SCROLL: "scroll",
    ELEMENT_IN_VIEWPORT: "element-in-viewport",
  },
  TIMING: {
    STD_ANIM_TIME_MS: 100,
  },
};
