<?php

namespace App\Filament\Widgets;

use App\Models\Hardware;
use App\Models\License;
use App\Models\OEM;
use App\Models\Server;
use App\Models\Software;
use App\Models\Subscription;
use Filament\Widgets\Widget;

class DashboardOverview extends Widget
{
    protected static string $view = 'filament.widgets.dashboard-overview';
    public $stats;
    protected int|string|array $columnSpan = 'full';

    public function __construct()
    {
        $this->stats = [
            [
                'title' => 'Servers',
                'value' => Server::count(),
                'url' => ''
            ], [
                'title' => 'Hardware',
                'value' => Hardware::count(),
                'url' => ''
            ], [
                'title' => 'Software',
                'value' => Software::count(),
                'url' => ''
            ],

            [
                'title' => 'Licenses',
                'value' => License::count(),
                'url' => ''
            ],
            [
                'title' => 'OEMs',
                'value' => OEM::count(),
                'url' => ''

            ],
            [
                'title' => 'Subscriptions',
                'value' => Subscription::count(),
                'url' => ''
            ],
            [
                'title' => 'Software Expires In 30 Days',
                'value' => Software::where([
                    ['oem_support_end_date', '<=', now()->addDays(30)],
                    ['oem_support_end_date', '>=', now()]
                ])->count(),

                'url' => '/software?tableFilters[expire_in_30][isActive]=true'
            ],
            [
                'title' => 'Software Expires In 7 Days',
                'value' => Software::where([
                    ['oem_support_end_date', '<=', now()->addDays(7)],
                    ['oem_support_end_date', '>=', now()]
                ])->count(),
                'url' => '/software?tableFilters[expire_in_7][isActive]=true'
            ], [
                'title' => 'Software Expired',
                'value' => Software::where('oem_support_end_date', '<', now())->count(),
                'url' => '/software?tableFilters[expired][isActive]=true'
            ], [
                'title' => 'Hardware Expires In 30 Days',
                'value' => Hardware::where([
                    ['oem_support_end_date', '<=', now()->addDays(30)],
                    ['oem_support_end_date', '>=', now()]
                ])->count(),
                'url' => '/hardware?tableFilters[expire_in_30][isActive]=true'
            ], [
                'title' => 'Hardware Expires In 7 Days',
                'value' => Hardware::where([
                    ['oem_support_end_date', '<=', now()->addDays(7)],
                    ['oem_support_end_date', '>=', now()]
                ])->count(),
                'url' => '/hardware?tableFilters[expire_in_7][isActive]=true'
            ], [
                'title' => 'Hardware Expired',
                'value' => Hardware::where('oem_support_end_date', '<', now())->count(),
                'url' => '/hardware?tableFilters[expired][isActive]=true'
            ]
        ];
    }
}
