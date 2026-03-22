@props([
    'props' => [],
    'title' => 'Props',
])
{{--
    Props reference table.
    Each prop: ['name', 'type', 'default', 'description']
--}}
@if(!empty($props))
<div class="mb-8">
    <h3 class="text-base font-semibold mb-3 text-gray-900 dark:text-gray-100">{{ $title }}</h3>
    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
        <table class="w-full oryn-docs-table">
            <thead class="bg-gray-50 dark:bg-gray-900/50">
                <tr>
                    <th>Prop</th>
                    <th>Type</th>
                    <th>Default</th>
                    <th>Description</th>
                </tr>
            </thead>
            <tbody>
                @foreach($props as $prop)
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-900/30 transition-colors">
                    <td><code>{{ $prop['name'] }}</code></td>
                    <td><code class="text-info">{{ $prop['type'] }}</code></td>
                    <td>
                        @if(!empty($prop['default']))
                            <code class="text-warning">{{ $prop['default'] }}</code>
                        @else
                            <span class="text-gray-400">—</span>
                        @endif
                    </td>
                    <td class="text-gray-600 dark:text-gray-400">{{ $prop['description'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
