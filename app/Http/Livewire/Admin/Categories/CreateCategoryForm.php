<?php

namespace App\Http\Livewire\Admin\Categories;

use App\Contracts\ManagesCategories;
use App\Models\Category;
use Livewire\Component;

class CreateCategoryForm extends Component
{
    public bool $open = false;
    public array $data = ['name' => ''];
    public ?Category $category = null;
    public string $title = 'Create New Category';
    public string $shortTitle = 'Create';
    protected $listeners = ['open'];

    public function mount():void {
        if (!is_null($this->category)) {
            $this->data = $this->category->withoutRelations()->toArray();
            $this->title = 'Update category information';
            $this->shortTitle = 'Update';
        }
        $this->title = __($this->title);
        $this->shortTitle = __($this->shortTitle);
    }

    public function open($category = null):void {
        if(is_numeric($category)) $this->category = Category::find($category);
        $this->open = true;
        $this->mount();
    }

    public function save(ManagesCategories $manager):void {
        $category = $manager->save($this->data, $this->category);
        if($category) {
            $this->emitTo('admin.categories.categories-list',"render");
            $this->emit('saved');
            $this->reset();
        } else $this->emit('error');
    }

    public function render(){
        return view('livewire.admin.categories.create-category-form');
    }
}
