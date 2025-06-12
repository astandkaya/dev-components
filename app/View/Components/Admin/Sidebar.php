<?php

declare(strict_types=1);

namespace App\View\Components\Admin;

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
            ],
            [
                'name' => '検証用',
                'icon' => 'bi-tools',
                'link' => route('admin.development'),
            ],
            // サンプルデータ
            [
                'name' => 'ダミー', // メニュー名
                'icon' => 'bi-box-fill', // BootstrapIcons（https://icons.getbootstrap.com/）
                'link' => '#', // リンク先（`route('hoge')`なども可）
            ],
            [
                'name' => 'ダミー（非表示）',
                'icon' => 'bi-box-fill',
                'link' => '#',
                'hidden' => true, // 非表示にする場合は`hidden`キーをtrueに設定
            ],
            [
                'name' => 'ユーザー（ダミー）',
                'icon' => 'bi-person-fill',
                'children' => [
                    // 入れ子にする場合は`children`をキーとして配列を渡す
                    // `children`以下は現状1階層のみ可
                    [
                        'name' => '一覧',
                        'icon' => 'bi-people-fill',
                        'link' => '#',
                    ],
                    [
                        'name' => '新規作成',
                        'icon' => 'bi-person-plus-fill',
                        'link' => '#',
                    ],
                ],
            ],
        ];
    }

    public function render(): View
    {
        return view('components.admin.sidebar');
    }
}
