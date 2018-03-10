<!-- Add Module Modal -->
<div class="modal fade" id="addModule" tabindex="-1" role="dialog" aria-labelledby="addModuleLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <form action = "/courses/{{ $course->id }}/module" method="POST">
            {{ csrf_field() }}
            <div class="modal-header">
                <h5 class="modal-title" id="addModuleLabel">Add Module</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <div class="modal-body">
                <div class="form-group">
                    <input type = "text" class="form-control res-text-9 res-text-sm-9 res-text-md-9" name = "module-title" placeholder = "Enter course title" required />
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type = "submit" class="btn res-button app-red-btn float-right">
                <span class = "res-text-9 res-text-sm-7 res-text-md-9" app-load="creating module...">Create Module</span>
            </button>
          </div>
        </form>
    </div>
  </div>
</div>