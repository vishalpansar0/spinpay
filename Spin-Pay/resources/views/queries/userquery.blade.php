<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.1.1.min.js"> </script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">





<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Any
    Query</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Raise A Query</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="error">

                </div>
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Category</label>
                        <input type="text" class="form-control" id="category-name" required>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Issue</label>
                        <textarea class="form-control" id="issue-text" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closequery">Close</button>
                <button type="button" class="btn btn-primary" id="submitquery">Submit</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        $('#submitquery').click(function(event) {
            $('#error').empty();
            event.preventDefault();
            let category = $('#category-name').val();
            let issue = $('#issue-text').val();
            if (category == "" || issue == "") {
                $('#error').append("<p style='color:red'>*Fields Cannot Be Empty</p>");
            } else {
                let raisequery = {
                    'user_id':1,
                    'category':category,
                    'user_message':issue
                }
                $.ajax({
                    url: 'api/raise/query',
                    type: 'post',
                    data: raisequery,
                    success: function(response) {
                        if(response['status']==401){
                            let ptag = "<p style='color:red'>*" + response['Validation Failed'] + "</p>"
                            $('#error').append(ptag);
                        }
                        else if (response['status'] != 200) {
                            let ptag = "<p style='color:red'>*" + response['message'] + "</p>"
                            $('#error').append(ptag);

                        } else {
                            $('#closequery').click();
                        }
                    }
                });

            }

        });

    });
</script>
