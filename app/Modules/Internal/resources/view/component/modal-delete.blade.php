<div class="modal fade" id="deleteModal{{$delete->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete</h4>
            </div>

            <div class="modal-body">
                <p>
                    Are you sure ?
                <p>
            </div>

            <div class="modal-footer">

                <form action="{{route($route . 'destroy', $delete->id)}}" method="post">
                    {{csrf_field()}}
                    {{method_field('delete')}}
                    <button type="button" class="btn btn-round btn-default"
                            data-dismiss="modal">
                        No
                    </button>
                    <button class="btn btn-round btn-danger">
                        Yes
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>