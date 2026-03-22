<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class DataTable extends Component
{
    public function __construct(
        /** @var array<int, array{header: string, accessorKey: string, sortable?: bool, cell?: string|null, width?: int|null}> */
        public array $columns = [],
        public array $pagingData = ['total' => 0, 'pageIndex' => 1, 'pageSize' => 10],
        public array $pageSizes = [10, 25, 50, 100],
        public bool $selectable = false,
        public bool $loading = false,
        public bool $noData = false,
        public bool $hoverable = true,
        public string $noDataText = 'No data found!',
        public int $skeletonRows = 0,
    ) {}

    public function total(): int
    {
        return (int) ($this->pagingData['total'] ?? 0);
    }

    public function pageIndex(): int
    {
        return (int) ($this->pagingData['pageIndex'] ?? 1);
    }

    public function pageSize(): int
    {
        return (int) ($this->pagingData['pageSize'] ?? 10);
    }

    public function pageSizeOptions(): array
    {
        return array_map(fn ($size) => [
            'value' => $size,
            'label' => $size . ' / page',
        ], $this->pageSizes);
    }

    public function render()
    {
        return view('oryn-ui::components.ui.data-table');
    }
}
