<?php

namespace App\Services;

use Illuminate\Http\Request;

class CommonService
{
    protected int $offset = 0;

    protected int $limit = 10;

    public function input(Request $request, array $fillable, bool $allowNull = false): array
    {
        return $allowNull ? $request->only($fillable) :
            array_filter($request->only($fillable), fn ($value) => $value != null);
    }

    public function params(Request $request, array $only = [], array $options = []): array
    {
        $search = $request->get('search');

        $params = [
            'search' => ! empty($search) && is_string($search) ? $search : null,
            'limit' => ! empty($request->get('limit')) ? (int) $request->get('limit') : $this->limit,
            'offset' => ! empty($request->get('offset')) ? (int) $request->get('offset') : $this->offset,
        ];

        if ($request->has('status') && empty($options['status'])) {
            $params['status'] = $request->get('status');
        }

        if (! empty($only)) {
            $params = collect($params)->only($only)->toArray();
        }

        if (! empty($options)) {
            $params = array_merge($params, $options);
        }

        return $params;
    }

    public function getSortParams(Request $request, $key): string
    {
        $sortKey = (int) $request->$key;

        return array_search($sortKey, config('constant.sort')) ?: 'normal';
    }

    public function getDateRange(Request $request): array
    {
        $today = date('Y-m-d');

        return [
            'from_date' => ! empty($request->from_date) ?
                date('Y-m-d', strtotime($request->from_date)) : $today,
            'to_date' => ! empty($request->to_date) ?
                date('Y-m-d', strtotime($request->to_date)) : null,
        ];
    }

    public function getCustomRange(Request $request): array
    {
        $dateRange = $this->getDateRange($request);

        if (empty($dateRange['to_date'])) {
            return ['txn_date' => $dateRange['from_date']];
        }

        return $dateRange;
    }

    public function qualifyPeriodParams(Request $request): array
    {
        $today = date('Y-m-d');
        $period = (int) $request->get('period');
        $period = ! empty($period) ? $period : '';

        return match ($period) {
            config('constant.settlement_periods.today') => [
                'from_date' => $today,
                'to_date' => $today,
            ],
            config('constant.settlement_periods.last_7_days') => [
                'from_date' => date('Y-m-d', strtotime('-7days')),
                'to_date' => $today,
            ],
            config('constant.settlement_periods.last_30_days') => [
                'from_date' => date('Y-m-d', strtotime('-30days')),
                'to_date' => $today,
            ],
            config('constant.settlement_periods.last_2_months') => [
                'from_date' => date('Y-m-d', strtotime('-2months')),
                'to_date' => $today,
            ],
            config('constant.settlement_periods.last_3_months') => [
                'from_date' => date('Y-m-d', strtotime('-3months')),
                'to_date' => $today,
            ],
            config('constant.settlement_periods.last_6_months') => [
                'from_date' => date('Y-m-d', strtotime('-6months')),
                'to_date' => $today,
            ],
            config('constant.settlement_periods.last_12_months') => [
                'from_date' => date('Y-m-d', strtotime('-12months')),
                'to_date' => $today,
            ],
            config('constant.settlement_periods.range') => $this->getCustomRange($request),
            default => [],
        };
    }

    public function getPeriods(): array
    {
        $data = [];
        foreach (config('constant.settlement_periods') as $key => $val) {
            if ($key == 'range') {
                $key = 'Select a custom range';
            }

            if ($key == 'working_day') {
                continue;
            }

            $data[] = [
                'label' => ucwords(str_replace('_', ' ', $key)),
                'value' => $val,
            ];
        }

        return $data;
    }

    public function getStlSetTypes(): array
    {
        return [
            [
                'type' => config('constant.stl_setting_type.working_day'),
                'desc' => 'Settle transactions X days after they occur. (e.g., T+3)',
                'name' => 'T+days',
            ],
            [
                'type' => config('constant.stl_setting_type.weekly'),
                'desc' => 'Settle transactions once a week on a specific day, such as every Monday.',
                'name' => 'Weekly',
            ],
            [
                'type' => config('constant.stl_setting_type.monthly'),
                'desc' => 'Settle transactions once a month on a specified date, such as the 1st of every month.',
                'name' => 'Monthly',
            ],
            [
                'type' => config('constant.stl_setting_type.custom_day'),
                'desc' => 'Settle transactions after a specified number of days, such as 10, 30, or 60 days',
                'name' => 'Certain days',
            ],
        ];
    }
}
