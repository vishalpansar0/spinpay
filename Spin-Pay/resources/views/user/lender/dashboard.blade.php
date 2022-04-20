@include('user.layout.navbar')
@include('user.lender.sidenavbar')
{{-- <div class="container pt-lg-5 pl-lg-2"> --}}

<div class="staticpage" id="abc">
    <button class="applyforloan" id=applyforlaon>ApplyFORLoan</button>
    <hr>
    <button class="loan" id=loan>loan</button>
    <button class="request" id=request>Request</button>
    <button class="transaction" id=transaction>Transaction</button>
    <button class="profile" id=profile>Profile</button>
    <button class="documents" id=documents>Documents</button>
</div>
<script>
    const applyforloan = document.getElementById('applyforlaon');
    const loan = document.querySelector('.loan');
    const request = document.querySelector('.request');
    const transaction = document.querySelector('.transaction');
    const profile = document.querySelector('.profile');
    const docoments = document.querySelector('.docoments');
    const staticpage = document.querySelector('.staticpage');
    const conn = document.getElementById('abc');
    applyforlaon.addEventListener('click', () => {
        conn.innerHTML ='<table class="table table-dark"><thead><tr><th scope="col">#</th><th scope="col">First</th><th scope="col">Last</th><th scope="col">Handle</th></tr></thead><tbody>@for ($i = 0; $i <10; $i++)<tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td> </tr>@endfor</tbody></table>';

    })
    loan.addEventListener('click', () => {
        conn.innerHTML ='<table class="table table-dark"><thead><tr><th scope="col">#</th><th scope="col">First</th><th scope="col">Last</th><th scope="col">Handle</th></tr></thead><tbody>@for ($i = 0; $i <10; $i++)<tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td> </tr>@endfor</tbody></table>';

    })
    request.addEventListener('click', () => {
        conn.innerHTML ='<table class="table table-dark"><thead><tr><th scope="col">#</th><th scope="col">First</th><th scope="col">Last</th><th scope="col">Handle</th></tr></thead><tbody>@for ($i = 0; $i <10; $i++)<tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td> </tr>@endfor</tbody></table>';

    })
    transaction.addEventListener('click', () => {
        conn.innerHTML ='<table class="table table-dark"><thead><tr><th scope="col">#</th><th scope="col">First</th><th scope="col">Last</th><th scope="col">Handle</th></tr></thead><tbody>@for ($i = 0; $i <10; $i++)<tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td> </tr>@endfor</tbody></table>';

    })
    profile.addEventListener('click', () => {
        conn.innerHTML ='<table class="table table-dark"><thead><tr><th scope="col">#</th><th scope="col">First</th><th scope="col">Last</th><th scope="col">Handle</th></tr></thead><tbody>@for ($i = 0; $i <10; $i++)<tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td> </tr>@endfor</tbody></table>';

    })
    documents.addEventListener('click', () => {
        conn.innerHTML ='<table class="table table-dark"><thead><tr><th scope="col">#</th><th scope="col">First</th><th scope="col">Last</th><th scope="col">Handle</th></tr></thead><tbody>@for ($i = 0; $i <10; $i++)<tr><th scope="row">1</th><td>Mark</td><td>Otto</td><td>@mdo</td> </tr>@endfor</tbody></table>';

    })
</script>






{{-- <div id="loan" style="display:hidden">
    <ul>
        <li></li>
    </ul>
</div> --}}
