---
description: "Convert React components to Blade + Alpine.js components. USE FOR: creating new Blade components, migrating React JSX to Blade templates, converting React state/hooks to Alpine.js patterns. DO NOT USE FOR: CSS-only changes, documentation writing, testing."
---

# Blade Component Conversion Prompt

When creating or modifying Blade components, follow these rules:

## React → Blade Conversion

1. Read the source React component in `Ecme - NextJs Tailwind Admin Template/demo/src/components/`
2. Read the corresponding CSS in `Ecme - NextJs Tailwind Admin Template/demo/src/assets/styles/components/`
3. Convert following the skill guide at `.github/skills/blade-component/SKILL.md`

## Key Rules

- Use `@props` for component properties
- Use `{{ $slot }}` for children content
- Use `<x-slot:name>` for named slots
- Use `$attributes->merge()` for class and attribute forwarding
- Use Alpine.js `x-data` for component state (never inline JavaScript)
- Use `x-transition` for animations
- Use `x-cloak` with `x-show` to prevent FOUC
- All colors must use CSS variables
- Maintain dark mode support with `.dark` class
- Preserve all `aria-*` accessibility attributes
- Preserve RTL support with `ltr:` and `rtl:` Tailwind variants
