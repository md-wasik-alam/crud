@extends('layout')

@section('content')

<div class="mx-auto max-w-md py-4">
    <h1 class="text-2xl font-bold mb-4">Edit Personal Information</h1>
    <form class="space-y-4" action="{{ route('student.update',$fetchData) }}" method="post">
      @csrf
      @method('put')
      <div>
        <label class="block text-gray-700 font-bold mb-2" for="name">Name</label>
        <input name="name" value="{{$fetchData->name}}" class="w-full border border-gray-400 p-2 rounded-lg focus:outline-none focus:border-blue-500" id="name" name="name" type="text" placeholder="John Doe">
      </div>
      <div>
        <label class="block text-gray-700 font-bold mb-2" for="father_name">Father's Name</label>
        <input name="father_name" value="{{$fetchData->father_name}}" class="w-full border border-gray-400 p-2 rounded-lg focus:outline-none focus:border-blue-500" id="father_name" name="father_name" type="text" placeholder="Jane Doe">
      </div>
      <div>
        <label class="block text-gray-700 font-bold mb-2" for="contact">Contact Number</label>
        <input name="contact" value="{{$fetchData->contact}}" class="w-full border border-gray-400 p-2 rounded-lg focus:outline-none focus:border-blue-500" id="contact" name="contact" type="tel" placeholder="+91 9876543210">
      </div>
      <div>
        <label class="block text-gray-700 font-bold mb-2" for="email">Email Address</label>
        <input name="email" value="{{$fetchData->email}}" class="w-full border border-gray-400 p-2 rounded-lg focus:outline-none focus:border-blue-500" id="email" name="email" type="email" placeholder="johndoe@example.com">
      </div>
      <div>
        <label class="block text-gray-700 font-bold mb-2" for="city">City</label>
        <input name="city" value="{{$fetchData->city}}" class="w-full border border-gray-400 p-2 rounded-lg focus:outline-none focus:border-blue-500" id="city" name="city" type="text" placeholder="New York">
      </div>
      <div>
        <label class="block text-gray-700 font-bold mb-2" for="pin">PIN Code</label>
        <input name="pincode" value="{{$fetchData->pincode}}" class="w-full border border-gray-400 p-2 rounded-lg focus:outline-none focus:border-blue-500" id="pin" name="pin" type="text" placeholder="123456">
      </div>
      <button class="bg-blue-500 hover:bg-blue-700 w-full text-white font-bold py-2 px-4 rounded">Submit</button>
    </form>
  </div>

@endsection
