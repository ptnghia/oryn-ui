@props([
    'accept' => null,
    'multiple' => false,
    'draggable' => false,
    'disabled' => false,
    'showList' => true,
    'tip' => null,
    'uploadLimit' => null,
])

<div
    x-data="{
        files: [],
        dragging: false,
        handleFiles(fileList) {
            const newFiles = Array.from(fileList);
            @if($uploadLimit)
            if (this.files.length + newFiles.length > {{ $uploadLimit }}) {
                return;
            }
            @endif
            this.files = [...this.files, ...newFiles];
            this.$dispatch('upload-change', { files: this.files });
        },
        removeFile(index) {
            this.files.splice(index, 1);
            this.$dispatch('upload-change', { files: this.files });
        },
        formatSize(bytes) {
            return (bytes / 1024).toFixed(1) + ' KB';
        }
    }"
    {{ $attributes->merge(['class' => 'upload' . ($disabled ? ' disabled' : '')]) }}
>
    @if($draggable)
        <div
            class="upload-draggable"
            :class="dragging ? 'border-primary' : ''"
            @dragover.prevent="dragging = true"
            @dragleave.prevent="dragging = false"
            @drop.prevent="dragging = false; handleFiles($event.dataTransfer.files)"
            @click="$refs.fileInput.click()"
        >
            {{ $slot }}
        </div>
    @else
        <div @click="$refs.fileInput.click()" class="cursor-pointer">
            {{ $slot }}
        </div>
    @endif

    <input
        x-ref="fileInput"
        type="file"
        class="upload-input"
        @if($accept) accept="{{ $accept }}" @endif
        @if($multiple) multiple @endif
        @if($disabled) disabled @endif
        @change="handleFiles($event.target.files); $event.target.value = ''"
    />

    @if($tip)
        <div class="mt-2 text-sm text-gray-500">{{ $tip }}</div>
    @endif

    @if($showList)
    <div x-show="files.length > 0" class="upload-file-list">
        <template x-for="(file, index) in files" :key="index">
            <div class="upload-file">
                <div class="upload-file-thumbnail">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="upload-file-info">
                    <span class="font-semibold text-sm" x-text="file.name"></span>
                    <span class="text-xs text-gray-500" x-text="formatSize(file.size)"></span>
                </div>
                <button type="button" class="upload-file-remove" @click="removeFile(index)">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-500 hover:text-error" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </template>
    </div>
    @endif
</div>
