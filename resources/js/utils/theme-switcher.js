/**
 * Oryn UI — Theme / Dark Mode Switcher
 *
 * Manages dark mode via .dark class on <html>.
 * Persists preference in localStorage.
 */

const STORAGE_KEY = 'oryn-ui-mode';

/**
 * Initialize theme mode from localStorage or system preference.
 */
export function initThemeMode() {
    const stored = localStorage.getItem(STORAGE_KEY);

    if (stored === 'dark' || (!stored && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
}

/**
 * Toggle between light and dark mode.
 * @returns {'light'|'dark'} The new mode.
 */
export function toggleMode() {
    const isDark = document.documentElement.classList.toggle('dark');
    const mode = isDark ? 'dark' : 'light';
    localStorage.setItem(STORAGE_KEY, mode);
    return mode;
}

/**
 * Set a specific mode.
 * @param {'light'|'dark'} mode
 */
export function setMode(mode) {
    if (mode === 'dark') {
        document.documentElement.classList.add('dark');
    } else {
        document.documentElement.classList.remove('dark');
    }
    localStorage.setItem(STORAGE_KEY, mode);
}

/**
 * Get the current mode.
 * @returns {'light'|'dark'}
 */
export function getMode() {
    return document.documentElement.classList.contains('dark') ? 'dark' : 'light';
}

/**
 * Apply a theme preset by setting CSS variables on :root.
 * @param {Object} variables - { primary, primaryDeep, primaryMild, primarySubtle, neutral }
 */
export function applyThemePreset(variables) {
    const root = document.documentElement;
    if (variables.primary) root.style.setProperty('--primary', variables.primary);
    if (variables.primaryDeep) root.style.setProperty('--primary-deep', variables.primaryDeep);
    if (variables.primaryMild) root.style.setProperty('--primary-mild', variables.primaryMild);
    if (variables.primarySubtle) root.style.setProperty('--primary-subtle', variables.primarySubtle);
    if (variables.neutral) root.style.setProperty('--neutral', variables.neutral);
}
