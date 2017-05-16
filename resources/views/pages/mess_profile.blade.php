<html>
   
   <head>
      <title>View Student Records</title>
   </head>
   
   <body>
         @foreach ($mess as $value)
            <label> ID:</label>{{ $value->id }}
            <br>
            <label>Mess Name:</label>{{ $value->name }}
         @endforeach
     
   </body>
</html>