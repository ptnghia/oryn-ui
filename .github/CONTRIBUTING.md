# Contributing to Oryn UI

## Development Setup

### Requirements
- PHP >= 8.2
- Composer
- Node.js >= 18
- npm or pnpm

### Installation

```bash
# Clone the repository
git clone https://github.com/oryn/ui.git
cd oryn-ui

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Build assets
npm run build

# Run tests
composer test
```

### Development Workflow

1. Create a feature branch: `git checkout -b feature/component-name`
2. Implement the component following the conversion skill guide
3. Write tests
4. Run `composer test` to ensure all tests pass
5. Submit a pull request

## Component Development

### Creating a New Component

1. **Read the React source** from `Ecme - NextJs Tailwind Admin Template/demo/src/components/`
2. **Create the Blade view** in `resources/views/components/ui/`
3. **Create the PHP class** in `src/Components/UI/` (if needed)
4. **Migrate the CSS** to `resources/css/components/`
5. **Create Alpine.js plugin** in `resources/js/plugins/` (if needed)
6. **Write tests** in `tests/`
7. **Write documentation** in `docs/`

### Testing

```bash
# Run all tests
composer test

# Run specific test
./vendor/bin/pest tests/Feature/Components/UI/AlertTest.php

# Run with coverage
composer test -- --coverage
```

### Coding Standards

- Follow PSR-12 for PHP
- Follow the conventions in `.github/copilot-instructions.md`
- All components must support dark mode and RTL

## Pull Request Guidelines

- One component per PR (unless they're tightly coupled sub-components)
- Include before/after screenshots comparing React and Blade output
- All tests must pass
- Update CHANGELOG.md
