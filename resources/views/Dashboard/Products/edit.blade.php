@extends('Dashboard.Layouts.master')

@section('title')
Dashboard
@endsection
@push('tagifyCss')
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
@endpush
@section('content')

    @include('Dashboard.messages_alert')

    <div class="row align-items-center">
        <div class="col-6">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product /</span> Edite</h4>        
        </div>
    </div>

    <section >
        <div class="row m-0">
            <div style="" class="col-12 mt-4">
                <form enctype="multipart/form-data" action="{{route('Products.update',$Products->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" value="{{$Products->name}}" class="form-control @error('name') is-invalid @enderror" name="name"  placeholder="Category Name">
                        @error('name')<div class="alert alert-danger">{{ $message }}</div>@enderror

                    </div>

                    <div class="mb-3">
                        <label  class="form-label @error('description') is-invalid @enderror">Description</label>
                        <textarea name="description" class="form-control"  rows="3">{{$Products->description}}</textarea>
                        @error('description')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label  class="form-label">Catagroy Parent</label>
                    <select class=" form-control @error('categroyParent') is-invalid @enderror" name="categroyParent" aria-label="Default select example">
                        <option selected disabled >Open this select menu</option>
                        @foreach($Categories as $Categor)
                        <option  value="{{$Categor->id}}" @selected($Categor->id == $Products->category_id) >{{$Categor->name}}</option>
                        @endforeach
                    </select>
                    @error('categroyParent')<div class="alert alert-danger">{{ $message }}</div>@enderror

                    </div>

                    {{-- store --}}
                    <div class="mb-3">
                        <label  class="form-label">store</label>
                    <select class=" form-control @error('store') is-invalid @enderror" name="store" aria-label="Default select example">
                        <option selected disabled >Open this select menu</option>
                        @foreach($stores as $store)
                        <option value="{{$store->id}}"@selected($store->id == $Products->store_id)>{{$store->name}}</option>
                        @endforeach
                    </select>
                    @error('store')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="text" value="{{$Products->price}}" class="form-control @error('price') is-invalid @enderror" name="price"  placeholder="product price">
                        @error('price')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">compare Price</label>
                        <input type="text" value="{{$Products->compare_price}}" class="form-control @error('compare_price') is-invalid @enderror" name="compare_price"  placeholder="compare Price">
                        @error('compare_price')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tag</label>
                        <input  type="text"  class="form-control @error('tags') is-invalid @enderror" value="{{$tag}}" name="tags"  placeholder="tags">
                        @error('tags')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>


                    <div class="mb-3">
                        <label  class="form-label @error('image') is-invalid @enderror">Upload Image</label>
                        <input class="form-control" name='image' accept="image/*" type="file" onchange="loadFile(event)" >
                        @if($Products->image)
                        <img src="{{asset('Dashboard/assets/img/'.$Products->image)}}" style="border-radius:49%;" width="150px" height="150px" id="output"/>
                        @endif
                        @error('image')<div class="alert alert-danger">{{ $message }}</div>@enderror
                    </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input @error('status') is-invalid @enderror" type="radio" id="Active" name="status" value="active"@checked($Products->status=='active') >
                                <label class="form-check-label" for="Active">Active</label>
                                @error('status')<div class="alert alert-danger">{{ $message }}</div>@enderror

                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('status') is-invalid @enderror" type="radio" id="notActive" name="status" value="notActive"@checked($Products->status=='notActive')>
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

@push('tagifyScript')

<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
        <script>
                var inputElm = document.querySelector(['name=tags']),
                tagify = new Tagify (inputElm);

        </script>
@endpush
