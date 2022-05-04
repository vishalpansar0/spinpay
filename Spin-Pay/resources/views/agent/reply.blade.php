@include('layouts.header')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
 integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> --}} <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
<nav class="navbar navbar-expand-lg table-dark text-center">
    <div class="container-fluid">
        <h1>Requests</h1>
    </div>
</nav>

<div class="container-fluid">
    <table class="table text-center table-dark">
        <thead>
            <tr>
                <th scope="col">Query Id</th>
                <th scope="col">User Id</th>
                <th scope="col">Category</th>
                <th scope="col">User Issue</th>
                <th scope="col">Reply Message </th>
                <th scope="col">Raise Time</th>
                <th scope="col">Last Reply Time</th>
                <th scope="col">Action</th>

            </tr>
        </thead>
        <tbody id="records_table">
            @foreach ($query as $data)
                <tr>
                    <td>{{ $data['id'] }}</td>
                    <td>{{ $data['user_id'] }}</td>
                    <td>{{ $data['category'] }}</td>
                    <td>{{ $data['user_message'] }}</td>
                    @if ($data['reply_message'] == null)
                        <td>--</td>
                    @else
                        <td>{{ $data['reply_message'] }}</td>
                    @endif
                    <td>{{ Carbon\Carbon::parse($data->created_at)->format('d/m/y') }}</td>
                    @if ($data->updated_at != $data->updated_at)
                        <td>--</td>
                    @else
                        <td>{{ Carbon\Carbon::parse($data->updated_at)->format('d/m/y') }}</td>
                    @endif
                    <td><button class="btn btn-primary" onclick="querys('{{$data->id}}')" data-toggle="modal" data-target="#replymodal">Reply</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div>

    <!-- Modal -->
    <div class="modal fade" id="replymodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div id="datas" style="display:none">
                <p id="requestid"></p>
                <input type="text" value="{{ Session::get('user_id') }}" id="getuserid" style="display: none">
            </div>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reply</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="replyresponse">
                        <input type="text" name="reply_message" required>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="reply">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    console.log('hello');
    $(document).ready({
        $('#reply').click(function(event) {
            event.preventDefault();
            let requestid = $('#requestid').text();
            let lenderid = $('#getuserid').val();
            let data = new FormData(document.getElementById('replyresponse'));
            // console.log(lenderid);
            data.append('id', requestid);
            data.append('repiled_id', lenderid);
            $.ajax({
                url: "/api/agentreply",
                type: "POST",
                dataType: "json",
                data: data,
                success: function(response) {
                    if (response['status'] == 200) {
                        location.reload();
                    }
                }
            });

        });
    });
    // console.log('hello');
    function querys() {
        console.log("hello");
        console.log("id", id);
        $('#requestid').html(id);
    }
</script>
