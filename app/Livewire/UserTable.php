<?php

namespace App\Livewire;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;  
use PowerComponents\LivewirePowerGrid\Components\SetUp\Exportable; 

final class UserTable extends PowerGridComponent
{
    use WithExport; 

    public string $tableName = 'user-table-cd9bmf-table';

    public function setUp(): array
    {
        $this->showCheckBox();

        return [
            // PowerGrid::exportable('export')
            // ->striped()
            // ->type(Exportable::TYPE_CSV),
            PowerGrid::header()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return DB::table('users');
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            ->add('id')
            ->add('name')
            ->add('email')
            ->add('created_at')
            ->add('updated_at');
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable()
                ->visibleInExport(true),
    
            Column::make('Email', 'email')
                ->sortable()
                ->searchable()
                ->visibleInExport(true),
    

    
            Column::make('Created at', 'created_at')
                ->sortable()
                ->searchable()
                ->visibleInExport(true),
    
          
    
            Column::make('Updated at', 'updated_at')
                ->sortable()
                ->searchable()
                ->visibleInExport(true),
    
            // 👇 This is required to actually display your row actions
            Column::action('Actions'),
        ];
    }
    

    public function filters(): array
    {
        return [
        ];
    }

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions($row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit: '.$row->id)
                ->id()
                ->class('pg-btn-white')
                ->dispatch('edit', ['rowId' => $row->id])
        ];
    }

    /*
    public function actionRules($row): array
    {
       return [
            // Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($row) => $row->id === 1)
                ->hide(),
        ];
    }
    */
}
