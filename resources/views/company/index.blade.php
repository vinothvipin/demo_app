<x-app-layout>
    <x-slot name="header">       
         <div class="row">
         
            <div class="pull-left col-sm-10">
                 <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Company') }}
        </h2>
            </div>
            <div class="col-sm-2 pull-right">
                <a class="btn btn-success" href="{{ route('company.create') }}"> Create</a>
            </div>
        
    </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p></p>
        </div>
    @endif

    @if(count($company) > 0)
    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th> 
            <th>Email</th>  
            <th>Website</th>              
            <th>Date Created</th>
            <th>Actions</th>
        </tr>
        @foreach ($company as $data)
            <tr>
                <td>{{ ++$i }}</td>
                 <td>{{$data['name']}}</td>
                   <td>{{$data['email']}}</td>
                     <td>{{$data['website']}}</td>
                  <td>{{$data['published']}}</td>
                <td>
                <form action="{{ route('company.destroy',$data->id) }}" method="POST">   
                    <a class="btn btn-info" href="{{ route('company.show',$data->id) }}">Show</a>    
                    <a class="btn btn-primary" href="{{ route('company.edit',$data->id) }}">Edit</a>   
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
            </tr>
        @endforeach
    </table>
    @else
    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th colspan="6" style="text-align: center;">No Data</th>
            
        </tr>
    </table>

    @endif

    {!! $company->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>
