<x-app-layout>
    <x-slot name="header">
        <div class="row">
         
            <div class="pull-left col-sm-10">
                 <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company') }}
        </h2>
            </div>
            <div class="col-sm-2 pull-right">
                <a class="btn btn-success" href="{{ route('company.index') }}"> Back</a>
            </div>
        
    </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">   
   
 
   
<form action="" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Company name:</strong>
                {{ $company->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
               {{ $company->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Company website:</strong>
                {{ $company->website }}
            </div>
        </div>
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Company logo:</strong>
                 <a href="{{$path}}">show logo</a>
            </div>
            
        </div>
         
         
    </div>
   
</form>
    
            </div>
        </div>
    </div>
</x-app-layout>
