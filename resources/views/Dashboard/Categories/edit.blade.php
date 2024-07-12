@extends('Dashboard.Layouts.master')

@section('title')
Dashboard
@endsection

@section('content')

    @include('Dashboard.messages_alert')

    <div class="row align-items-center">
        <div class="col-6">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categroy /</span> create</h4>        
        </div>
    </div>

    <section >
        <div class="row m-0">
            <div style="" class="col-12 mt-4">
                <form enctype="multipart/form-data" action="{{route('admin.Categories.update', $categories->id)}}" method="post">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" value="{{ $categories->name}}" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Category Name">
                        @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror

                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Catagroy Parent</label>
                    <select class=" form-control @error('categroyParent') is-invalid @enderror" name="categroyParent" aria-label="Default select example">
                        <option selected disabled >Open this select menu</option>
                        @foreach($parents as $parent)
                        <option value="{{$parent->id}}" @selected($categories->parent_id==$parent->id )>{{$parent->name}}</option>
                        @endforeach
                    </select>
                    @error('categroyParent')<div class="alert alert-danger">{{ $message }}</div>@enderror

                    </div>

                    <div class="mb-3">
                        <label  class="form-label @error('description') is-invalid @enderror">Description</label>
                        <textarea name="description" class="form-control"  rows="3">{{ $categories->description}}</textarea>
                        @error('description')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label  class="form-label @error('image') is-invalid @enderror">Upload Image</label>
                        <input class="form-control" name='image' accept="image/*" vlaue='{{ $categories->image}}' type="file" onchange="loadFile(event)" >
                        @if ($categories->image)
                        <img style="border-radius:49%;" src="{{asset('Dashboard/assets/img/'.$categories->image)}}" width="150px" height="150px" id="output"/>
                        @endif
                        @error('image')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                        <div class="mt-3 mb-3">
                            <div class="form-check">
                                <input class="form-check-input @error('status') is-invalid @enderror"  type="radio" id="Active" name="status" value="active"@checked('active'== $categories->status)>
                                <label class="form-check-label" for="Active">Active</label>
                                @error('status')<div class="alert alert-danger">{{ $message }}</div>@enderror

                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('status') is-invalid @enderror" type="radio" id="notActive" name="status" value="notActive"@checked('notActive'==$categories->status)>
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