# Error Log — Oryn UI

Log các lỗi gặp phải trong quá trình phát triển, cách xử lý, và bài học rút ra.

---

## Format

```markdown
### [YYYY-MM-DD] Tiêu đề lỗi

**Context**: Đang làm gì khi gặp lỗi
**Error**: Mô tả lỗi / error message
**Cause**: Nguyên nhân gốc
**Solution**: Cách xử lý
**Prevention**: Cách tránh trong tương lai
```

---

### [2026-03-23] Blade `{{ }}` ternary causes PHP syntax error in date picker templates

**Context**: DatePicker, DatePickerRange, DateTimePicker blade templates using `{{ $value ? "'$value'" : 'null' }}` for JS value interpolation
**Error**: `syntax error, unexpected token "\"` — Blade compiled PHP breaks because `{{ }}` HTML-escapes quotes inside ternary expressions
**Cause**: Blade's `{{ }}` runs `htmlspecialchars()` which converts `'` to `&#039;`, breaking the PHP/JS syntax
**Solution**: Move ternary logic to `@php` block (e.g., `$jsValue = $value ? "'{$value}'" : 'null'`) and output with `{!! $jsValue !!}` for unescaped output
**Prevention**: NEVER use `{{ $var ? "'$var'" : 'null' }}` for JS interpolation. Always use `@php` + `{!! !!}` pattern for values containing quotes.

### [2026-03-23] TestView::toHtml() method does not exist

**Context**: OtpInputTest and SliderTest trying to call `$view->toHtml()` to get rendered HTML string
**Error**: `BadMethodCallException: Method toHtml does not exist`
**Cause**: Laravel's `TestView` class returned by `$this->blade()` does not have a `toHtml()` method
**Solution**: Use `(string) $view` to cast the TestView to HTML string
**Prevention**: Always use `(string) $view` for HTML access, never `$view->toHtml()`

### [2026-03-23] assertSee double-escapes HTML entities containing `&`

**Context**: DateTimePickerTest asserting `assertSee('Select date &amp; time')` 
**Error**: Assertion failed — `&amp;` was being double-escaped to `&amp;amp;` by assertSee
**Cause**: `assertSee()` by default HTML-escapes the expected string, so `&amp;` becomes `&amp;amp;`
**Solution**: Use `assertSee('Select date &amp; time', false)` — the second parameter `false` disables escaping, checking raw HTML
**Prevention**: When asserting content that already contains HTML entities, always pass `false` as second argument to `assertSee()`

### [2026-03-25] Component property named `$data` conflicts with Component::data() method

**Context**: Phase 5 — RegionMap component with `public array $data` property
**Error**: Data always renders as `[]` in blade template despite passing non-empty array. `assertSee('USA', false)` fails.
**Cause**: `Illuminate\View\Component::data()` is a public method (line 224). When `extractPublicMethods()` runs, it wraps `data()` in `InvokableComponentVariable` and overwrites the `$data` property in `array_merge($properties, $methods)`. The blade template receives the wrong value.
**Solution**: Renamed property from `$data` to `$mapData` in both `RegionMap.php` and `region-map.blade.php`. Attribute becomes `:map-data="..."` in kebab-case.
**Prevention**: NEVER name a component public property `$data` (or any name matching a public method in `Illuminate\View\Component`: `data`, `render`, `resolve`, `resolveView`, `shouldRender`, `withName`, `withAttributes`, `extractPublicProperties`, `extractPublicMethods`, `createInvokableVariable`).

### [2026-03-25] JSON in x-data HTML attributes breaks with {!! !!}

**Context**: Phase 5 — Chart, RegionMap, CalendarView, GanttChart blade templates using `{!! json_encode($data) !!}` inside `x-data="..."` attribute
**Error**: `{!! json_encode() !!}` outputs raw `"` characters which close the `x-data="..."` HTML attribute prematurely, breaking the entire element.
**Cause**: JSON contains literal `"` for object keys/string values. Inside an HTML attribute wrapped in `"`, these close the attribute.
**Solution**: Use `{{ json_encode() }}` (Blade auto-escaping) which encodes `"` to `&quot;`. The browser decodes HTML entities before Alpine.js evaluates the `x-data` expression.
**Prevention**: ALWAYS use `{{ json_encode() }}` (NOT `{!! !!}`) when outputting JSON inside HTML attributes like `x-data`, `x-init`, or any attribute wrapped in quotes.

### [2026-03-26] Anonymous component path uses `::` separator, NOT hyphen

**Context**: Phase 6 — Block components registered via `Blade::anonymousComponentPath($path, 'oryn-block-dashboard')`. Used `<x-oryn-block-dashboard-ecommerce />` in tests.
**Error**: All 73 block tests failed with "Unable to locate a class or view for component [oryn-block-dashboard-ecommerce]"
**Cause**: Laravel's `anonymousComponentPath()` registers a prefix that requires `::` separator. `<x-prefix::component>` resolves to the registered path + component name. Hyphen syntax (`<x-prefix-component>`) makes Laravel look for a single class-based or view-based component named with all hyphens.
**Solution**: Changed all component references from `<x-oryn-block-dashboard-ecommerce />` to `<x-oryn-block-dashboard::ecommerce />` across all 60+ blade files and 7 test files via `sed`.
**Prevention**: When using `Blade::anonymousComponentPath($path, 'prefix')`, ALWAYS use `::` separator in component tags: `<x-prefix::component-name />`.

### [2026-03-26] Auth form blocks fail in tests — `$errors` undefined

**Context**: Phase 6 — Auth form blocks (sign-in-form, sign-up-form, etc.) use `$errors->has('email')` and `$errors->first('email')` for validation display.
**Error**: `Call to a member function has() on null` — `$errors` variable is null in test context.
**Cause**: Laravel automatically shares a `ViewErrorBag` as `$errors` in web middleware. In test context using `$this->blade()`, no middleware runs, so `$errors` is not shared.
**Solution**: Added `beforeEach(function() { $this->app['view']->share('errors', new \Illuminate\Support\ViewErrorBag()); })` in `AuthBlocksTest.php`.
**Prevention**: Any component using `$errors` (Laravel validation error bag) needs the ViewErrorBag shared in test setup.

<!-- 
### [YYYY-MM-DD] Tiêu đề lỗi

**Context**: Đang làm gì khi gặp lỗi
**Error**: Mô tả lỗi / error message
**Cause**: Nguyên nhân gốc
**Solution**: Cách xử lý
**Prevention**: Cách tránh trong tương lai
-->
