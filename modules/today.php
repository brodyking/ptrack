<div class="container p-0 m-0 text-center">
  <h1 class="mb-3 fw-semibold lh-1 text-gradient"
    style="  background: -webkit-linear-gradient(#ffffff,rgb(138, 142, 146));-webkit-background-clip: text;-webkit-text-fill-color: transparent;margin-top:50px;font-size:28pt;">
    Welcome back, <span style="background: -webkit-linear-gradient(#98C2FD,#0D70FD);-webkit-background-clip: text;-webkit-text-fill-color: transparent;"><?php echo $username; ?></span>.</h1>
  <p class="text-center p-0 m-0" style="font-size:13pt;">You have used <span class="text-primary-emphasis"><?php echo pouchGetPouches($username, date("m-d-Y")); ?></span> total pouches, and <span class="text-primary-emphasis"><?php echo pouchGetMgs($username, date("m-d-Y")); ?></span> total mgs today.</p>
  </div>
<br>
