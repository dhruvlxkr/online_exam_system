@extends('layout.admin-layout')


@section('title', 'Exams')

@section('content')
    <div class="col-lg-12 col-md-12 col-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Exam List</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addExamModal">Add Exam</button>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Exam Name</th>
                            <th scope="col">Subject Name</th>
                            <th scope="col">Exam Date</th>
                            <th scope="col">Exam Time</th>
                            <th scope="col">Attempt Time</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($exams->count() > 0)
                            @foreach ($exams as $exam)
                                <tr>

                                    <td scope="row">{{ $loop->iteration }}</td>
                                    <td>{{ $exam->exam_name }}</td>
                                    <td>{{ $exam->subjects[0]['subject_name'] }}</td>
                                    <td>{{ $exam->exam_date }}</td>
                                    <td>{{ $exam->exam_time }} Hrs</td>
                                    <td>{{ $exam->attemp }} Time</td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning editExamBtn"
                                            data-bs-toggle="modal" data-bs-target="#editExamModal"
                                            data-id="{{ $exam->id }}">Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger deleteExamBtn"
                                            id="deleteExamBtn" data-bs-toggle="modal" data-bs-target="#deleteExamModal"
                                            data-id="{{ $exam->id }}">Delete</button>
                                    </td>


                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" class="text-center">Data Not Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="addExamModal" tabindex="-1" aria-hidden="true">
        <form id="addExam">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel4">Add Exam</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="examName" class="form-label">Exam Name</label>
                                <input type="text" id="examName" name="examName" class="form-control"
                                    placeholder="Enter Exam Name" />
                            </div>
                            <div class="col-12 mb-3">
                                <label for="subjectName" class="form-label">Subject Name</label>
                                <select class="form-select" id="subjectName" name="subjectName">
                                    <option value="">Select Subject</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="examDate" class="form-label">Exam Date</label>
                                <input type="date" id="examDate" name="examDate" class="form-control"
                                    placeholder="Enter Exam Date" min="<?php echo date('Y-m-d'); ?>" />
                            </div>

                            <div class="col-12 mb-3">
                                <label for="examTime" class="form-label">Exam Time</label>
                                <input type="time" id="examTime" name="examTime" class="form-control"
                                    placeholder="Enter Exam Time" />
                            </div>

                            <div class="col-12 mb-3">
                                <label for="attemp" class="form-label">Attemp</label>
                                <input type="number" min="1" value="1" id="attemp" name="attemp"
                                    class="form-control" placeholder="Enter Attemp Number" />
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
        </form>
    </div>


    <div class="modal fade" id="editExamModal" tabindex="-1" aria-hidden="true">
        <form id="updateExam">
            @csrf
            <input type="hidden" id="exam_id" name="exam_id" />
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel4">Add Exam</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="examName1" class="form-label">Exam Name</label>
                                <input type="text" id="examName1" name="examName1" class="form-control"
                                    placeholder="Enter Exam Name" />
                            </div>
                            <div class="col-12 mb-3">
                                <label for="subjectName1" class="form-label">Subject Name</label>
                                <select class="form-select" id="subjectName1" name="subjectName1">
                                    <option value="">Select Subject</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->subject_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="examDate1" class="form-label">Exam Date</label>
                                <input type="date" id="examDate1" name="examDate1" class="form-control"
                                    placeholder="Enter Exam Date" min="<?php echo date('Y-m-d'); ?>" />
                            </div>

                            <div class="col-12 mb-3">
                                <label for="examTime1" class="form-label">Exam Time</label>
                                <input type="time" id="examTime1" name="examTime1" class="form-control"
                                    placeholder="Enter Exam Time" />
                            </div>
                            <div class="col-12 mb-3">
                                <label for="attemp1" class="form-label">Attemp</label>
                                <input type="number" min="1" id="attemp1" name="attemp1" class="form-control"
                                    placeholder="Enter Attemp Number" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" name="updatebtn" id="updatebtn" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#addExam').on('submit', function(e) {
                e.preventDefault();

                let formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin.exam.store') }}",
                    type: "POST",
                    data: formData,
                    success: function(response) {
                        if (response.success == true) {
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    }
                })


            });

            $('.editExamBtn').on('click', function() {
                let examid = $(this).attr('data-id');
                $("#exam_id").val(examid);
                $.ajax({
                    url: "{{ url('admin/examdetail') }}/" + examid,
                    type: 'GET',
                    success: function(response) {
                        if (response.success == true) {
                            var examData = response.data;
                            $('#examName1').val(examData[0].exam_name);
                            $('#subjectName1').val(examData[0].subject_id);
                            $('#examDate1').val(examData[0].exam_date);
                            $('#examTime1').val(examData[0].exam_time);
                            $('#attemp1').val(examData[0].attemp);
                        }
                    }
                });
            });

            $('#updateExam').on('submit', function(e) {
                e.preventDefault();
                let formdata = $(this).serialize();
                $.ajax({
                    url: "{{ route('admin.exam.update') }}",
                    type: "POST",
                    data: formdata,
                    success: function(response) {
                        if (response.success == true) {
                            // alert(response.message);
                            location.reload();
                        } else {
                            alert(response.message);
                        }
                    }
                });
            });

            $('.deleteExamBtn').on('click', function() {
                let examId = $(this).attr('data-id');
                let row = $(this).closest('tr');

                if (confirm("Are you sure you want to delete this Exam?")) {
                    $.ajax({
                        url: "{{ route('admin.exam.destroy') }}",
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            examid: examId
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.success == true) {
                                row.remove();
                                alert(response.message);
                                location.reload();
                            } else {
                                alert(response.message);
                            }

                        }
                    })
                }
            });
        });
    </script>




@endsection
