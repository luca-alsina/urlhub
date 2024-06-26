<?php

namespace App\Livewire\Table;

use App\Models\Url;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\PowerGridFields;

/**
 * @codeCoverageIgnore
 */
final class UrlListOfUsersTable extends PowerGridComponent
{
    const STR_LIMIT = 95;

    public int $user_id;

    public int $perPage = 25;

    public bool $showUpdateMessages = true;

    public string $sortDirection = 'desc';

    public function setUp(): array
    {
        return [
            Header::make()
                ->showToggleColumns()
                ->showSearchInput(),
            Footer::make()
                ->showPerPage($this->perPage)
                ->showRecordCount('full'),
        ];
    }

    public function datasource(): Builder
    {
        return Url::where('user_id', $this->user_id);
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('keyword', function (Url $url) {
                return view('components.table.keyword', ['url' => $url])
                    ->render();
            })
            ->add('destination', function (Url $url) {
                return view('components.table.destination', [
                    'url' => $url,
                    'limit' => self::STR_LIMIT,
                ])->render();
            })
            ->add('t_clicks', function (Url $url) {
                return view('components.table.visit', ['url' => $url])
                    ->render();
            })
            ->add('created_at_formatted', function (Url $url) {
                return view('components.table.date-created', ['url' => $url])
                    ->render();
            })
            ->add('action', function (Url $url) {
                return view('components.table.action-button', ['url' => $url])
                    ->render();
            });
    }

    /**
     * @return array<\PowerComponents\LivewirePowerGrid\Column>
     */
    public function columns(): array
    {
        return [
            Column::make(__('Short URL'), 'keyword')
                ->sortable()
                ->searchable(),

            Column::make(__('Destination URL'), 'destination')
                ->sortable()
                ->searchable(),
            Column::make(__('Title'), 'title')
                ->searchable()
                ->hidden(),

            Column::make(__('Clicks'), 't_clicks'),

            Column::make(__('Created At'), 'created_at_formatted', 'created_at')
                ->searchable()
                ->sortable(),

            Column::make(__('Actions'), 'action')
                ->bodyAttribute(styleAttr: ';padding-left: 8px'),
        ];
    }
}
