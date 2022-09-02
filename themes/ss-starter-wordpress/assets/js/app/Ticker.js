import { GLOBAL_CONSTANTS } from "assets/js/utils/constants";

const CLASSES = {
  COMPONENT: "js-ticker",
  ITEM: "ticker-item",
};

const SELECTORS = {
  COMPONENT: `.${CLASSES.COMPONENT}`,
  ITEM: `.${CLASSES.ITEM}`,
};

const STATE = {
  WAITING: "0",
  ACTIVE: "1",
  ENTERING: "2",
};

class Ticker {
  waiting = [];
  resizeTimeout = null;
  autoStartNext = false;

  constructor(element) {
    this.element = element;
    this.observer = this.registerObserver();
    this.targets = this.registerObserverTargets();
    this.observer.observe(this.element);
    this.assignAnimationDuration();
    this.initEventListeners();

    this.next();
  }

  initEventListeners() {
    window.addEventListener(GLOBAL_CONSTANTS.EVENTS.RESIZE, () =>
      this.handleResize()
    );
  }

  handleResize() {
    if (this.resizeTimeout) {
      clearTimeout(this.resizeTimeout);
    }

    this.resizeTimeout = setTimeout(() => {
      this.assignAnimationDuration();
    }, 250);
  }

  assignAnimationDuration() {
    const width = this.element.clientWidth;
    const pixelsPerSecond = 50;

    const durationMs = (width / pixelsPerSecond) * 1000;

    this.targets.forEach((target) => {
      target.style.animationDuration = `${durationMs}ms`;
    });
  }

  registerObserver() {
    const options = {
      root: this.element,
      rootMargin: "4000px 0px 4000px 0px",
      threshold: 1,
    };

    return new IntersectionObserver(this.elementInView.bind(this), options);
  }

  registerObserverTargets() {
    const targets = this.element.querySelectorAll(SELECTORS.ITEM);

    targets.forEach((target) => {
      this.observer.observe(target);
      this.waiting.push(target);
    });

    return targets;
  }

  elementInView(entries) {
    entries.forEach((entry) => {
      const target = entry.target;
      const isItem = target.classList.contains(CLASSES.ITEM);
      const scrollState = target.dataset.scrollState;

      if (!isItem) {
        return;
      }

      if (scrollState === STATE.ENTERING && !entry.isIntersecting) {
        // no op, element has partially entered
      } else if (scrollState === STATE.ENTERING && entry.isIntersecting) {
        target.dataset.scrollState = STATE.ACTIVE;
        this.next();
      } else if (scrollState === STATE.ACTIVE && !entry.isIntersecting) {
        this.deactivateElement(target);
      }
    });
  }

  next() {
    const hasWaitingTargets = this.waiting.length;

    if (hasWaitingTargets) {
      this.activateElement(this.waiting.shift());
    } else {
      this.autoStartNext = true;
    }
  }

  activateElement(element) {
    element.classList.add(GLOBAL_CONSTANTS.CLASSES.ACTIVE);
    element.dataset.scrollState = STATE.ENTERING;
  }

  deactivateElement(element) {
    element.classList.remove(GLOBAL_CONSTANTS.CLASSES.ACTIVE);
    element.dataset.scrollState = STATE.WAITING;
    this.waiting.push(element);

    if (this.autoStartNext) {
      this.next();
      this.autoStartNext = false;
    }
  }
}

export default {
  selector: SELECTORS.COMPONENT,
  Source: Ticker,
};
