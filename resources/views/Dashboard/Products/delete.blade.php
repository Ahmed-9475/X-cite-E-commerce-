
        <!-- Modal -->
        <div class="modal fade" id="delete{{$Product->id}}" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content" style="background-color:white">
            <form action="{{route("dashboard.admin.Products.destroy",$Product->id)}}" method="post">
              @method("delete")
              @csrf
                <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                      <input class="form-control" type="hidden" value="{{$Product->id}}">
                      <h4 class="text-center"> Are you sure delete category <span style="color: red">{{$Product->name}}</span> </h4>
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
