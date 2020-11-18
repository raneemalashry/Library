
            <div class="card">
                <div class="card-header"><strong> Add New Comment </strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @include('partial.alerts')
                    <form action="{{route('comment.store',$book->id)}}" method="POST">
                        @csrf
                          <div class="form-group">
                            <label><strong> Comment </strong></label>
                           <textarea name="comment" class="form-control" ></textarea>     
                          </div>
                         
                        <input type="submit" class=" form-control btn btn-outline-dark btn-sm active" value="Add Comment">
                      </form>
                </div>
            </div>
 