<?php

declare(strict_types=1);

namespace App\View\Components\Admin\Organisms;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Sidebar extends Component
{
    public string $currentPath;

    public array $items;

    public function __construct()
    {
        $this->currentPath = url(request()->getPathInfo());

        $this->items = [
            [
                'name' => 'Home',
                'icon' => 'bi-house-fill',
                'link' => url('/admin'),
                'hidden' => false,
            ],
            [
                'name' => 'Developments',
                'icon' => 'bi-tools',
                'hidden' => false,
                'children' => [
                    [
                        'name' => 'Molecuels',
                        'icon' => 'bi-grid',
                        'link' => route('admin.developments.molecuel'),
                    ],
                    [
                        'name' => 'Atoms',
                        'icon' => 'bi-square',
                        'link' => route('admin.developments.atom'),
                    ],
                ],
            ],
        ];
    }

    public function render(): View
    {
        return view('components.admin.organisms.sidebar');
    }
}
