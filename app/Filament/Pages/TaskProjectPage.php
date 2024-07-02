<?php

namespace App\Filament\Pages;

use App\Models\Projects;
use App\Models\Task;
use Filament\Pages\Page;

class TaskProjectPage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $title = 'Задачи и проекты';
    protected static ?int $navigationSort = 5;


    protected static string $view = 'filament.pages.task-project-page';


    public $projects;
    public $tasks;

    public function mount()
    {
        $this->projects = Projects::all();
        $this->tasks = Task::all();
    }
}
