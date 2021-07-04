<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>GL-DASHBOARD</title>
</head>
<body>
    <div class="container">
        <h1>Contacts</h1>
    </div>
  
    <div class="container">
        
        <h3>Please fill the form</h3>
        <form action="contacts" method="post">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
              </div>
              <div class="form-group">
                <label for="surname">Surname</label>
                <input type="text" class="form-control" id="surname" name="surname" placeholder="Enter surname">
              </div>
              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter phone">
              </div>
              <div class="form-group">
                <label for="jobTitle">Job Title</label>
                <input type="text" class="form-control" id="jobTitle" name="jobTitle" placeholder="Enter job title">
              </div>
              <div class="form-group">
                <label for="company">Company</label>
                <input type="text" class="form-control" id="company" name="company" placeholder="Enter company">
              </div>
            <div class="form-group">
              <label for="email">Email address</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
            </div>
            <div class="form-group">
              <label for="gender">Gender</label>
              <select class="form-control" id="gender" name="gender">
                <option>Male</option>
                <option>Female</option>
              </select>
            </div>
            <div class="form-group">
              <label for="notes">Notes</label>
              <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          <button id="getContactList" class="btn btn-danger">Get Contacts</button>
          <table class="table">
          <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Surname</th>
              <th scope="col">Gender</th>
              <th scope="col">Email</th>
              <th scope="col">Company</th>
              <th scope="col">Job Title</th>
              <th scope="col">Notes</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
    </div>

     
</body>
<script>
    $(document).ready(function(){
        $("#getContactList").on('click',function(e){
            e.preventDefault();
        $.ajax({
            type:'GET',
            url:'/contacts',
            success:function(response){
                console.log(response.contacts);
                $.each(response.contacts,function(key,item){
                    $('tbody').append('<tr>\
              <td>'+item.name+'</td>\
              <td>'+item.surname+'</td>\
              <td>'+item.gender+'</td>\
              <td>'+item.email+'</td>\
              <td>'+item.company+'</td>\
              <td>'+item.jobTitle+'</td>\
              <td>'+item.notes+'</td>\
            </tr>');

                });
            },
            error:function(response){
                console.log(response);
            }
        })
        })
        
    })



</script>
</html>