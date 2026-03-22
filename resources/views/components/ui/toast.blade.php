@props([
    'placement' => 'top-end',
    'offsetX' => 30,
    'offsetY' => 30,
])

<div
    x-data="{
        toasts: [],
        add(event) {
            const toast = {
                id: Date.now(),
                type: event.detail?.type || 'info',
                title: event.detail?.title || '',
                message: event.detail?.message || '',
                duration: event.detail?.duration ?? 3000,
            };
            this.toasts.push(toast);
            if (toast.duration > 0) {
                setTimeout(() => this.remove(toast.id), toast.duration);
            }
        },
        remove(id) {
            this.toasts = this.toasts.filter(t => t.id !== id);
        }
    }"
    x-on:oryn-toast.window="add($event)"
    class="toast"
    style="{{ $placementStyle() }}"
>
    <template x-for="toast in toasts" :key="toast.id">
        <div
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-2"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-2"
            class="mb-2"
        >
            <x-oryn-notification x-bind:type="toast.type">
                <div>
                    <template x-if="toast.title">
                        <div class="notification-title font-semibold" x-text="toast.title"></div>
                    </template>
                    <span x-text="toast.message"></span>
                </div>
                <x-oryn-close-button @click="remove(toast.id)" />
            </x-oryn-notification>
        </div>
    </template>
</div>
