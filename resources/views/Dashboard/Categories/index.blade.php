@extends('Dashboard.Layouts.master')

@section('title')
Dashboard
@endsection

@section('content')
@include('Dashboard.messages_alert')

    <div class="row align-items-center">
        <div class="col-6">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Categroy /</span> All</h4>        
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a class="btn btn-primary" href="{{route('Categories.create')}}">Add Categroy</a>
        </div>

    </div>

    {{-- form fliter search --}}
    <form action="{{URL::current()}}" method="get">
    <div class="row justify-content-center mb-4 mt-2">
            <div class="col-4">
                <input type="search" class="form-control" :value="request('search')" name="search"  placeholder="search" id="">
            </div>
            <div class="col-4">
                <select name="getStatus" class="form-control" id="">
                    <option disabled selected >choose status</option>
                    <option value="notActive"@selected(request('getStatus')=='notActive')>notActive</option>
                    <option value="active"@selected(request('getStatus')=='active')>active</option>
                </select>
            </div>
            <div class="col-2">
                <button class="btn btn-primary  form-control" type="submit">Filter</button>
            </div>
        </div>
    </form>

    <div class="row mb-3">
        <div class="col-12">
            <div class="table ">
                <table class="table">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>description</th>
                    <th>product number</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>created_at</th>
                    <th>updated_at</th> 
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($categories as $category)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$category->id}}</strong></td>
                            <td><a href="{{route('Categories.show',$category->id)}}">{{$category->name}}</a></td>
                            <td>{{$category->description}}</td>
                            <td>testing</td>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li data-bs-toggle="tooltip"data-popup="tooltip-custom"data-bs-placement="top"class="avatar avatar-xs pull-up"title="Lilian Fuller">
                                        
                                        <img src="{{asset('Dashboard')}}/assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                </ul>
                            </td>
                            <td>
                                @if ($category->status === 'active')
                                <span class="badge bg-label-primary me-1">{{$category->status}}</span>
                                @else
                                <span class="badge bg-label-danger me-1">{{$category->status}}</span>
                                @endif
                            </td>
                            <td>{{$category->created_at->diffForHumans()}}</td> 
                            <td>{{$category->updated_at->diffForHumans()}}</td> 
                            <td>
                                <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('Categories.edit',$category->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item modal-effect" data-effect="effect-scale" data-bs-toggle="modal"  href="#delete{{$category->id}}"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                                </div>
                            </td>
                        </tr>

                        @include('Dashboard.Categories.delete')   
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
    {{$categories->links()}}    
@endsection
