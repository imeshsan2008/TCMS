<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <style>
    /* CONTENT */
    #sb {
        position: relative;
        width: calc(100% - 280px);
        left: 280px;
        transition: .3s ease;
        
    }

    /* NAVBAR */
    #sb nav {
        width: 100%;
        padding: 0 300px;
        align-items: center;
        font-family: var(--lato);
        position: fixed;
        top: 0;
        left: 100px;
        z-index: 1000;
    }

    .alert_div {
        display: flex;
        width: 60%;
    }

    .alert-dismissible .btn-close {
        position: absolute;
        top: 0;
        right: 0;
        z-index: 2;
        padding: 1.25rem 1rem
    }

    .btn-close {
        box-sizing: content-box;
        width: 1em;
        height: 1em;
        padding: .25em .25em;
        color: #000;
        background: transparent url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414z'/%3e%3c/svg%3e") center/1em auto no-repeat;
        border: 0;
        border-radius: .375rem;
        opacity: .5
    }
    </style>

    <!-- SIDEBAR -->

    <!-- CONTENT -->
    <section id="sb">
        <!-- NAVBAR -->
        <nav>
            <?php if(isset($_GET['error'])&& $_GET['error']  == 'ESTA'): ?>
               <center>
                <div class="alert alert-danger alert-dismissible fade show alert_div" style="display: none;" id="error"
                    role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    Error adding subject or teacher. Please try again.
                </div>
            </center>
            <script>
setTimeout(() => {
$("#error").fadeIn();
}, 0);setTimeout(() => {
$("#error").fadeOut();

}, 3000);
history.replaceState(null, null, "?");

        </script>
            <?php endif; ?>
            <?php if(isset($_GET['success'])&& $_GET['success']  == 'SSTA'): ?>
               <center>
                <div class="alert alert-success alert-dismissible fade show alert_div" style="display: none;" id="error"
                    role="alert">
Subject And Teacher Added Successfulls
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            </center>
            <script>
setTimeout(() => {
$("#error").fadeIn();
}, 0);setTimeout(() => {
$("#error").fadeOut();
}, 3000);
history.replaceState(null, null, "?");

        </script>
            <?php endif; ?>

            <?php if(isset($_GET['success'])&& $_GET['success']  == 'SSA'): ?>
               <center>
                <div class="alert alert-success alert-dismissible fade show alert_div" style="display: none;" id="error"
                    role="alert">
Student Added Successfully
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            </center>
            <script>
setTimeout(() => {
$("#error").fadeIn();
}, 0);setTimeout(() => {
$("#error").fadeOut();
}, 3000);
history.replaceState(null, null, "?");

        </script>
            <?php endif; ?>
            
            <?php if(isset($_GET['error'])&& $_GET['error']  == 'ESA'): ?>
               <center>
                <div class="alert alert-danger alert-dismissible fade show alert_div" style="display: none;" id="error"
                    role="alert">
                    Error adding Student. Please try again.                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            </center>
            <script>
setTimeout(() => {
$("#error").fadeIn();
}, 0);setTimeout(() => {
$("#error").fadeOut();
}, 3000);
history.replaceState(null, null, "?");

        </script>
            <?php endif; ?>
                 
            <?php if(isset($_GET['error'])&& $_GET['error']  == 'ESU'): ?>
               <center>
                <div class="alert alert-danger alert-dismissible fade show alert_div" style="display: none;" id="error"
                    role="alert">
                    Error updating Student. Please try again.                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            </center>
            <script>
setTimeout(() => {
$("#error").fadeIn();
}, 0);setTimeout(() => {
$("#error").fadeOut();
}, 3000);
history.replaceState(null, null, "?");

        </script>
            <?php endif; ?>
        <?php if(isset($_GET['success'])&& $_GET['success']  == 'SSU'): ?>
               <center>
                <div class="alert alert-success alert-dismissible fade show alert_div" style="display: none;" id="error"
                    role="alert">
                    Student Updated Successfully               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            </center>
            <script>
setTimeout(() => {
$("#error").fadeIn();
}, 0);setTimeout(() => {
$("#error").fadeOut();
}, 3000);
history.replaceState(null, null, "?");

        </script>
            <?php endif; ?>   
        
        
        
        
        
    
 <?php if(isset($_GET['success'])&& $_GET['success']  == 'SSD'): ?>
               <center>
                <div class="alert alert-success alert-dismissible fade show alert_div" style="display: none;" id="error"
                    role="alert">
                    Student Deleted Successfully               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            </center>
            <script>
setTimeout(() => {
$("#error").fadeIn();
}, 0);setTimeout(() => {
$("#error").fadeOut();
}, 3000);
history.replaceState(null, null, "?");

        </script>
            <?php endif; ?>    
     
 <?php if(isset($_GET['error'])&& $_GET['error']  == 'ESD'): ?>
               <center>
                <div class="alert alert-danger alert-dismissible fade show alert_div" style="display: none;" id="error"
                    role="alert">
                    Error deleting Student. Please try again.             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            </center>
            <script>
setTimeout(() => {
$("#error").fadeIn();
}, 0);setTimeout(() => {
$("#error").fadeOut();
}, 3000);
history.replaceState(null, null, "?");

        </script>
            <?php endif; ?>       
  
 <?php if(isset($_GET['error'])&& $_GET['error']  == 'NOSD'): ?>
               <center>
                <div class="alert alert-danger alert-dismissible fade show alert_div" style="display: none;" id="error"
                    role="alert">
                    No student data found.Please try again
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                </div>
            </center>
            <script>
setTimeout(() => {
$("#error").fadeIn();
}, 0);setTimeout(() => {
$("#error").fadeOut();
}, 3000);
history.replaceState(null, null, "?");

        </script>
            <?php endif; ?>    </nav>     <!-- NAVBAR -->
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>
