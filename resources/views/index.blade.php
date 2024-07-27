@extends('layouts.app')

@section('title' , 'the list of tasks')


@section('content')
    
    <nav class="mb-5 mt-5">
        <a class="link" href="  {{ route('tasks.create') }} ">Add Task</a>
    </nav>

    @forelse ($tasks as $task) 

        <div class="mt-2">
            <a  href="{{ route('tasks.show' , ['task'=> $task->id]) }}"
                @class(['font-bold' ,'line-through' =>$task->completed])>
                {{ $task->title }}</a>
        
        </div>    
    @empty
    <div>there are no tasks!</div>
    @endforelse

    @if ($tasks->count())
        <nav class="mt-10">
        {{ $tasks->links() }}
        </nav>
    @endif
@endsection    
