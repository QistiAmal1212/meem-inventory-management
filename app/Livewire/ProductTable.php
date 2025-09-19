<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\References\ProductCategory;
use App\Models\References\ProductGrade;
use App\Models\References\ProductMetal;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Facades\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridFields;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class ProductTable extends PowerGridComponent
{
    public string $tableName = 'product-table-wmohex-table';


    public function header(): array
    {
        return [
          
        ];
    }

    public function filters(): array
    {$dataSource = [
        1 => 'Pending',
        2 => 'Approved',
        3 => 'Rejected',
    ];
    
        return [
            // Filter::inputText('name')
            //     ->placeholder('Product name')
            //     ->operators(['contains']),


            // Filter::inputText('sku')
            //     ->placeholder('SKU')
            //     ->operators(['contains']),

            Filter::select('category', 'category_id')
                ->dataSource(ProductCategory::all())
                ->optionLabel('name')
                ->optionValue('id'),

            Filter::select('metal', 'metal_id')
                ->dataSource(ProductMetal::all())
                ->optionLabel('name')
                ->optionValue('id'),

            Filter::select('grade', 'grade_id')
                ->dataSource(ProductGrade::all())
                ->optionLabel('grade')
                ->optionValue('id'),


                
            Filter::select('status', 'status')
                ->dataSource(
                        collect([
                            ['value' => 1, 'label' => 'Active'],
                            ['value' => 2, 'label' => 'Inactive'],
                        ])
                )
                ->optionLabel('label') 
                    ->optionValue('value'),
                
            
            
        ];
    }
    
    
    
    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            PowerGrid::header()
            // ->withoutLoading()
                ->showSearchInput(),
            PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Product::query();
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function fields(): PowerGridFields
    {
        return PowerGrid::fields()
            // ->add('id')
            // ->add('name')
            // ->add('description')
            // ->add('sku')
            // ->add('weight')
            // ->add('status')
            // ->add('created_at')
            ->add('status', fn ($model) => $model->status == 1 ? 'Active' : 'Inactive')
            ->add('status_badge', function ($model) {
                return $model->status == 1
                    ? '<span class="px-2 py-1 text-xs font-semibold text-green-700 bg-green-100 rounded-full">Active</span>'
                    : '<span class="px-2 py-1 text-xs font-semibold text-red-700 bg-red-100 rounded-full">Inactive</span>';
            })
            ->add('category', fn ($model) => $model->category?->name)
            ->add('metal', fn ($model) => $model->metal?->name)
            ->add('grade', fn ($model) => $model->grade?->grade);

    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Name', 'name')
                ->sortable()
                ->searchable(),

            Column::make('Description', 'description')
                ->sortable()
                ->hidden()
                ->searchable(),

            Column::make('Sku', 'sku')
                ->hidden()
                ->sortable()
                ->searchable(),

            Column::make('Category', 'category')
                ->sortable()
                ->searchable(),

            Column::make('Metal', 'metal')
                ->sortable()
                ->searchable(),

            Column::make('Grade', 'grade')
            ->sortable()
            ->searchable(),

            Column::make('Weight', 'weight')
                ->sortable()
                ->searchable(),

            Column::make('Status', 'status_badge', 'status')
                ->sortable()
                ->searchable(),
       
            Column::make('Created at', 'created_at')
                ->sortable()
                ->hidden()
                ->searchable(),

            Column::action('Action')
        ];
    }

    

    #[\Livewire\Attributes\On('edit')]
    public function edit($rowId): void
    {
        $this->js('alert('.$rowId.')');
    }

    public function actions(Product $row): array
    {
        return [
            // Edit button
            Button::add('edit')
                ->slot('<svg xmlns="http://www.w3.org/2000/svg" 
                             class="w-5 h-5" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M15.232 5.232l3.536 3.536M16.732 3.732a2.25 2.25 0 113.182 3.182L7.5 19.5 3 21l1.5-4.5L16.732 3.732z" />
                        </svg>')
                ->class('pg-btn-white p-2 rounded-md dark:ring-pg-primary-600 dark:border-pg-primary-600 
                         dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 
                         dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('edit', ['rowId' => $row->id]),
    
            // View button
            Button::add('view')
                ->slot('<svg xmlns="http://www.w3.org/2000/svg" 
                             class="w-5 h-5" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 
                                     9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 
                                     0-8.268-2.943-9.542-7z" />
                        </svg>')
                ->class('pg-btn-white p-2 rounded-md dark:ring-pg-primary-600 dark:border-pg-primary-600 
                         dark:hover:bg-pg-primary-700 dark:ring-offset-pg-primary-800 
                         dark:text-pg-primary-300 dark:bg-pg-primary-700')
                ->dispatch('view', ['rowId' => $row->id]),
    
            // Delete button
            Button::add('delete')
                ->slot('<svg xmlns="http://www.w3.org/2000/svg" 
                             class="w-5 h-5 text-red-500" 
                             fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M1 7h22M10 3h4a1 1 0 011 1v1H9V4a1 1 0 011-1z" />
                        </svg>')
                ->class('pg-btn-white p-2 rounded-md dark:ring-pg-primary-600 dark:border-pg-primary-600 
                         dark:hover:bg-red-700 dark:ring-offset-pg-primary-800 
                         dark:text-red-400 dark:bg-pg-primary-700')
                ->dispatch('delete', ['rowId' => $row->id]),
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
