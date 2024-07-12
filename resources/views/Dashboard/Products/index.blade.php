@extends('Dashboard.Layouts.master')

@section('title')
Dashboard
@endsection

@section('content')
{{-- @include('Dashboard.messages_alert') --}}

    <div class="row align-items-center">
        <div class="col-6">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Product /</span> All</h4>        
        </div>
        <div class="col-6 d-flex justify-content-end">
            <a class="btn btn-primary" href="{{route('dashboard.admin.Products.create')}}">Add Product</a>
        </div>

    </div>

    <div class="row" >
        <div class="col-12">
            <div class="table ">
                <table class="table">
                <thead>
                    <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>description</th>
                    <th>Image</th>
                    <th>Status</th>
                    <th>price</th>
                    <th>compare price</th>
                    <th>store</th>
                    <th>category</th>
                    <th>created_at</th>
                    <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($Products as $Product)
                        <tr>
                            <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$Product->id}}</strong></td>
                            <td>{{$Product->name}}</td>
                            <td>{{$Product->description}}</td>
                            <td>
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                    <li data-bs-toggle="tooltip"data-popup="tooltip-custom"data-bs-placement="top"class="avatar avatar-xs pull-up"title="Lilian Fuller">
                                        
                                        <img src="{{asset('Dashboard')}}/assets/img/avatars/5.png" alt="Avatar" class="rounded-circle" />
                                    </li>
                                </ul>
                            </td>
                            <td>
                                @if ($Product->status === 'active')
                                <span class="badge bg-label-primary me-1">{{$Product->status}}</span>
                                @elseif ($Product->status === 'pending')
                                <span class="badge bg-label-warning me-1">{{$Product->status}}</span>
                                @else
                                <span class="badge bg-label-danger me-1">{{$Product->status}}</span>
                                @endif
                            </td>
                            <td>{{$Product->price}}</td> 
                            <td>{{$Product->compare_price}}</td> 
                            <td>{{$Product->store->name}}</td>
                            <td>{{$Product->category->name}}</td> 
                            <td>{{$Product->created_at->diffForHumans()}}</td> 
                            <td>
                                <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('dashboard.admin.Products.edit',$Product->id)}}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item modal-effect" data-effect="effect-scale" data-bs-toggle="modal"  href="#delete{{$Product->id}}"><i class="bx bx-trash me-1"></i> Delete</a>
                                </div>
                                </div>
                            </td>
                        </tr>

                        @include('Dashboard.Products.delete')   
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
    </div> 
    {{$Products->links()}}    

@endsection