<html>
<head>
    <link rel="stylesheet" href="mystyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body class="bgColor">
   <form method="post" action="">
    <div class="container d-flex justify-content-center align-items-center">
        <div class="row">
            <div class="col-lg-12">
                <div class="">
                    <h3 class="pb-5">Shorten URL</h3>
                    <div class="main-input input-group  mb-3">
                      <input type="text" class="form-control" name="domain_url" required placeholder="Enter Main Domain" aria-label="Enter Main Domain" aria-describedby="">
                      <input type="text" class="form-control" name="url_value" required placeholder="Enter Shortend URL" aria-label="Enter Shortend URL" aria-describedby="">
                      <button class="btn btn-success" type="submit" name="short_url">Submit</button>
                      </div> 
                      <button class="btn btn-secondary" type="button" onClick="window.location.href='index.php';">  
                        Back  
                      </button>
                    
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";

                        $conn = new mysqli($servername, $username, $password,'urlshort');
                        if (isset($_POST['short_url'],$_POST['domain_url'])) {
                            $url=$_POST["url_value"];
                            $domainUrl = $_POST["domain_url"];
                            $short_url=substr(md5($url.mt_rand()),0,8);
                            $sql = "INSERT INTO url_short VALUES ('','$url','$domainUrl','$short_url')";
                            if ($conn->query($sql) === TRUE) {
                              echo '<div class="pt-5 text-center"><h5 class="text-primary">Short URL is<h5> <h3 class="text-success">http://'.$domainUrl."/".$short_url.'</h3></div>';
                            } else {
                              echo '<div class=" pt-5 text-center"><h4 class="text-danger">Error: ' . $sql . '<br>' . $conn->error;
                            }
                        }

                         ?>   
              </div>
          </div>
      </div>
  </div>
</form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


