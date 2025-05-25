# Pouchtrack 🎉v6.0🎉

This project aims at allowing one to track their nicotine intake, specifically nicotine pouches, to help those quit or try and manage their usage.

## Useful links

Some good places to get started.

- **<a href="https://pouchtrack.net">Pouchtrack.net</a>** - Public Instance. Using the current stable release.
- **<a href="LICENSE.md">License</a>** - Its short, trust me.
- **<a href="docs/index.md">Documentation</a>** - Markdown documentation included in the source code directly. (in `docs/` directory)
  - **<a href="docs/guides/getting-started.md">Get Started</a>** - The few easy steps to get Pouchtrack working.
  - **<a href="docs/guides/design-philosophy.md">Design Philosophy</a>** - The structure of the codebase.

## Release Notes

Version 6.0 has included the following changes:

- **Edit Previous days!**
  - A long awaited feature has finally been added! You can now edit previous days of pouches and cans.
- **See All Time Usage**
  - In addition to sorting by months, you can now sort by all time.
- **Accessible API!**
  - You can now get information about pouches, cans, and your account through the web browser. This was done to cut load times on pages as before, it was all loaded into the dasboard. (it added about 2000 lines to the HTML)
  - It is disabled by default on every new users account for security reasons.
- **New Counting API for Pouches and Cans**
  - See the new script `data.php`.
- **Export as PNG!**
  - Can't believe it took until version 6.0 for this! You can export cans and pouches chart into a PNG file.
- **More Efficient Error Handling**
  - Errors are now stored in an array instead of a giant switch statement.
- **New Splash Page**
  - Added more to the "Why use Pouchtrack" section.
  - Removed picture of app on mobile.
- **Config File Security**
  - The `config.json` file is now hidden from public view.
- **New users Welcome Message**
  - New users will now have a popup on their first launch of the app after registration. This shows them how to install the iOS version.
- **New Apache Error Handling**
  - We now have a one module solution for errors 404, 500, etc.
- **Database File Checks**
  - When the database is being written to, it now checks if the file contents are correct. If they are corroupted, it is rewritten.

## Development and Roadmap

This project was created with and uses the following. Thank you to the maintainers of these projects.

- **<a href="https://www.php.net">php</a>** v8.4.5
- **<a href="https://www.getbootstrap.com">bootstrap</a>** v5.3.3
- **<a href="https://www.chartjs.org">chartjs</a>** v4.4.0

Our current roadmap looks sort of like this. (nothing is promised, these are moreso features I am hoping to add)

- [x] Track Cans.
- [x] Allow for multiple years in chart.
- [x] Session Expires.
- [x] API
- [x] Database Checks to prevent Data Loss while writing.
- [ ] Edit previous days.

If you would like to contribute, fork it! I doubt anyone wants to touch this dumpster-fire of a codebase but if you feel like it, go ahead!
You can find useful information in the **[docs](docs/index.md)**. I'm an idiot and make all my own tools, which is why they suck and are a confusing mess.
