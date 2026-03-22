# CSS Migration Skill

## Purpose
Migrate CSS files from the Ecme NextJS template to the Oryn UI package, maintaining visual fidelity.

## Source → Target Mapping

| Source | Target |
|--------|--------|
| `demo/src/assets/styles/tailwind/index.css` | `resources/css/base/variables.css` + `typography.css` |
| `demo/src/assets/styles/components/*.css` | `resources/css/components/*.css` |
| `demo/src/assets/styles/template/*.css` | `resources/css/template/*.css` |
| `demo/src/assets/styles/vendors/*.css` | `resources/css/vendors/*.css` |

## Steps

### 1. Copy Base CSS Variables
From the Ecme `tailwind/index.css`, extract:
- `:root` CSS variables block → `resources/css/base/variables.css`
- `@layer base` typography rules → `resources/css/base/typography.css`

### 2. Copy Component CSS Files
For each CSS file in `demo/src/assets/styles/components/`:
1. Copy to `resources/css/components/{name}.css`
2. Ensure wrapped in `@layer components { ... }`
3. Verify all color values use CSS variables (no hardcoded colors)
4. Check for `.dark` class selectors

### 3. Create Main Entry Point
```css
/* resources/css/oryn-ui.css */
@import 'tailwindcss';
@import './base/variables.css';
@import './base/typography.css';

/* Components */
@import './components/alert.css';
@import './components/avatar.css';
/* ... all 34 component CSS files ... */

/* Template */
@import './template/header.css';
@import './template/side-nav.css';
/* ... template CSS files ... */

/* Vendors */
@import './vendors/apexcharts.css';
/* ... vendor CSS files ... */
```

### 4. Verify Theme Compatibility
Ensure all 5 theme presets work by checking color variable usage:
- Default (blue): `--primary: #2a85ff`
- Dark: `--primary: #18181b`
- Green: `--primary: #0CAF60`
- Purple: `--primary: #8C62FF`
- Orange: `--primary: #fb732c`

### 5. Checklist
- [ ] All CSS variables defined in `:root`
- [ ] Dark mode variant defined in `.dark`
- [ ] All component CSS files migrated
- [ ] No hardcoded color values
- [ ] No `!important` usage
- [ ] `@layer` directives used properly
- [ ] RTL variants (`ltr:`, `rtl:`) preserved
- [ ] Responsive breakpoints maintained
