<div class="container p-0 m-0 mb-4 text-center" style="min-width: 100%;">
  <h1 class="mb-3 fw-semibold lh-1 text-gradient splash-title-secondary" style="margin-top:50px;font-size:38pt;">
    Welcome back, <span class="splash-title-primary"><?php echo $username; ?></span>.
  </h1>
  <p class="text-center p-0 m-0" style="font-size:13pt;">You have used <span
      class="text-primary-emphasis"><?php echo pouchGetPouches($username, date("m-d-Y")); ?></span> total pouches, and
    <span class="text-primary-emphasis"><?php echo pouchGetMgs($username, date("m-d-Y")); ?></span> total mgs today.
  </p>
</div>