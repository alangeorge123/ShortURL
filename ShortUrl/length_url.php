<!doctype html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="mystyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <body class="bgColor">
    <div class="container d-flex justify-content-center align-items-center">
      <div class="row">
        <div class="col-lg-12">
          <div class="">
            <h3 class="pb-5">Lengthy URL</h3>
            <form method="post" action="">
              <div class="main-input input-group  mb-3">
                <input type="text" class="form-control" required name="lengthy_url" placeholder="Enter Short Url" aria-label="Enter Short Url" aria-describedby="">
                <button class="btn btn-success" type="submit" name="len_url">Submit</button>
              </div>
              <button class="btn btn-secondary" type="button" onClick="window.location.href='index.php';">  
                Back  
              </button>

              <!-- <input type="text" name="lengthy_url" placeholder="" required class="" />  
              <input type="submit" name="len_url">
              <button onClick="window.location.href='index.php';">  
                Back  
              </button> -->
            </form>

            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $conn = new mysqli($servername, $username, $password,'urlshort');

            if (isset($_POST['lengthy_url'])) {
              $url=$_POST["lengthy_url"];
              $array = explode("/",$url);
              $decoded_url = end($array);
              if(!empty($decoded_url) && strlen($decoded_url) >= 8){
                $sql = "SELECT url_full FROM url_short WHERE url_short='$decoded_url'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo '<div class="pt-5 text-center"><h5 class="text-primary">Your Full Length Url is </h5> <h3 class="text-success">'.$row['url_full'].'<h3></div>';
                  }
                }else {
                  echo '<div class=" pt-5 text-center"><h4 class="text-danger">No Data Avilable</h4></div>';
                }
              }
            }

            ?>

          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
  </html>
