@extends('layout.admin-layout')

@section('title', 'Question')

@section('content')

    <div class="col-lg-12 col-md-12 col-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <div>
                    <h5 class="mb-0">Question & Answer</h5>
                </div>
                <div>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addQAModal">Add Q&A</button>
                    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ImportQAModal">CSV Import</button>
                </div>

            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Questions</th>
                            <th scope="col">Answer</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($quetions) > 0)
                            @foreach ($quetions as $question)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $question->questions }}</td>
                                    <td>
                                        <a href="#" class="ansButton" data-id="{{ $question->id }}"
                                            data-bs-toggle="modal" data-bs-target="#seeAnswers">See answers</a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-warning editqaBtn"
                                            data-id="{{ $question->id }}" data-bs-toggle="modal"
                                            data-bs-target="#editq&aModal">Edit</button>
                                        <button type="button" class="btn btn-sm btn-danger deleteqaBtn" id="deleteqaBtn"
                                            data-id="{{ $question->id }}">Delete</button>
                                    </td>

                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5">Data Not Found</td>
                            </tr>

                        @endif



                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addQAModal" tabindex="-1" aria-hidden="true">
        <form id="addQAForm">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel4">Add Question & Answer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">Question</label>
                                <input type="text" name="question" id="question" class="form-control"
                                    placeholder="Enter Question" autocomplete="off" required>

                                <button type="button" class="btn btn-primary btn-sm mt-3" id="addansrow">
                                    Add Answer
                                </button>
                            </div>

                            <div class="col-12 mb-3" id="answerContainer">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <span class="error text-danger"></span>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" name="submitbtn" id="submitbtn" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="seeAnswers" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel4">Show Answers</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-border">
                                <thead>
                                    <th>#</th>
                                    <th>Answers</th>
                                    <th>Correct Answer</th>
                                </thead>
                                <tbody id="showAnswer">
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                {{-- <div class="modal-footer">
                    <span class="error text-danger"></span>
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" name="submitbtn" id="submitbtn" class="btn btn-primary">Save</button>
                </div> --}}
            </div>
        </div>
    </div>


    <div class="modal fade" id="editq&aModal" tabindex="-1" aria-hidden="true">
        <form id="editQAForm">
            @csrf
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel4">Edit Question & Answer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body editModelAnswer">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <input type="hidden" id="qid" name="qid">
                                <label class="form-label">Question</label>
                                <input type="text" name="edit_question" id="edit_question" class="form-control"
                                    placeholder="Enter Question" autocomplete="off" required>

                                <button type="button" class="btn btn-primary btn-sm mt-3" id="editansrow">
                                    Edit Answer
                                </button>
                            </div>

                            <div class="col-12 mb-3" id="editanswerContainer">
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <span class="editError text-danger"></span>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            Close
                        </button>
                        <button type="submit" name="submitbtn" id="submitbtn" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="modal fade" id="ImportQAModal" tabindex="-1" aria-hidden="true">
        <form id="importCSVqa" enctype="multipart/form-data">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel4">Import Question & Answer</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body editModelAnswer">
                        <div class="row">
                            <div class="col-12 d-flex">
                                <input type="file" name="Import_file" id="Import_file" class="form-control m-3"
                                    required accept=".csv">

                                <button type="submit" class="btn btn-primary btn-sm" id="importbtn  ">
                                    Import
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function reindexAnswers() {
                $('.asnwersrows').each(function(index) {
                    $(this).find('.correct_answer').val(index);
                });
            }

            $('#addansrow').on('click', function() {
                if ($('.asnwersrows').length >= 4) {
                    $(".error").text("Maximum Four Answer Add");
                    return;
                } else {
                    let html = `
        <div class="row mt-2 align-items-center asnwersrows">
    <div class="col-9 d-flex align-items-center gap-2">
        <input type="radio"
               name="correct_answer" class="correct_answer"
               value="">
        <input type="text"
               name="answers[]"
               class="form-control"
               placeholder="Enter Answer"
               autocomplete="off" required>
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-danger btn-sm delete">Delete</button>
    </div>
</div>
    `;

                    $('#answerContainer').append(html);
                    reindexAnswers();
                }


            });

            $('#editansrow').on('click', function() {
                if ($('.editasnwersrows').length >= 4) {
                    $(".editError").text("Maximum Four Answer Add");
                    return;
                } else {
                    let html = `
        <div class="row mt-2 align-items-center editasnwersrows">
    <div class="col-9 d-flex align-items-center gap-2">
        <input type="radio"
               name="edit_correct_answer" class="edit_correct_answer"
               value="">
        <input type="text"
               name="new_answers[]"
               class="form-control"
               placeholder="Enter Answer"
               autocomplete="off" required>
    </div>
    <div class="col-2">
        <button type="button" class="btn btn-danger btn-sm delete">Delete</button>
    </div>
</div>
    `;

                    $('#editanswerContainer').append(html);
                }


            });

            $(document).on('click', '.delete', function() {
                $(this).closest('.asnwersrows, .editasnwersrows').remove();
                reindexAnswers();
            });

            $('#editQAForm').on('submit', function(e) {
                e.preventDefault();

                if ($('.editasnwersrows').length < 2) {
                    $(".editError").text("Please Add Minimum Two Answer");
                    setTimeout(() => {
                        $(".editError").text("");
                    }, 2000);
                } else {
                    var checkIscorrect = false;

                    for (var i = 0; i < $(".edit_correct_answer").length; i++) {
                        if ($(".edit_correct_answer:eq(" + i + ")").is(':checked') == true) {
                            checkIscorrect = true;
                            let currentVal = $(".edit_correct_answer:eq(" + i + ")").val();
                            let textVal = $(".edit_correct_answer:eq(" + i + ")").closest(
                                '.editasnwersrows').find('input[type="text"]').val();
                            if (!currentVal) {
                                $(".edit_correct_answer:eq(" + i + ")").val(textVal);
                            }
                        }
                    }

                    if (checkIscorrect) {
                        var formdata = $(this).serialize();
                        $.ajax({
                            url: "{{ route('admin.ques-ans.editaddqa') }}",
                            type: "POST",
                            data: formdata,
                            success: function(response) {
                                if (response.success == true) {
                                    location.reload();
                                } else {
                                    alert(response.message || 'Data Submit Failed');
                                }
                            },
                            error: function(err) {
                                alert('Something went wrong!');
                            }
                        });

                    } else {
                        $(".editError").text("Please Select Anyone Correct Answer");
                        setTimeout(() => {
                            $(".editError").text("");
                        }, 2000);
                    }
                }
            });

            $('#addQAForm').on('submit', function(e) {
                e.preventDefault();

                if ($('.asnwersrows').length < 2) {
                    $(".error").text("Please Add Minimum Two Answer");
                    setTimeout(() => {
                        $(".error").text("");
                    }, 2000);
                } else {
                    var checkIscorrect = false;

                    for (var i = 0; i < $(".correct_answer").length; i++) {
                        if ($(".correct_answer:eq(" + i + ")").is(':checked') == true) {
                            checkIscorrect = true;
                            $(".correct_answer:eq(" + i + ")").closest('.asnwersrows').find(
                                'input[type="text"]').val();
                        }
                    }

                    if (checkIscorrect) {
                        reindexAnswers();
                        var formdata = $(this).serialize();
                        $.ajax({
                            url: "{{ route('admin.ques-ans.addqa') }}",
                            type: "POST",
                            data: formdata,
                            success: function(response) {
                                if (response.success == true) {
                                    location.reload();
                                } else {
                                    alert('Data Submit Failed');
                                }
                            }
                        });

                    } else {
                        $(".error").text("Please Select Anyone");
                        setTimeout(() => {
                            $(".error").text("");
                        }, 2000);
                    }
                }
            });

            $(".ansButton").on('click', function() {
                let questions = @json($quetions);
                let qid = $(this).attr('data-id');
                let html;
                for (let i = 0; i < questions.length; i++) {

                    if (questions[i]['id'] == qid) {

                        var answersLength = questions[i]['answers'].length;
                        for (let j = 0; j < answersLength; j++) {
                            let is_correct = 'No';
                            if (questions[i]['answers'][j]['is_correct'] == 1) {
                                is_correct = 'Yes';
                            }
                            html += `
                            <tr>
                                <td>` + (j + 1) + `</td>  
                                <td>` + questions[i]['answers'][j]['answer'] + `</td>
                                <td>` + is_correct + `</td>  
                            </tr>
                            `
                        }
                        break;
                    }

                }

                $('#showAnswer').html(html);

            });

            $('.editqaBtn').on('click', function() {
                var qid = $(this).attr('data-id');
                $('#qid').val(qid);
                $('.editError').text('');
                $('#editanswerContainer').html('');

                $.ajax({
                    url: "{{ route('admin.ques-ans.getqaDetails') }}",
                    type: 'GET',
                    data: {
                        qid: qid
                    },
                    success: function(response) {
                        if (response.success && response.data) {
                            var data = response.data;
                            $('#edit_question').val(data.questions);

                            let html = '';
                            let answers = data.answers || [];
                            for (let i = 0; i < answers.length; i++) {
                                let isChecked = (answers[i].is_correct == 1) ? 'checked' : '';
                                html += `
                                <div class="row mt-2 align-items-center editasnwersrows">
                                    <div class="col-9 d-flex align-items-center gap-2">
                                        <input type="radio"
                                               name="edit_correct_answer" class="edit_correct_answer"
                                               value="${answers[i].id}" ${isChecked}>
                                        <input type="text"
                                               name="answers[${answers[i].id}]"
                                               class="form-control"
                                               value="${answers[i].answer}"
                                               placeholder="Enter Answer"
                                               autocomplete="off" required>
                                    </div>
                                    <div class="col-2">
                                        <button type="button" class="btn btn-danger btn-sm delete">Delete</button>
                                    </div>
                                </div>
                                `;
                            }
                            $('#editanswerContainer').html(html);
                        } else {
                            alert("Data Not Found");
                        }
                    },
                    error: function(err) {
                        console.log(err);
                        alert("Error fetching question details");
                    }
                });
            });

            $('.deleteqaBtn').on('click', function() {
                var qid = $(this).attr('data-id');

                $.ajax({
                    url: "{{ route('admin.ques-ans.qadelete') }}",
                    type: "POST",
                    data: {
                        id: qid
                    },
                    success: function(response) {
                        if (response.success == true) {
                            alert(response.message)
                            location.reload();
                        } else {
                            alert(response.message)
                        }
                    }
                });
            });

            $("#importCSVqa").on("submit", function(e) {
                e.preventDefault();

                new FormData = new FormData();
                FormData.append('file', Import_file.files[0]);

                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    }
                });

                $.ajax({
                    url: "{{ route('admin.ques-ans.importcsv') }}",
                    type: "POST",
                    data: FormData,
                    proccessData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success == true) {
                            console.log(response);
                        } else {
                            alert(response.massage);
                        }
                    }
                });

            });

        });
    </script>
@endsection
