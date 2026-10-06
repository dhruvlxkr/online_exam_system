@extends('layout.admin-layout')

@section('title', 'Subjects')

@section('content')
  <div class="col-lg-12 col-md-12 col-auto">
    <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Subject List</h5>
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSubjectModal">Add Subject</button>
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Subject Name</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            @if($subjects->count() > 0)
              @foreach ($subjects as $subject)
              <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $subject->subject_name }}</td>
                <td>
                   <a href="" class="btn btn-sm btn-warning">Edit</a>
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </td>
              </tr>
            @endforeach
            @else
                 <tr>
                    <td colspan="3" class="text-center">No subjects found.</td>
                </tr>
            @endif
            
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="modal fade" id="addSubjectModal" tabindex="-1" aria-hidden="true">
    <form id="addSubjectForm">
      @csrf
                            <div class="modal-dialog modal-xl" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel4">Add Subject</h5>
                                  <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col mb-6">
                                      <label for="subjectName" class="form-label">Subject Name</label>
                                      <input type="text" id="subjectName" name="subjectName" class="form-control" placeholder="Enter SubjectName" />
                                      <span class="text-danger error-text subjectName_error"></span>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                    Close
                                  </button>
                                  <button type="submit" name="submitbtn" id="submitbtn" class="btn btn-primary">Save</button>
                                </div>
                              </div>
                            </div>
                          </div>
                          </form>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
     $('#addSubjectForm').on('submit',function(e){
        e.preventDefault();
        var formData = $(this).serialize();


        $.ajax({
            url : "{{route('admin.subject.store')}}",
            type : "POST",
            data : formData,
            success : function(data){
                if(data.success == true){
                  //  alert(data.message);
                    location.reload();
                }else{
                    alert(data.message);
                }
            }

     });

     });
    });
  </script>
@endsection

