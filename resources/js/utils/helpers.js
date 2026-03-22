/**
 * Oryn UI — Utility Helpers
 */

/**
 * Generate a unique ID string.
 * @param {string} prefix
 * @returns {string}
 */
export function uniqueId(prefix = 'oryn') {
    return `${prefix}-${Math.random().toString(36).substring(2, 9)}`;
}

/**
 * Debounce a function.
 * @param {Function} fn
 * @param {number} delay
 * @returns {Function}
 */
export function debounce(fn, delay = 300) {
    let timer;
    return function (...args) {
        clearTimeout(timer);
        timer = setTimeout(() => fn.apply(this, args), delay);
    };
}

/**
 * Clamp a number between min and max.
 * @param {number} value
 * @param {number} min
 * @param {number} max
 * @returns {number}
 */
export function clamp(value, min, max) {
    return Math.min(Math.max(value, min), max);
}

/**
 * Get computed CSS variable value from :root.
 * @param {string} name - CSS variable name (e.g. '--primary')
 * @returns {string}
 */
export function getCssVar(name) {
    return getComputedStyle(document.documentElement).getPropertyValue(name).trim();
}
