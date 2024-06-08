
        <!-- Modal -->
        <div class="modal fade" id="delete{{$store->id}}" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" style="background-color:white">
            <form action="{{route("Products.destroy",$store->id)}}" method="post">
              @method("delete")
              @csrf
            <div class="modal-header">
                <button
                    type="button"style='margin-top:-0.25rem' class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                      <input class="form-control" type="hidden" value="{{$store->id}}">
                      <h4 class="text-center"> Are you sure delete category <span style="color: red">{{$store->name}}</span> </h4>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
          </div>
          </div>
      </div>
      </div>
  </div> 
<!-- Modal -->
