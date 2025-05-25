<style>
  .card-body>ul>li {
    padding-bottom: .5em;
  }

  .card-body>ul>li>ul {
    padding-top: .5em;
  }

  .card-body>ul>li>ul>li {
    padding-bottom: .5em;
  }

  .card-body {
    padding-bottom: 0px;
  }
</style>
<div class="container p-0 m-0 mb-4 text-center" style="min-width: 100%;">
  <h1 class="mb-5 fw-semibold lh-1" style="margin-top:50px;font-size:38pt;">
    Recent Changes
  </h1>
</div>
<div class="card">
  <div style="display: block; background-color: #dee2e608!important;" class="card-body">
    <h2 class="mb-4 mt-3 pb-3 ps-3 fw-semibold lh-1 border-bottom">Version 6.0 Release Notes</h2>

    <ul>
      <li>
        <b>Edit Previous days!</b>
        <ul>
          <li>
            A long awaited feature has finally been added! You can now edit previous days of pouches and cans.
          </li>
        </ul>
      </li>
      <li>
        <b>Accessible API!</b>
        <ul>
          <li>
            You can now get information about pouches, cans, and your account through the web browser. This was done
            to cut load times on pages as before, it was all loaded into the dasboard. (it added about 2000 lines to
            the HTML)
          </li>
          <li>
            It is disabled by default on every new users account for security reasons.
          </li>
        </ul>
      </li>
      <li>
        <b>New Counting API for Pouches and Cans</b>
        <ul>
          <li>
            See the new script `data.php`.
          </li>
        </ul>
      </li>
      <li>
        <b>Export as PNG!</b>
        <ul>
          <li>
            Can't believe it took until version 6.0 for this! You can export cans and pouches chart into a PNG
            file.
          </li>
        </ul>
      </li>
      <li>
        <b>More Efficient Error Handling</b>
        <ul>
          <li>
            Errors are now stored in an array instead of a giant switch statement.
          </li>
        </ul>
      </li>
      <li>
        <b>New Splash Page</b>
        <ul>
          <li>
            Added more to the "Why use Pouchtrack" section.
          </li>
          <li>
            Removed picture of app on mobile.
          </li>
        </ul>
      </li>
      <li>
        <b>Config File Security</b>
        <ul>
          <li>
            The `config.json` file is now hidden from public view.
          </li>
        </ul>
      </li>
      <li>
        <b>New users Welcome Message</b>
        <ul>
          <li>
            New users will now have a popup on their first launch of the app after registration. This shows them how
            to install the iOS version.
          </li>
        </ul>
      </li>
      <li>
        <b>New Apache Error Handling</b>
        <ul>
          <li>
            We now have a one module solution for errors 404, 500, etc.
          </li>
        </ul>
      </li>
      <li>
        <b>Database File Checks</b>
        <ul>
          <li>
            When the database is being written to, it now checks if the file contents are correct. If they are
            corroupted, it is rewritten.
          </li>
        </ul>
      </li>
    </ul>
  </div>
</div>

<p class="text-center mt-5">
  <a href="https://github.com/brodyking/ptrack/releases" class="btn btn-secondary-new">View More on GitHub <i
      class="bi bi-github"></i></a>
</p>