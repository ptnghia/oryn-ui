/**
 * Oryn UI — Sidebar Toggle Utility
 *
 * Manages sidebar collapse state. Persists in localStorage.
 */

const STORAGE_KEY = 'oryn-ui-side-nav-collapsed';

/**
 * Get initial collapsed state from localStorage.
 * @returns {boolean}
 */
export function getSideNavCollapsed() {
    return localStorage.getItem(STORAGE_KEY) === 'true';
}

/**
 * Set collapsed state and persist.
 * @param {boolean} collapsed
 */
export function setSideNavCollapsed(collapsed) {
    localStorage.setItem(STORAGE_KEY, String(collapsed));
}

/**
 * Toggle collapsed state.
 * @returns {boolean} New collapsed state.
 */
export function toggleSideNav() {
    const newState = !getSideNavCollapsed();
    setSideNavCollapsed(newState);
    return newState;
}
