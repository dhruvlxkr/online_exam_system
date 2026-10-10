@extends('layout.admin-layout')

@section('title', 'Question')

@section('content')

    <div class="col-lg-12 col-md-12 col-auto">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Question & Answer</h5>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addQAModal">Add Q&A</button>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Questions</th>
                            <th scope="col">Answer</th>
                            <th scope="col">Is Correct</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-warning editSubjecBtn" data-id=""
                                    data-bs-toggle="modal" data-bs-target="#editSubjectModal">Edit</button>
                                <button type="button" class="btn btn-sm btn-danger deleteSubjectBtn" id="deleteSubjectBtn"
                                    data-id="" data-bs-toggle="modal"
                                    data-bs-target="#deleteSubjectModal">Delete</button>
                            </td>

                        </tr>

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            let ansindex = 1;
            $('#addansrow').on('click', function() {
                if ($('.asnwersrows').length >= 4) {
                    $(".error").text("Maximum Four Answer Add");
                    return;
                } else {
                    let html = `
        <div class="row mt-2 align-items-center asnwersrows">
            <div class="col-1 text-center">
                <input type="radio"
                       name="correct_answer" class="correct_answer"
                       value="${ansindex}">
            </div>
            <div class="col-9">
                <input type="text"
                       name="answers[]"
                       class="form-control"
                       placeholder="Enter Answer"
                       autocomplete="off" required>
            </div>
             <div class="col-2">
                <button class="btn btn-danger btn-sm delete">Delete</button>
            </div>
        </div>
    `;

                    $('#answerContainer').append(html);
                    ansindex++;
                }


            });

            $(document).on('click', '.delete', function() {
                $(this).closest('.asnwersrows').remove();
            })

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
                            $(".correct_answer:eq(" + i + ")").val($(".correct_answer:eq(" + i + ")")
                                .next().find('input').val());
                        }
                    }

                    if (checkIscorrect) {
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

        });
    </script>
@endsection
