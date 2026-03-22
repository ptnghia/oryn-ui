@props([])

{{-- Project Dashboard Layout --}}
<div {{ $attributes->merge(['class' => 'flex flex-col gap-4']) }}>
    {{-- Top section: project overview + upcoming schedule --}}
    <div class="flex flex-col xl:flex-row gap-4">
        <div class="flex flex-col gap-4 flex-1 xl:max-w-[calc(100%-350px)]">
            @isset($projectOverview)
                {{ $projectOverview }}
            @endisset

            @isset($schedule)
                {{ $schedule }}
            @endisset
        </div>
        <div>
            @isset($upcomingSchedule)
                {{ $upcomingSchedule }}
            @endisset
        </div>
    </div>

    {{-- Bottom section: 3-col grid --}}
    <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
        <div class="md:col-span-1 xl:col-span-1 order-1">
            @isset($currentTasks)
                {{ $currentTasks }}
            @endisset
        </div>
        <div class="md:col-span-1 xl:col-span-1 order-2 xl:order-3">
            @isset($recentActivity)
                {{ $recentActivity }}
            @endisset
        </div>
        <div class="md:col-span-2 xl:col-span-1 order-3 xl:order-2">
            @isset($taskOverview)
                {{ $taskOverview }}
            @endisset
        </div>
    </div>

    {{ $slot }}
</div>
