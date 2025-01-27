@extends('layouts.app')

@section('title' , isset($task) ? 'Edit Task' : 'Add Task')



@section( 'content')


    <form action="{{ isset($task) ? route('tasks.update' , ['task' => $task->id]) : route('tasks.store')}}" method="post">
    @csrf  {{-- to  protect from cross site request forgery (CSRF) attacks --}}

    @isset($task)
        @method('PUT')
    @endisset    
    <div>
        <label for="title">
            Title:
        </label>
        <input type="text" name="title" id="title"
        @class(['border-red-500' => $errors->has('title')])
        {{-- class="border @error('title') border-red-500 @enderror"     we can use this instead of @class above--}} 
        value="{{ $task->title ?? old('title') }}"/>

        

        @error('title')
            <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="description">
            Description:
        </label>
        <textarea  name="description" id="description"
        @class(['border-red-500' => $errors->has('description')])
        rows="5">{{ $task->description ?? old('description') }}</textarea>

        @error('description')
        <p class="error">{{ $message }}</p>
    @enderror
    </div>
    <div>
        <label for="long_description">
            Long Description:
        </label>
        <textarea  name="long_description" id="long_description" rows="10"
        @class(['border-red-500' => $errors->has('long_description')])
        >{{ $task->long_description ?? old('long_description') }}</textarea>

        @error('long_description')
        <p class="error">{{ $message }}</p>
    @enderror
    </div>

    <div class="flex gap-2 items-center">
        <button type="submit" class="btn ">
            {{ isset($task) ? 'Update task' : 'Add  task' }}
    
        </button>
        <a href="{{ route('tasks.index') }}" class="btn">Cancel</a>
    </div>

    </form>
@endsection()