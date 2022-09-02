/**
 * @jest-environment jsdom
 */

import { isMobile } from "./IsMobileBreakpoint";
import { GLOBAL_CONSTANTS } from "../utils/constants";

describe("isMobile utility function", () => {
  it("returns true when window size is below threshold", () => {
    window.innerWidth = GLOBAL_CONSTANTS.BREAKPOINTS.mobile - 1;
    expect(isMobile()).toBe(true);
  });

  it("returns false when window size is above threshold", () => {
    window.innerWidth = GLOBAL_CONSTANTS.BREAKPOINTS.mobile + 1;
    expect(isMobile()).toBe(false);
  });

  it("returns false when window size is equal to threshold", () => {
    window.innerWidth = GLOBAL_CONSTANTS.BREAKPOINTS.mobile;
    expect(isMobile()).toBe(false);
  });
});
