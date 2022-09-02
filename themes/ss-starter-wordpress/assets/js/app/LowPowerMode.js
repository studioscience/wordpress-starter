import { GLOBAL_CONSTANTS } from "assets/js/utils/constants.js";
import Emitter from "assets/js/utils/emitter.js";

const SELECTORS = {
  VIDEO: ".js-low-power-mode__video",
};

export default class LowPowerMode {
  constructor() {
    this.video = document.querySelector(SELECTORS.VIDEO);

    const params = new URLSearchParams(window.location.search);
    if (params.has("LOW_POWER")) {
      document.body.classList.add("low-power-mode");
      this.isLowPowerMode = true;
      Emitter.emit(GLOBAL_CONSTANTS.EVENTS.LOW_POWER_MODE, this.isLowPowerMode);
      return;
    }

    if (this.video) this.updateLowPowerOption();
  }

  updateLowPowerOption() {
    this.video
      .play()
      .then(() => {
        this.isLowPowerMode = false;
        document.body.classList.remove("low-power-mode");
      })
      .catch(() => {
        this.isLowPowerMode = true;
        document.body.classList.add("low-power-mode");
        Emitter.emit(
          GLOBAL_CONSTANTS.EVENTS.LOW_POWER_MODE,
          this.isLowPowerMode
        );
      });
  }
}
