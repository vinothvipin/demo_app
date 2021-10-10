<x-app-layout>
    <x-slot name="header">
        <div class="row">
         
            <div class="pull-left col-sm-10">
                 <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company') }}
        </h2>
            </div>
            <div class="col-sm-2 pull-right">
                <a class="btn btn-success" href="{{ route('employees.index') }}"> Back</a>
            </div>
        
    </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">   
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('employees.update', $employee->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee first name:</strong>
                <input type="text" name="first_name" value="{{$employee->first_name}}" class="form-control" placeholder="Enter first name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee last name:</strong>
                <input type="text" name="last_name" value="{{$employee->last_name}}" class="form-control" placeholder="Enter last name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee Email:</strong>
                <input type="text" name="email" value="{{$employee->email}}" class="form-control" placeholder="Enter email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Employee phone:</strong>
                <input type="text" name="phone" value="{{$employee->phone}}" class="form-control" placeholder="Enter phone">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Company:</strong>
                 {!! Form::select('company_id', $company,  $employee->company_id,['class' => 'form-control','placeholder' => 'Select Company']); !!}
            </div>
        </div>
          
         

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
    
            </div>
        </div>
    </div>
</x-app-layout>
