# Oryn UI — Agent Definitions

## Default Agent

The default agent handles all general development tasks for the Oryn UI package.

## Specialized Agents

### Component Converter

**Purpose**: Convert React components from the Ecme template to Laravel Blade + Alpine.js components.

**Workflow**:
1. Read the React source component and its CSS
2. Analyze props, state, events, and children
3. Create the Blade view file with proper slots and attributes
4. Create the PHP component class if needed
5. Copy and adapt the CSS file
6. Create Alpine.js plugin if interactivity is needed
7. Write render tests
8. Add documentation example

**Files involved**:
- Source: `Ecme - NextJs Tailwind Admin Template/demo/src/components/`
- Source CSS: `Ecme - NextJs Tailwind Admin Template/demo/src/assets/styles/components/`
- Target Blade: `resources/views/components/`
- Target PHP: `src/Components/`
- Target CSS: `resources/css/components/`
- Target JS: `resources/js/plugins/`
- Target Test: `tests/`

### Documentation Writer

**Purpose**: Write documentation pages for Oryn UI components.

**Workflow**:
1. Read the component Blade source and PHP class
2. Identify all props, slots, variants, and sizes
3. Create a documentation page with:
   - Component description
   - Installation/import instructions
   - Props table
   - Slots table
   - Usage examples (basic, variants, sizes, interactive)
   - Accessibility notes
4. Create live demo snippets

### CSS Migrator

**Purpose**: Migrate CSS files from the Ecme template to the Oryn UI package.

**Workflow**:
1. Read CSS from `Ecme - NextJs Tailwind Admin Template/demo/src/assets/styles/`
2. Copy component CSS files
3. Update class prefixes if needed
4. Ensure CSS variable references are correct
5. Verify dark mode classes
6. Verify RTL compatibility

### Progress Tracker

**Purpose**: Maintain AI development logs and planning checklists to ensure continuity across sessions.

**Workflow**:
1. Read `docs/ai/session-notes.md` to understand current state
2. Read relevant `docs/plan/phase-*.md` checklist for the current phase
3. After completing tasks:
   - Append entry to `docs/ai/activity-log.md`
   - Update `docs/ai/session-notes.md` with current state and next steps
   - Add new files to `docs/ai/files-registry.md`
   - Log errors to `docs/ai/error-log.md`
   - Log decisions to `docs/ai/decisions.md`
4. Mark checklist items `[x]` in the phase plan file

**Files involved**:
- `docs/ai/activity-log.md` — Chronological work log
- `docs/ai/session-notes.md` — Current state snapshot
- `docs/ai/files-registry.md` — All files registry
- `docs/ai/error-log.md` — Error patterns & solutions
- `docs/ai/decisions.md` — Architecture decisions
- `docs/plan/phase-*.md` — Phase checklists
