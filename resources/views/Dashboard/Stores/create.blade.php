@extends('Dashboard.Layouts.master')

@section('title')
Dashboard
@endsection

@section('content')

    @include('Dashboard.messages_alert')

    <div class="row align-items-center">
        <div class="col-6">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Store /</span> create</h4>        
        </div>
    </div>

    <section >
        <div class="row m-0">
            <div style="" class="col-12 mt-4">
                <form enctype="multipart/form-data" action="{{route('Stores.store')}}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Store Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Store Name ">
                        @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror

                    </div>
                    {{-- <div class="mb-3">
                        <label  class="form-label">Catagroy Parent</label>
                    <select class=" form-control @error('categroyParent') is-invalid @enderror" name="categroyParent" aria-label="Default select example">
                        <option selected disabled >Open this select menu</option>
                        @foreach($Products as $Product)
                        <option value="{{$Product->id}}">{{$Product->name}}</option>
                        @endforeach
                    </select>
                    @error('categroyParent')<div class="alert alert-danger">{{ $message }}</div>@enderror

                    </div> --}}

                    <div class="mb-3">
                        <label  class="form-label @error('description') is-invalid @enderror">Description</label>
                        <textarea name="description" class="form-control"  rows="3"></textarea>
                        @error('description')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label  class="form-label @error('image') is-invalid @enderror">Upload Image</label>
                        <input class="form-control" name='image' accept="image/*" type="file" onchange="loadFile(event)" >
                        <img style="border-radius:49%;" width="150px" height="150px" id="output"/>
                        @error('image')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <label class="form-check-label" for="Active">Active</label>
                                @error('status')<div class="alert alert-danger">{{ $message }}</div>@enderror

                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('status') is-invalid @enderror" type="radio" id="notActive" name="status" value="notActive">
                                <label class="form-check-label" for="notActive">Not Active</label>
                                @error('status')<div class="alert alert-danger">{{ $message }}</div>@enderror
                            </div>
                        </div>

                    <button type="submit" class="form-control btn-primary">Save</button>
                    
                </form>
            </div>
        </div>
    </section>

@endsection