<?php

namespace App\Filament\Resources\LogisticsResource\Widgets;

use Filament\Widgets\ChartWidget;

class LogisticStatusChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            //
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
    }
}
