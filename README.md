# Pouchtrack

This project aims at allowing one to track their nicotine intake, specifically nicotine pouches, to help those quit or try and manage their usage.

## Useful links

Some good places to get started.

- **<a href="https://pouchtrack.net">Pouchtrack.net</a>** - Public Instance. Using the current stable release.
- **<a href="LICENSE.md">License</a>** - Its short, trust me.
- **<a href="docs/index.md">Documentation</a>** - Markdown documentation included in the source code directly. (in `docs/` directory)
  - **<a href="docs/guides/gettingstarted.md">Get Started</a>** - The few easy steps to get Pouchtrack working.
  - **<a href="docs/guides/design-philosophy.md">Design Philosophy</a>** - The structure of the codebase.

## Release Notes

Version 5.6 has included the following changes:

- **Fixed issues when logging user actions**
  - When writing logs in JSON format, it could cause writing issues and would hault site functionality. We now write to HTML, which when corrupted wont cause issues.
- **Bug Reporting**
  - Users can now report bugs into a separate database instead of making a github account
- **New Navigation Bar and Splash Page**
  - Navbar has been cleaned up. Splash page now has more information on reasons to use Pouchtrack
- **New Font**
  - We have switched to CalSans, because it looks much better than our old font.

## Development and Roadmap

This project was created with and uses the following. Thank you to the maintainers of these projects.

- **<a href="https://www.php.net">php</a>** v8.4.5
- **<a href="https://www.getbootstrap.com">bootstrap</a>** v5.3.3
- **<a href="https://www.chartjs.org">chartjs</a>** v4.4.0

Our current roadmap looks sort of like this. (nothing is promised, these are moreso features I am hoping to add)

- [x] Track Cans.
- [x] Allow for multiple years in chart.
- [x] Session Expires.
- [ ] Database Backups to prevent Data Loss while writing.
- [ ] Edit previous days.

If you would like to contribute, fork it! I doubt anyone wants to touch this dumpster-fire of a codebase but if you feel like it, go ahead!
You can find useful information in the **[docs](docs/index.md)**. I'm an idiot and make all my own tools, which is why they suck and are a confusing mess.
