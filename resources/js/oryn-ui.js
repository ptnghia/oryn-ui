import Alpine from 'alpinejs';

/*
|--------------------------------------------------------------------------
| Oryn UI — Alpine.js Plugin Registry
|--------------------------------------------------------------------------
|
| Register all Alpine.js data components (plugins) for Oryn UI here.
| Each plugin is imported from resources/js/plugins/ and registered
| via Alpine.data().
|
| Usage in consuming app:
|   import Alpine from 'alpinejs'
|   import { registerOrynPlugins } from 'oryn-ui'
|   registerOrynPlugins(Alpine)
|   Alpine.start()
|
*/

/**
 * Register all Oryn UI Alpine.js plugins.
 *
 * @param {import('alpinejs').Alpine} alpine
 */
export function registerOrynPlugins(alpine) {
    // Phase 2 — Interactive components
    // alpine.data('orynDialog', orynPluginDialog)
    // alpine.data('orynDrawer', orynPluginDrawer)
    // alpine.data('orynDropdown', orynPluginDropdown)
    // alpine.data('orynToast', orynPluginToast)
    // alpine.data('orynTabs', orynPluginTabs)

    // Phase 3 — Complex plugins
    // alpine.data('orynSelect', orynPluginSelect)
    // alpine.data('orynDatePicker', orynPluginDatePicker)
    // alpine.data('orynTable', orynPluginTable)
}

// Auto-register if Alpine is available globally
if (typeof window !== 'undefined' && window.Alpine) {
    registerOrynPlugins(window.Alpine);
}

export default { registerOrynPlugins };
