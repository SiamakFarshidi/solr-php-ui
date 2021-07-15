
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>contact form</title>
</head>

<body>

<div class="container-fluid">
  <!-- Content Row -->
  <div class="row">
    <div class="col-lg-12 mb-4">
      <div class="card shadow mb-12">
        <div class="card-header py-12">
          <h6 class="m-0 font-weight-bold text-primary">Feedback</h6>
        </div>
        <div class="card-body" style="min-height:740px">
            <link href="css/contact-form.css" rel="stylesheet">

            <div>
                <div id="fcf-form">

                <form id="fcf-form-id" class="fcf-form-class" method="post" action="http://formspree.io/informatik.siamak.farshidi@gmail.com">

                    <div class="fcf-form-group">
                        <label for="Name" class="fcf-label">Your name</label>
                        <div class="fcf-input-group">
                            <input type="name" id="name" name="name" class="fcf-form-control" required>
                        </div>
                    </div>

                    <div class="fcf-form-group">
                        <label for="Email" class="fcf-label">Your email address</label>
                        <div class="fcf-input-group">
                            <input type="email" id="_replyto" name="_replyto" class="fcf-form-control" required>
                        </div>
                    </div>

                    <div class="fcf-form-group">
                        <label for="Message" class="fcf-label">Your message</label>
                        <div class="fcf-input-group">
                            <textarea id="body" name="body" class="fcf-form-control" rows="6" maxlength="250" required></textarea>
                        </div>
                    </div>

                    <div class="fcf-form-group" style="text-align:center;">
                        <input type="submit" class="btn btn-primary" value="Send feedback">
                    </div>

                </form>
                </div>

            </div>
        </div>
      </div>
  </div>
</div>
</body>
</html>


