

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
</head>
<body>

    <form>
        <input type="" name="name" id="name">
        <input type="number" name="age" id="age">
        <button type="button">submit</button>
    </form>

    <div></div>


    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script type="text/javascript">
      $("button").click(function(e) {
        e.preventDefault(); // Prevent the default form submission
        
        var url = 'http://localhost/blopz/mobile_api/place_order';
        var data = {
          name: $("#name").val(),
          age: $("#age").val()
        };

        var formData = new FormData(); // Create a new FormData object
        formData.append('name', data.name); // Append the form data
        formData.append('age', data.age);

        fetch(url, {
          method: 'POST',
          body: formData // Use the FormData object as the request body
        }).then(function(response) {
          if (response.status === 400) {
            throw new Error('Invalid request method. Server expects a POST request.');
          } else if (response.ok) {
            return response.json();
          } else {
            throw new Error('Request failed with status ' + response.status);
          }
        }).then(function(responseData) {
          if (responseData && responseData.status === "success") {
            $("div").html(responseData.data.name + " " + responseData.data.age + " " + responseData.data.endpoint);
          } else {
            alert(responseData.message);
          }
        }).catch(function(error) {
          console.error('Fetch Error:', error);
        });
  });
</script>

</body>
</html>