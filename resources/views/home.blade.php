@extends('layout')

@section('content')

    


    
<div class="  shadow-md sm:rounded-lg p-2  mx-auto">
    <form action="{{ route('student.index') }}" role="search" class="flex items-center justify-between pb-4">
        
        
        <div class="relative flex gap-3">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
            </div>
            <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="search" placeholder="Search for items">
            <input type="button" value="submit" class="bg-lime-600 px-3 py-2 rounded-md  ">
        </div>
    </form>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
               
                <th scope="col" class="px-6 py-3 border">
                   id
                </th>
                <th scope="col" class="px-6 py-3 border">
                    Name
                </th>
                <th scope="col" class="px-6 py-3 border">
                    Father_name
                </th>
                <th scope="col" class="px-6 py-3 border">
                   Contact
                </th>
                <th scope="col" class="px-6 py-3 border">
                    Email
                </th>
                <th scope="col" class="px-6 py-3 border">
                    city
                </th>
                <th scope="col" class="px-6 py-3 border">
                    Pincode
                </th>
                <th scope="col" class="px-6 py-3 border">
                    View
                </th>
                <th scope="col" class="px-6 py-3 border">
                    Edit
                </th>
                <th scope="col" class="px-6 py-3 border">
                    Delete
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
               
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$item->id}} </td>
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$item->name}} </td>

                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$item->father_name}} </td>

                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$item->contact}} </td>

                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$item->email}} </td>

                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$item->city}} </td>

                <td scope="row" class=" border px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">{{$item->pincode}} </td>

                <td scope="row" class=" border px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <form action="" method="post">
                       
                        {{-- @method('delete') --}}
                        <input class="bg-green-500 hover:bg-green-600 px-2 py-1 rounded-md text-white" type="submit" value="view">
                    </form> 
                </td>
                <td scope="row" class=" border px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   
                     
                       
                        <a href="{{ route('student.edit',$item) }}"  class="bg-orange-500 hover:bg-orange-600 px-2 py-1 rounded-md text-white" >Edit</a>
                   
                </td>
                <td scope="row" class=" border px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <form action="{{ route('student.destroy', $item) }}" method="post">
                        @csrf
                        @method('delete')
                        <input class="bg-red-700 hover:bg-red-800 px-2 py-1 rounded-md text-white" type="submit" value="delete">
                       
                          
                    </form> 
                </td>
               
            </tr>
               
               
            @endforeach

            
        </tbody>
    </table>
</div>
<div class="flex">
    {{ $students->links() }}
</div>



    
@endsection
